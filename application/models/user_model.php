<?php 

class User_model extends CI_Model{

	function getUser($FbId){
		$sql = "
		SELECT 
		UserID,
		Username,
		NamaUser,
		FBId,
		EmailUser
		FROM
		user u
		WHERE 1
		AND u.FBId = ?
		LIMIT 1
		";
		$results = $this->db->query($sql, array($FbId))->row_array();
		return $results;
	}

	function registerUser($dataUsers){
		$sql = "
		INSERT INTO user SET
		Username = ?,
		NamaUser = ?,
		FBId = ?,
		EmailUser = ?
		";
		$this->db->query($sql, array(
			$dataUsers['Username'],
			$dataUsers['NamaUser'],
			$dataUsers['FBId'],
			$dataUsers['EmailUser']
		));
		return $this->db->insert_id();
	}

}

?>