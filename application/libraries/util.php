<?php 

class Util {

	//Alternative Image Saving Using cURL seeing as allow_url_fopen is disabled - bummer
	function save_image($img,$fullpath, $fileName, $dir, $ext){
	    $ch = curl_init ($img);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	    $rawdata=curl_exec($ch);
	    curl_close ($ch);
	    if(file_exists($fullpath)){
	        //unlink($fullpath);
	        $fullpath = $dir . $fileName . '_' . $this->create_code(3, 'text') . $ext;
	    }
	    $fp = fopen($fullpath,'x');
	    fwrite($fp, $rawdata);
	    fclose($fp); 
	}

	function create_code( $length = 7, $type = 'text' ) {
		if( $type == 'number' ) $chars = "023456789";
		else $chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i < $length) {
			$num = rand() % strlen($chars);
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}

}

?>