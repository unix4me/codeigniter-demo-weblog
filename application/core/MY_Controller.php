<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 */
class MY_Controller extends CI_Controller {

    protected $data = array(); // parameters for view components
    protected $id;   // identifier for our content

    /**
     * Constructor.
     * Establish view parameters & set a couple up
     */

    function __construct()
    {
        parent::__construct();

        $this->load->library(array('parser', 'markdown'));
        $this->load->model('news_model');
        $this->load->database();
        $this->data = array();
        $this->data['title'] = 'CodeIgniter Demo Weblog';
        $this->errors = array();

        $this->data = array(
            'blog_title' => $this->config->item('blog_title'),
            'blog_description' => $this->config->item('blog_description')
        );
    }

    /**
     * Render this page
     */
    function render()
    {
        if (!isset($this->data['pagetitle']))
            $this->data['pagetitle'] = $this->data['title'];

        // Massage the menubar
        $choices = $this->config->item('menu_choices');
        foreach ($choices['menudata'] as &$menuitem)
        {
            $menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
        }
        $this->data['header_view'] = $this->parser->parse('theme/header_view', $this->data, true);
        $this->data['menubar'] = $this->parser->parse('theme/menubar', $choices, true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['footerbar'] = $this->parser->parse('theme/menubar', $this->config->item('footer_choices'), true);
        $this->data['footer_view'] = $this->parser->parse('theme/footer_view', $this->data, true);

        $this->data['data'] = &$this->data;

        // finally, build the browser page! 
        $this->parser->parse('theme/template', $this->data);
    }

}
