<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	var $data = array();
	var $ismobile = FALSE;
	
	function __construct(){
		parent::__construct();
		$this->data['default_title'] = default_title;
		$this->data['css_tags'] = array();
		$this->data['js_tags'] = array();
		
		// for smartphone
		//$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		//if(stripos($ua,'android') !== false ||
		//strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || 
		//strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) { // && stripos($ua,'mobile') !== false) {
		if ($this->detect_mobile() === TRUE){
			$this->ismobile = TRUE;
		}
	}
	
	function detect_mobile(){
		if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|sagem|sharp|sie-|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT']))
			return true;
		else
			return false;
	}
	
	function default_param($css = array(), $js = array(), $meta = array(), $title = ""){
				
		$default_meta = "";
		if (!empty($meta)) $default_meta = implode("", $meta);
		
		$default_css = array(
			'css/smoothness/jquery-ui-1.10.1.custom.css',
			'css/bootstrap.css'
		);
		
		if (!empty($css)) $css = array_merge($default_css, $css);
		else $css = $default_css;
		
		$default_js = array(
			'js/jquery-1.9.1.js',
			'js/jquery-ui-1.10.1.custom.js',
			'js/jquery.easing.1.3.js',
			'js/bootstrap.js'
		);
		
		if (!empty($js)) $js = array_merge($default_js, $js);
		else $js = $default_js;
		
		$this->data['css_tags'] = cdn_url() . 'min/?f=' . implode(',', $css);
		$this->data['js_tags'] = cdn_url() . 'min/?f=' . implode(',', $js);
		$this->data['meta_tags'] = $default_meta;
		$this->data['title'] = $title . " | " . default_title;
	}

}

?>