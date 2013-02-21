<?php
	if(!defined('BASEPATH'))
		exit('No Direct Script Access Allowed');
class Gambar extends CI_Model
{
	function _construct()
	{
		parent::_construct();	
	
	}
	
	function simpangambar($dok)
	{
		$filename = $dok['file_name'];
		$d = new DateTime('', new DateTimeZone('Asia/Jakarta')); 		
		$date = $d->format('Y-m-d');
		$size = $dok['file_size'];
		
		$query="insert into file(FileName,FileDate,FileSize) values('$filename','$date',$size)";
		
		$this->db->query($query);
		
		$this->db->close();
		
	}
	
	function viewgambar()
	{
		$query = "select * from file";
		$rs = $this->db->query($query);
		return $rs;
	}

}
?>