<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller {

	function getPhotoAlbum(){
		$this->load->library('memcached_library');

		$type = $this->input->get_post('type');
		$id = $this->input->get_post('id');

		switch($type){
			case "facebookAlbum" :
				// extract fb
				$dicAlbumFB = $this->memcached_library->get('dicAlbumFB');
				if ($dicAlbumFB == FALSE){
					$dataAlbumFB = $this->access->facebook->api('/me/albums');
					$dataAlbumFB = $dataAlbumFB['data'];
					$dicAlbumFB = array();
					foreach ($dataAlbumFB as $k => $v) {
						$cover_photo = "https://graph.facebook.com/".$v['id']."/picture?type=album&access_token=" . $this->access->facebook->getAccessToken();
						$dicAlbumFB[] = array(
							'cover_photo' => $cover_photo,
							'name' => $v['name'],
							'id' => $v['id']
						);
					}
					$this->memcached_library->set('dicAlbumFB', $dicAlbumFB, 60 * 60 * 24);
				}

				$album = '';
				foreach ($dicAlbumFB as $k => $v) {
					$album .= '
					<li style="background-image:url('.$v['cover_photo'].')" class="img-polaroid" id="album_block" data-albumid="'.$v['id'].'">
						<span class="albumName">'.$v['name'].'</span>
					</li>
					';
				}

				echo json_encode(array('album' => $album));

				break;
			case "facebookAlbumPhoto" :
				$dicAlbumFB = $this->memcached_library->get('dicAlbumFB#' . $id);
				if ($dicAlbumFB == FALSE){
					$dicAlbumFB = array();
					$dataAlbumFBPar = array();
					do{
						$dataQueryAlbumFB = $this->access->facebook->api('/'.$id.'/photos', 'GET', $dataAlbumFBPar);
						$dataAlbumFB = $dataQueryAlbumFB['data'];
						foreach ($dataAlbumFB as $k => $v) {
							$images = current($v['images']);
							$dicAlbumFB[] = array(
								'cover_photo' => $v['source'],
								'picture' => $v['picture'],
								'id' => $v['id'],
								'images' => $images
							);
						}

						if (empty($dataQueryAlbumFB['paging'])) break;
						$dataAlbumPaging = $dataQueryAlbumFB['paging'];
						if (empty($dataAlbumPaging['next'])) break;
						$next = $dataAlbumPaging['next'];
						$query = parse_url($next, PHP_URL_QUERY);
   			 			parse_str($query, $par); 
   			 			$dataAlbumFBPar = array(
   			 				'limit' => $par['limit'],
   			 				'after' => $par['after']
   			 			);
					}while($dataAlbumFB);
					$this->memcached_library->set('dicAlbumFB#' . $id, $dicAlbumFB, 60 * 60 * 24);
				}

				$album = '';
				foreach ($dicAlbumFB as $k => $v) {
					$image_hq = $v['images']['source'];
					$image_ori = $v['cover_photo'];
					$picture = $v['picture'];
					$album .= '
					<li class="">
						<img src="'.$picture.'" alt="'.$v['id'].'" class="img-polaroid" 
						data-albumid="'.$v['id'].'" 
						data-hq-img="'.$image_hq.'" 
						data-ori-img="'.$image_ori.'"
						id="imgready"
						/>
					</li>
					';
				}

				echo json_encode(array('album' => $album));

				break;
		}

	}

	function saveImageURL(){
		$albumId = $this->input->get_post('albumId');
		$albumHq = $this->input->get_post('albumHq');
		$albumOri = $this->input->get_post('albumOri');
		//$this->load->library('wideimage_library');
		//$img = WideImage::load($albumHq);
		$url = 'img/imgedit/' . $albumId . '.jpg';
		//$img->saveToFile($url, 90);
		$this->load->library('util');
		$fileName = $this->util->save_image($albumHq, $url, $albumId, 'img/imgedit/', '.jpg');
		$url = 'img/imgedit/' . $fileName . '.jpg';
		echo json_encode(array(
			'albumHq' => cdn_url() . $url,
			'fileName' => $fileName
		));
	}

	function saveDesign(){
		$images = $this->input->get_post('images');
		$halaman = $this->input->get_post('halaman');
		$templateid = $this->input->get_post('templateid');
		$type = $this->input->get_post('type');
		$fotodetailid = $this->input->get_post('fotodetailid');
		$product_detail_id = $this->input->get_post('product_detail_id');
		$foto_collection_id = $this->input->get_post('foto_collection_id');
		$this->load->model('canvas_model');
		$fotocollectionid = $this->canvas_model->createCollection($foto_collection_id, $product_detail_id);
		$fotodetailid = $this->canvas_model->savePhotoDetail($halaman, $templateid, $type, $backgroundid = 0, $fotodetailid, $fotocollectionid);
		$this->canvas_model->savePhoto($images, $fotodetailid);
		echo json_encode(array(
			'fotodetailid' => $fotodetailid,
			'fotocollectionid' => $fotocollectionid
		));
	}

}

?>