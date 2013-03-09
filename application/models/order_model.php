<?php 

class Order_model extends CI_Model{

	function addOrder($shoppingCart){
		$sql = "
		SELECT
		fc.foto_collection_id,
		fc.product_detail_id,
		pd.product_id,
		pd.product_size,
		pd.commision,
		pd.product_prize,
		p.product_name
		FROM
		foto__collection fc
		JOIN product__detail pd ON
		fc.product_detail_id = pd.product_detail_id
		JOIN product p ON
		p.product_id = pd.product_id
		WHERE 1
		AND fc.foto_collection_id IN ( ".$shoppingCart." )
		AND fc.status = 'online'
		";
		$sql = $this->db->query($sql);
		return $sql->result();
	}

}

?>