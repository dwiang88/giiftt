<?php
	if(!defined('BASEPATH'))
		exit('No Direct Script Access Allowed');
		
class Download extends CI_Controller{
	function _construct()
	{
		parent::_construct();
		//$this->load->helper(array('url','form'));
	}
	
	function index()
	{
		$this->load->model("gambar");
		$temp['gambar'] = $this->gambar->viewgambar();
		$this->load->view("download",$temp);

	}
	
	function upload()
	{
		$config['upload_path'] = './gambar/';
		$config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = 'TRUE';			
		$this->load->library('upload', $config);
		$this->upload->do_upload('file');
		$dok= $this->upload->data();
		$this->load->model("gambar");
		$this->gambar->simpangambar($dok);
		$this->index();

	}
	
	function downloadgambar($id,$name,$size)
	{
	$this->load->helper('download');

	$data = file_get_contents("./gambar/".$name); // Read the file's contents
    $name = $id.'_'.$size.'_'.$name;
    force_download($name, $data);
	}
	
	function downloadall()
	{
		$this->load->library('zip');

		$this->load->model("gambar");
		$temp = $this->gambar->viewgambar();		
		foreach($temp->result_array() as $row)
		{
				$data = file_get_contents("./gambar/".$row['FileName']); // Read the file's contents
				$name = $row['FileID'].'_'.$row['FileSize'].'_'.$row['FileName'];
				$this->zip->add_data($name, $data);
		}
		$this->zip->download('gambar.zip');

	}
}

?>