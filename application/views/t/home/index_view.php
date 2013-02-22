<?php $this->load->view('t/general/header_view', $this->data); ?>

<div class="container container_content">

	<div class="figure">
		<div class="figure_image"></div>
		<div class="figure_detail">
			<h2>Photo <b>Book</b></h2>
			<h3>Memories do last a lifetime</h3>
		</div>
	</div>

	<div class="section">
		<ul class="clearfix">
			<li>
				<a href="#">
					<img src="<?php echo cdn_url(); ?>images/photobook2.png" alt="PhotoBook" title="PhotoBook" />
					<h3>Photo Book</h3>
					<h4>Perform & Design</h4>
				</a>
			</li>
			<li>
				<a href="#">
					<img src="<?php echo cdn_url(); ?>images/canvas2.png" alt="Canvas" title="Canvas" />
					<h3>Canvas</h3>
					<h4>Perform & Design</h4>
				</a>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>

</div>

<?php $this->load->view('t/general/footer_view', $this->data); ?>