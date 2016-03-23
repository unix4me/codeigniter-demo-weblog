<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

    // ------------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'pagination'));
        $this->load->model('news_model');
        $this->load->database();
    }

    // ------------------------------------------------------------------------------

    public function index($offset = NULL)
    {
        $limit = 2;
        $total = $this->news_model->count_news();
        $config['base_url'] = base_url() . 'news/index/';
        $config['first_url'] = base_url() . 'news/'; // Without the first_url. CI throws a 404 at me.
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['display_pages'] = FALSE;

        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();

        $this->data['news'] = $this->news_model->get_all_news($limit, $offset);
        $this->data['title'] = 'News archive';
        $this->data['pagebody'] = 'news/news_home';
        $this->render();
    }

    // ------------------------------------------------------------------------------    

    public function view($slug = NULL)
    {
        $this->data['news_item'] = $this->news_model->get_news($slug);

        if (empty($this->data['news_item']))
        {
            show_404();
        }

        $this->data['title'] = $this->data['news_item']['title'];
        $this->data['pagebody'] = 'news/view';
        $this->render();
    }

    // ------------------------------------------------------------------------------    

    public function create()
    {
        $this->data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[news.title]');
        $this->form_validation->set_rules('text', 'Full Text', 'trim');
        $this->form_validation->set_rules('excerpt', 'Excerpt', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->data['pagebody'] = 'news/create';
            $this->render();
        }
        else
        {
            $this->news_model->set_news();
            $this->data['pagebody'] = 'news/success';
            $this->render();
        }
    }

    // ------------------------------------------------------------------------------    

    public function update($slug = NULL)
    {
        $this->data['title'] = 'Update a news item';

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('text', 'Full Text', 'trim');
        $this->form_validation->set_rules('excerpt', 'Excerpt', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->data['news_item'] = $this->news_model->get_news($slug);
            $this->data['pagebody'] = 'news/update';
            $this->render();
        }
        else
        {
            $this->news_model->update_news();
            $this->data['pagebody'] = 'news/success';
            $this->render();
        }
    }

    // ------------------------------------------------------------------------------    

    public function delete($id)
    {
        $this->news_model->delete_news($id);
        $this->data['pagebody'] = 'news/success';
        $this->render();
    }

    // ------------------------------------------------------------------------------
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */
