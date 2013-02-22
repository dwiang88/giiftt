<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function index(){
		$this->default_param(
			array(
				'css/front.css'
			), "", "", "Home"
		);
		$this->load->view('t/home/index_view', $this->data);
	}

}

?>