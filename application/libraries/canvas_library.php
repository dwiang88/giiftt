<?php 

class Canvas_library {

	var $CI;

	function __construct(){
		$this->CI =& get_instance();
	}

	function selectTemplate($templateId, $images){
		$r = $this->createTemplate($templateId, $images);
		return $r;
	}

	/*
	format image:
	'<img src="'+data.albumHq+'" alt="Image" style="" ' +
				'data-original-src="'+data.albumHq+'" '+
				'data-fileName="'+data.fileName+'"' +
				'data-crop_x=""' +
				'data-crop_y=""' +
				'data-crop_w=""' +
				'data-crop_h=""' +
				'data-filter="Original"' +
				'class="canvas_image" '+
				'/>'+
	*/

	/*template*/
	function createTemplate($templateId, $images){
		$images_string = $template = '';
		foreach ($images as $k => $image) {

			$style = $image['style'];
			$style = explode(";", $style);
			$style_dir = array();
			foreach ($style as $k => $v) {
				$a = explode(":", $v);
				if (empty($v) || empty($a) || (trim($a[0]) == "width" || trim($a[0]) == "height")) continue;
				$style_dir[] = $v;
			}
			$style_dir = implode(";", $style_dir);

			$filename = str_replace(".jpg", "", str_replace(base_url() . "img/imgedit/", "", $image['fotoori']));

			$images_string = '
			<img src="'.$image['fotodata'].'" 
			alt="Image"
			style="'.$style_dir.'"
			data-original-src="'.$image['fotoori'].'"
			data-fileName="'.$filename.'"
			data-crop_x="'.$image['crop_x'].'"
			data-crop_y="'.$image['crop_y'].'"
			data-crop_w="'.$image['crop_w'].'"
			data-crop_h="'.$image['crop_h'].'"
			data-filter="'.$image['filter'].'"
			data-fotodata="'.$image['fotodata'].'"
			class="canvas_image"
			/>
			';

			$template .= '
				<div class="block block'.$image['urutan'].'" data-urutan="'.$image['urutan'].'">
					'.$images_string.'
					<div class="filter_effect xsmall_block">
						<ul>
							<li class=""><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
							<li class=""><img src="/images/filtereffects/1997.jpg" class="img-polaroid" > <span>1977</span></li>
							<li class=""><img src="/images/filtereffects/brannan.jpg" class="img-polaroid" > <span>Brannan</span></li>
							<li class=""><img src="/images/filtereffects/gotham.jpg" class="img-polaroid" > <span>Gotham</span></li>
							<li class=""><img src="/images/filtereffects/have.jpg" class="img-polaroid" > <span>Hefe</span></li>
							<li class=""><img src="/images/filtereffects/inkwell.jpg" class="img-polaroid" > <span>Inkwell</span></li>
							<li class=""><img src="/images/filtereffects/lordkelvin.jpg" class="img-polaroid"> <span>Lord Kelvin</span></li>
							<li class=""><img src="/images/filtereffects/nashville.jpg" class="img-polaroid" > <span>Nashville</span></li>
							<li class=""><img src="/images/filtereffects/xproii.jpg" class="img-polaroid" > <span>X-PRO II</span></li>
						</ul>
					</div> 
				</div>
			';
		}
		$style = "";
		if ($templateId == 5 || $templateId == 6) {
			$style = "height:680px;";
		}
		return '
		<div class="canvas" style="'.$style.'">
			<div class="canvas_template canvas_template'.$templateId.'">
				'.$template.'
			</div>
		</div>
		';
	}


}

?>