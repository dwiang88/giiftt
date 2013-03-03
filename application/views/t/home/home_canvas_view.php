<?php $this->load->view('t/general/header_view', $this->data); ?>

<div class="container container_content">

	<div class="showcase show_canvas canvas1_frame">
		<div class="canvas1_img"></div>
		<div class="canvas1_detail">
			<h2>Say Goodbye to <b>Plain Walls</b></h2>
			<h3>Decorate It with Your Favorite Photos.</h3>
			<h4>Starting at <b>IDR 250.000</b></h4>
			<a href="<?php echo $this->access->loginUrl; ?>" class="btn btn-inverse">Create Now</a>
		</div>
	</div>

	<div class="showcase show_border_frame canvas2_frame">
		<div class="canvas2_detail">
			<h2>High Quality Canvas</h2>
			<p>We know that some moments are just too great to be kept stored in your camera. And great photos deserve to be printed only on the best quality canvas. So your vibrant image and its popping image will remain on textured feel to revisit through a lifetime.</p>
		</div>
		<div class="canvas2_img"></div>
	</div>

</div>

<?php $this->load->view('t/general/footer_view', $this->data); ?>