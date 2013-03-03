<?php 

class Product_model extends CI_Model {

	function getProduct($uri){
		$sql = "
		SELECT 
		p.product_id,
		p.product_name,
		p.product_uri,
		p.product_status
		FROM 
		product p
		WHERE 1
		AND p.product_uri = ?
		AND p.product_status = 'online'
		";
		$results = $this->db->query($sql, array($uri))->row();
		return $results;
	}

	function getProductSize($product_id){
		$sql = "
		SELECT 
		pd.product_detail_id,
		pd.product_id,
		pd.product_size,
		pd.product_prize,
		pd.commision
		FROM
		product__detail pd
		WHERE 1
		AND pd.product_id = ?
		";
		$results = $this->db->query($sql, array($product_id))->result();
		return $results;
	}

}

?>