<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function index(){
		
	}

	function canvas(){
		$this->_default_param(
			array(
				"css/jWindowCrop.css"
			)
			, 
			array(
				"js/jquery.jWindowCrop.js",
				"js/filtereffects/jdataview.js",
				"js/filtereffects/jspline.js",
				"js/filtereffects/jquery.filterme.js",
				"js/dashboard.js"
			)
			, "", "Dashboard Canvas");
		$this->load->view("t/dashboard/canvas_view", $this->data);
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