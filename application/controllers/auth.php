<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		
	}

	function register(){

		// datang dari facebook
		$state = $this->input->get_post('state');
		$code = $this->input->get_post('code');

		// save uri
		$redirect_uri = $this->session->userdata('redirect_uri');
		$redirect_uri = (empty($redirect_uri)) ? base_url() : $redirect_uri;
		$this->session->unset_userdata('redirect_uri');

		if (empty($state) || empty($code)) redirect($redirect_uri);

		// extract fb
		$this->dataFB = $this->access->facebook->api('/me');

		$this->load->model('user_model');
		$user = $this->user_model->getUser($this->dataFB['id']);
		if ($user){
			
		}else{
			$user = array(
				'EmailUser' => $this->dataFB['email'],
				'NamaUser' => $this->dataFB['name'],
				'Username' => $this->dataFB['username'],
				'FBId' => $this->dataFB['id']
			);
			$user['UserID'] = $this->user_model->registerUser($user);
		}

		$this->access->userLogin($user);
		redirect($redirect_uri);

		//$this->_default_param("", "", "", "Register");
		//$this->load->view("t/auth/register_view", $this->data);
	}

	function logout(){
		$this->session->unset_userdata('islogin');
		$this->session->unset_userdata('users');
		redirect(base_url());
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