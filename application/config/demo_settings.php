<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Frontpage settings-----------------------------------------------------------

$config['blog_title']            = 'Demo Weblog';
$config['blog_description']      = 'Etiam porta sem malesuada magna mollis euismod';
$config['webmaster_email']       = 'your@email.address';

// Menu bar---------------------------------------------------------------------

$config['menu_choices'] = array(
	'menudata' => array(
		array('name' => 'Home', 'link' => '/home'),
		array('name' => 'News', 'link' => '/news'),
		array('name' => 'Projects', 'link' => '/projects'),   
		array('name' => 'About', 'link' => '/about'),
		array('name' => 'Contact', 'link' => '/contact')
	)
);

// Footer bar-------------------------------------------------------------------

$config['footer_choices'] = array(
	'menudata' => array(
		array('name' => 'News', 'link' => '/news'),
		array('name' => 'Contact', 'link' => '/contact'),
		array('name' => 'About', 'link' => '/about')
	)
);
