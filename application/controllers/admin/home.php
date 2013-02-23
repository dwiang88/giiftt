<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	
	function hal1(){
		$this->_default_param("","","", "Halaman 1");
		$this->load->view('a/hal1_view', $this->data);
	}
	
	function _default_param($css = array(), $js = array(), $meta = array(), $title = ""){
		$default_css = array(
			//'css/front.css'
		);
		if (!empty($css)) $css = array_merge($default_css, $css);
		else $css = $default_css;
		//if (!empty($js)) $js = array_merge($default_js, $js);
		$this->default_param($css, $js, $meta, $title);
	}
	
}

?>