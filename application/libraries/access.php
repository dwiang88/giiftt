<?php 

class Access {

	var $ci;

	function __construct(){
		$this->ci =& get_instance();
	}

	function accessUser(){
		$this->ci->load->library('facebook_library');
		$this->ci->facebook_library->connection();
		$this->facebook = $this->ci->facebook_library->facebook;
		// get user id
		$this->user = $this->facebook->getUser();
		$this->loginUrl = $this->facebook->getLoginUrl(array(
			'scope' => 'email,user_hometown,user_location,user_photos',
			'redirect_uri' => base_url() . 'auth/register'
		));
		$this->logoutUrl = $this->facebook->getLogoutUrl();
	}

	function userLogin($dataUser){
		// data user to session
		$this->ci->session->set_userdata('islogin', true);
		$this->ci->session->set_userdata('users', $dataUser);
		/*
		$this->ci->session->set_userdata('FBId', $dataUser['FBId']);
		$this->ci->session->set_userdata('Username', $dataUser['Username']);
		$this->ci->session->set_userdata('NamaUser', $dataUser['NamaUser']);
		$this->ci->session->set_userdata('EmailUser', $dataUser['EmailUser']);
		$this->ci->session->set_userdata('UserID', $dataUser['UserID']);
		*/
	}

}

?>