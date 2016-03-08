<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    // ------------------------------------------------------------------------------    

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library(array('email','form_validation'));
    }

    // ------------------------------------------------------------------------------   

    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[128]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[128]');
        $this->form_validation->set_rules('message', 'Message', 'required|trim|max_length[255]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->data['title'] = "Contact";
            $this->data['pagebody'] = 'contact/contact_form';
            $this->render();
        }
        else
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $message = $this->input->post('message');
            $this->email->from($email, $name);
            $this->email->to($this->config->item('webmaster_email'));
            $this->email->message($message);

            if ($this->email->send())
            {
                $this->data['title'] = "Success!";
                $this->data['pagebody'] = 'contact/contact_success';
                $this->render();
            }
        }
    }

    // ------------------------------------------------------------------------------
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */

