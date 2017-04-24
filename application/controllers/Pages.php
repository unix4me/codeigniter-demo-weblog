<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    // ------------------------------------------------------------------------------    

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    // ------------------------------------------------------------------------------    

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php'))
        {
            show_404();
        }
        $this->data['title'] = ucfirst($page);
        $this->data['pagebody'] = 'pages/' . $page;
        $this->render();
    }

    // ------------------------------------------------------------------------------
}

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */

