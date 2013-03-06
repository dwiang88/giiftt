<?php 

class Canvas_model extends CI_Model{

	function getCanvasCollection($fdi){
		$sql = "
		SELECT
		f.fotoid,
		f.fotodata,
		f.fotoori,
		f.crop_x,
		f.crop_y,
		f.crop_w,
		f.crop_h,
		f.style,
		f.urutan,
		f.filter,
		f.foto_detail_id,
		fd.foto_collection_id,
		fd.halaman,
		fd.templateid,
		fd.type,
		fd.backgroundid,
		fc.product_detail_id
		FROM
		foto f
		JOIN foto__detail fd ON
		fd.foto_detail_id = f.foto_detail_id
		JOIN foto__collection fc ON
		fc.foto_collection_id = fd.foto_collection_id 
		WHERE 1
		AND f.foto_detail_id = ?
		";
		$results = $this->db->query($sql, array($fdi))->result();
		$return = array();
		foreach ($results as $k => $v) {
			$return['info'] = array(
				'foto_detail_id' => $v->foto_detail_id,
				'foto_collection_id' => $v->foto_collection_id,
				'halaman' => $v->halaman,
				'templateid' => $v->templateid,
				'type' => $v->type,
				'backgroundid' => $v->backgroundid,
				'product_detail_id' => $v->product_detail_id
			);
			$return['images'][] = array(
				'fotoid' => $v->fotoid,
				'fotodata' => $v->fotodata,
				'fotoori' => $v->fotoori,
				'crop_x' => $v->crop_x,
				'crop_y' => $v->crop_y,
				'crop_w' => $v->crop_w,
				'crop_h' => $v->crop_h,
				'style' => $v->style,
				'urutan' => $v->urutan,
				'filter' => $v->filter
			);
		}
		return $return;
	}

	function createCollection($foto_collection_id, $product_detail_id){
		$sql = "
		SELECT 
		fc.*
		FROM
		foto__collection fc
		WHERE 1
		AND fc.foto_collection_id = ?
		";
		$results = $this->db->query($sql, array($foto_collection_id))->row_array();
		if (empty($results)){
			$sql = "
			INSERT INTO foto__collection SET
			product_detail_id = ?
			";
			$this->db->query($sql, array($product_detail_id));
			$foto_collection_id = $this->db->insert_id();
		}
		return $foto_collection_id;
	}

	function savePhotoDetail($halaman, $templateid, $type, $backgroundid = 0, $fotodetailid, $fotocollectionid){
		$this->load->library('util');
		if (empty($fotodetailid)){
			// create dan insert
			$code = $this->util->create_code(6, "number");
			$fotodetailid = $code;
			$sql = "
			INSERT INTO foto__detail SET
			foto_detail_id = ?,
			halaman = ?,
			templateid = ?,
			type = ?,
			backgroundid = ?,
			foto_collection_id = ?
			";
			$this->db->query($sql, array($fotodetailid, $halaman, $templateid, $type, $backgroundid, $fotocollectionid));
		}else{
			$sql = "
			UPDATE foto__detail SET
			halaman = ?,
			templateid = ?,
			type = ?,
			backgroundid = ?,
			foto_collection_id = ?
			WHERE 1
			AND foto_detail_id = ?
			";
			$this->db->query($sql, array($halaman, $templateid, $type, $backgroundid, $fotocollectionid, $fotodetailid));
		}
		return $fotodetailid;
	}

	function savePhoto($images, $fotodetailid){
		foreach($images as $image){

			$fileName = $image['tmpfotodata'];
			if (empty($fileName)){
				$fotodata = $image['fotodata'];
				$filteredData = substr($fotodata, strpos($fotodata, ",")+1);
				$unencodedData=base64_decode($filteredData);
				$this->load->library('util');
				$fileName = 'img/imgedit/' . $image['fileName'] . '_' . $this->util->create_code(3, 'text') . '.jpg';
				$fp = fopen($fileName , 'wb' );
				fwrite( $fp, $unencodedData);
				fclose( $fp );
				$fileName = cdn_url() . $fileName;
			}

			$sql = "
			SELECT 
			f.foto_detail_id,
			f.urutan
			FROM
			foto f
			WHERE 1
			AND f.foto_detail_id = ?
			AND f.urutan = ?
			";
			$results = $this->db->query($sql, array($fotodetailid, $image['urutan']))->row_array();
			if (empty($results)){
				$sql = "
				INSERT INTO foto SET
				fotodata = ?,
				fotoori = ?,
				crop_x = ?,
				crop_y = ?,
				crop_w = ?,
				crop_h = ?,
				style = ?,
				urutan = ?,
				foto_detail_id = ?,
				filter = ?
				";
				$this->db->query($sql, array(
					$fileName,
					$image['fotoori'],
					$image['crop_x'],
					$image['crop_y'],
					$image['crop_w'],
					$image['crop_h'],
					$image['style'],
					$image['urutan'],
					$fotodetailid,
					$image['filter']
				));
			}else{
				$sql = "
				UPDATE foto SET
				fotodata = ?,
				fotoori = ?,
				crop_x = ?,
				crop_y = ?,
				crop_w = ?,
				crop_h = ?,
				style = ?,
				filter = ?
				WHERE 1
				AND urutan = ? 
				AND foto_detail_id = ?
				";
				$this->db->query($sql, array(
					$fileName,
					$image['fotoori'],
					$image['crop_x'],
					$image['crop_y'],
					$image['crop_w'],
					$image['crop_h'],
					$image['style'],
					$image['filter'],
					$image['urutan'],
					$fotodetailid,
				));
			}
		}
	}

}

?>