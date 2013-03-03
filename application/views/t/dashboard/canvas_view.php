<?php $this->load->view('t/general/header_view', $this->data); ?>

<div class="container container_content" style="margin-top:80px;">

	<div class="container_title">
		<h3>Canvas</h3>
	</div>

	<div class="photo_toolbar">	

		<div class="tool_selectsize">
			<h5>1. Select Size</h5>
			<ul id="selectSize">
				<?php 
				$selectedPrize = $class = $product_detail_id_selected = "";
				foreach($product_size as $k=>$v){
					$class = "";
					if ($k == 0) {
						$selectedPrize = ($v->product_prize + $v->commision);
						$class = "tmpl_active";
						$product_detail_id_selected = $v->product_detail_id;
					}
				?>
				<li class="tmpl tmpl1 <?php echo $class; ?>"
				data-productprize="<?php echo "IDR " . number_format( ($v->product_prize + $v->commision) , 2); ?>"
				data-productdetailid="<?php echo $v->product_detail_id; ?>"
				>
					<span class="display"><?php echo $v->product_size; ?></span>
				</li>
				<?php } ?>
			</ul>
			<div class="clearfix"></div>
			<div class="price_container alert alert-block">
				<div class="row">
					<div class="span4">Total Price : <span id="priceDisplay">IDR <?php echo number_format($selectedPrize, 2) ?></span></div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="tool_template">
			<h5>2. Select Template</h5>
			<ul id="selectTemplate">
				<li class="tmpl tmpl1 tmpl_active" data-template="1">
					<span class="display"></span>
				</li>
				<li class="tmpl tmpl2" data-template="2">
					<span class="display"></span>
				</li>
				<li class="tmpl tmpl3" data-template="3">
					<span class="display"></span>
				</li>
				<li class="tmpl tmpl4" data-template="4">
					<span class="display"></span>
				</li>
				<li class="tmpl tmpl5" data-template="5">
					<span class="display"></span>
				</li>
				<li class="tmpl tmpl6" data-template="6">
					<span class="display"></span>
				</li>
			</ul>
		</div>

		<div class="clearfix"></div>
	</div>


	<h5>3. Design</h5>
	<div class="canvas_wrapper" >

		<?php /***

		<!--
		<a href="#" class="btn btn-mini btn-change-image">Select Image</a>
		-->

		<!--
		<div class="canvas">
			<div class="canvas_template canvas_template1">
				<div class="block block1">
					<img src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					alt="Image" style="display:none;" class="canvas_image" />

					<div class="filter_effect">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
			</div>
		</div>
		-->
		

		<!--
		<div class="canvas">
			<div class="canvas_template canvas_template2">
				<div class="block block1">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block2">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block3">
					<img src="<?php echo cdn_url(); ?>images/exphoto5.jpg" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto5.jpg" 
					alt="Image" style="display:none;" 
					class="canvas_image"
					/>
					<div class="filter_effect">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
			</div>
		</div>
		-->		

		
		<!--
		<div class="canvas">
			<div class="canvas_template canvas_template3">
				<div class="block block1">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect ">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block2">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block3">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block4">
					<img src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					alt="Image" style="display:none;" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
			</div>
		</div>		
		-->		

		
		<!--
		<div class="canvas">
			<div class="canvas_template canvas_template4">
				<div class="block block1">
					<img src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					alt="Image" style="display:none;" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block2">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block3">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block4">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block5">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect small_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
			</div>
		</div>	
		-->


		<!--
		<div class="canvas" style="height:680px">
			<div class="canvas_template canvas_template5">
				<div class="block block1">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block2">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block3">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block4">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				
				<div class="block block5">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block6">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block7">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block8">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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

				<div class="block block9">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block10">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block11">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block12">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
			</div>
		</div>	
		-->
		

		<!--
		<div class="canvas" style="height:680px">
			<div class="canvas_template canvas_template6">
				<div class="block block1">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block2">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block3">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block4">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				
				<div class="block block5">
					<img src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto6.jpg" 
					alt="Image" style="display:none;" class="canvas_image" />

					<div class="filter_effect">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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

				<div class="block block6">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block7">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block8">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
				<div class="block block9">
					<img src="<?php echo cdn_url(); ?>images/exphoto1.jpg" alt="Image" style="display:none;" 
					data-original-src="<?php echo cdn_url(); ?>images/exphoto1.jpg" 
					class="canvas_image"
					/>
					<div class="filter_effect xsmall_block">
						<ul>
							<li class="active"><img src="/images/filtereffects/original.jpg" class="img-polaroid" > <span>Original</span></li>
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
			</div>
		</div>	
		-->
		
		**/ ?>		

	</div>

		<div class="canvas_temp" id="canvas_temp_1" style="display:none;">
			<div class="canvas">
				<div class="canvas_template canvas_template1" data-halaman="1">
					<div class="block block1" data-urutan="1">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
				</div>
			</div>
		</div>
		<div class="canvas_temp" id="canvas_temp_2" style="display:none;">
			<div class="canvas">
				<div class="canvas_template canvas_template2" data-halaman="1">
					<div class="block block1" data-urutan="1">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block2" data-urutan="2">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block3" data-urutan="3">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
				</div>
			</div>
		</div>
		<div class="canvas_temp" id="canvas_temp_3" style="display:none;">
			<div class="canvas">
				<div class="canvas_template canvas_template3" data-halaman="1">
					<div class="block block1" data-urutan="1">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block2" data-urutan="2">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block3" data-urutan="3">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block4" data-urutan="4">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
				</div>
			</div>
		</div>
		<div class="canvas_temp" id="canvas_temp_4" style="display:none;">
			<div class="canvas">
				<div class="canvas_template canvas_template4" data-halaman="1">
					<div class="block block1" data-urutan="1">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block2" data-urutan="2">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block3" data-urutan="3">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block4" data-urutan="4">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block5" data-urutan="5">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
				</div>
			</div>
		</div>
		<div class="canvas_temp" id="canvas_temp_5" style="display:none;">
			<div class="canvas" style="height:680px">
				<div class="canvas_template canvas_template5" data-halaman="1">
					<div class="block block1" data-urutan="1">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block2" data-urutan="2">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block3" data-urutan="3">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block4" data-urutan="4">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>

					<div class="block block5" data-urutan="5">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block6" data-urutan="6">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block7" data-urutan="7">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block8" data-urutan="8">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>

					<div class="block block9" data-urutan="9">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block10" data-urutan="10">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block11" data-urutan="11">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block12" data-urutan="12">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
				</div>
			</div>
		</div>
		<div class="canvas_temp" id="canvas_temp_6" style="display:none;">
			<div class="canvas" style="height:680px">
				<div class="canvas_template canvas_template6" data-halaman="1">
					<div class="block block1" data-urutan="1">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block2" data-urutan="2">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block3" data-urutan="3">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block4" data-urutan="4">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>

					<div class="block block5" data-urutan="5">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>

					<div class="block block6" data-urutan="6">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block7" data-urutan="7">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block8" data-urutan="8">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
					<div class="block block9" data-urutan="9">
						<a href="#myModal" role="button" data-toggle="modal" class="btn btn-mini btn-change-image">Select Image</a>
					</div>
				</div>
			</div>
		</div>

	<div class="formSubmit">

		<input type="hidden" name="product_detail_id" id="product_detail_id" value="<?php echo $product_detail_id_selected; ?>" />
		<input type="hidden" name="templateid" id="templateid" value="1" />
		<input type="hidden" name="type" id="type" value="canvas" />
		<input type="hidden" name="fotodetailid" id="fotodetailid" value="0" />
		<input type="hidden" name="foto_collection_id" id="foto_collection_id" value="0" />

		<button type="button" id="saveDesign" class="btn btn-inverse">Save Design</button>
		<button type="button" id="addToCart" class="btn btn-warning">Add to Cart</button>
		<button type="button" id="payNow" class="btn btn-success">Pay Now</button>
	</div>

	<div class="clearfix"></div>

</div>


<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" id="modelClose" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Select Photo</h3>
  </div>
  <div class="modal-body">
   		<ul class="nav nav-tabs" id="albumTab">
  			<li class="active" rel="facebookTab"><a href="#facebookTab" rel="facebookAlbum" id="facebookTabButton">Facebook</a></li>
  			<li rel="instagramTab"><a href="#instagramTab" rel="instagram">Instagram</a></li>
  			<li rel="computerTab"><a href="#computerTab" rel="mycomputer">My Computer</a></li>
		</ul>
		<div id="tabContent" class="tab-content">
			<div class="tab-pane fade active in" id="facebookTab">	

				<ul class="breadcrumb" id="breadcrumbFacebook" style="display:none;margin-bottom:8px;">
				  	<li class="breadcrumbBack"><a href="#">Back</a> <span class="divider">/</span></li>
				</ul>

				<div class="loader_container" style="display:none;">
					<div class="loader">
		                <div class="circle"></div>
		                <div class="circle"></div>
		                <div class="circle"></div>
		                <div class="circle"></div>
		                <div class="circle"></div>
		            </div>
				</div>

				<ul class="galleryPhoto">
					
				</ul>
			</div>
			<div class="tab-pane fade " id="instagramTab">

			</div>
			<div class="tab-pane fade " id="computerTab">

			</div>
		</div>
  </div>
  <div class="modal-footer" style="display:none;">
    <button class="btn btn-primary" id="selectImage">Select Change</button>
  </div>
</div>



<?php $this->load->view('t/general/footer_view', $this->data); ?>