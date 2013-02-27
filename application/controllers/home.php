<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->_default_param(
			"", "", "", "Home"
		);
		$this->load->view('t/home/index_view', $this->data);
	}

	function canvas(){
		$this->_default_param(
			"", "", "", "Canvas"
		);
		$this->load->view('t/home/home_canvas_view', $this->data);
	}

	function photobook(){
		$this->_default_param(
			"", "", "", "Photo Book"
		);
		$this->load->view('t/home/home_photobook_view', $this->data);
	}

	function _default_param($css = array(), $js = array(), $meta = array(), $title = ""){
		$default_css = array(
			'css/front.css'
		);
		if (!empty($css)) $css = array_merge($default_css, $css);
		else $css = $default_css;
		//if (!empty($js)) $js = array_merge($default_js, $js);
		$this->default_param($css, $js, $meta, $title);
	}

}

?>