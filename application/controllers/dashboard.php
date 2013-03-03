<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('memcached_library');
		$this->load->model('product_model');
		if (!$this->session->userdata('islogin')) redirect(base_url());
	}

	function index(){
		$uri = $this->uri->segment_array();
		$this->product = $this->product_model->getProduct($uri[2]);
		if (!empty($this->product->product_uri)){
			if ($this->product->product_uri == "canvas"){
				$this->canvas_dashboard();
			}else{
				show_404();
				exit;
			}
		}else{
			show_404();
			exit;
		}
	}

	function canvas_dashboard(){
		$product_size = $this->product_model->getProductSize($this->product->product_id);
		$this->data['product_size'] = $product_size;
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