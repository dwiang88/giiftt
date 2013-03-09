<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('memcached_library');
		if (!$this->session->userdata('islogin')) redirect(base_url());
	}

	function shopping_cart(){

		$shoppingCart = $this->session->userdata('shoppingCart');
		$this->data['shoppingCart'] = $shoppingCart;

		//echo '<pre>';
		//print_r($shoppingCart);
		//echo '</pre>';

		$fotocollectionid = array();
		foreach ($shoppingCart as $k => $v) {
			$fotocollectionid[] = $v['fotocollectionid'];
		}

		$fotocollectionid_string = implode(",", $fotocollectionid);
		//$this->session->unset_userdata('shoppingCart');

		$this->load->model('order_model');
		$order = $this->order_model->addOrder($fotocollectionid_string);
		$this->data['order'] = $order;

		//echo '<pre>';
		//print_r($order);
		//echo '</pre>';

		//die();

		$this->_default_param(
			array(
			)
			, 
			array(
			)
			, "", "Shopping Cart");
		$this->load->view("t/checkout/shopping_cart_view", $this->data);
	}

	function checkout_payment(){
		$this->_default_param(
			array(
			)
			, 
			array(
			)
			, "", "Checkout Payment");
		$this->load->view("t/checkout/checkout_payment_view", $this->data);	
	}

	function session_shopcart(){
		$this->session->unset_userdata('shoppingCart');
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