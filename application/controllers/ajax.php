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
					$dataAlbumFB = $this->access->facebook->api('/'.$id.'/photos');
					$dataAlbumFB = $dataAlbumFB['data'];
					$dicAlbumFB = array();
					foreach ($dataAlbumFB as $k => $v) {
						$images = current($v['images']);
						$dicAlbumFB[] = array(
							'cover_photo' => $v['source'],
							'picture' => $v['picture'],
							'id' => $v['id'],
							'images' => $images
						);
					}
					$this->memcached_library->set('dicAlbumFB#' . $id, $dicAlbumFB, 60 * 60 * 24);
				}

				$album = '';
				foreach ($dicAlbumFB as $k => $v) {
					$image_hq = $v['images']['source'];
					$image_ori = $v['cover_photo'];
					$picture = $v['picture'];
					$album .= '
					<li class="" data-albumid="'.$v['id'].'" data-hq-img="'.$image_hq.'" data-ori-img="'.$image_ori.'">
						<img src="'.$picture.'" alt="'.$v['id'].'" class="img-polaroid" />
					</li>
					';
				}

				echo json_encode(array('album' => $album));

				break;
		}

	}

}

?>