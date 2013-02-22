<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function index(){
		$this->_default_param(
			"", "", "", "Home"
		);
		$this->load->view('t/home/index_view', $this->data);
	}

	function _default_param($css = array(), $js = array(), $meta = array(), $title = ""){
		$default_css = array(
			'css/front.css'
		);
		if (!empty($css)) $css = array_merge($default_css, $css);
		//if (!empty($js)) $js = array_merge($default_js, $js);
		$this->default_param($css, $js, $meta, $title);
	}

}

?>