<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    // ------------------------------------------------------------------------------    

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'captcha'));
        $this->load->library(array('email', 'form_validation'));
        $this->load->driver('session');
    }

    // ------------------------------------------------------------------------------   

    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[128]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[128]');
        $this->form_validation->set_rules('message', 'Message', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('newCaptcha', 'Captcha', 'required|callback_check_captcha');

        if ($this->form_validation->run() == FALSE)
        {
            $vals = array(
                'word' => 'Captcha123',
                'img_path' => './captcha/',
                'img_url' => base_url() . 'captcha/'
            );

            $this->data['captcha'] = create_captcha($vals);

            $this->session->set_userdata('captchaWord', $this->data['captcha']['word']);

            $this->data['title'] = "Contact";
            $this->data['pagebody'] = 'contact/contact_form';
            $this->render();
        }
        else
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = 'Email from localhost';
            $message = $this->input->post('message');
            $this->email->from($email, $name);
            $this->email->to($this->config->item('webmaster_email'));
            $this->email->subject($subject);
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

    public function check_captcha($str)
    {
        $word = $this->session->userdata('captchaWord');

        if ($str == $word)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_captcha', 'Wrong captcha!');
            return FALSE;
        }
    }

    // ------------------------------------------------------------------------------
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */

