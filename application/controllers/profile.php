<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	function index(){
		$this->_default_param("", "", "", "Profile");
		$this->load->view("t/profile/user_profile_view", $this->data);
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