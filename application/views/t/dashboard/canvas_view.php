<?php $this->load->view('t/general/header_view', $this->data); ?>

<div class="container container_content" style="margin-top:80px;">

	<div class="container_title">
		<h3>Canvas</h3>
	</div>

	<div class="row">

		<div class="span8" style="position:relative;height:425px;">
			<div class="canvas_wrapper">
				<div class="canvas"></div>
			</div>
		</div>
		<div class="span4">
			<div class="photo_toolbar">
				<div class="tool_template">
					<h5>Template</h5>
					<ul>
						<li class="tmpl tmpl1 tmpl_active">
							<span class="display"></span>
						</li>
						<li class="tmpl tmpl2">
							<span class="display"></span>
						</li>
						<li class="tmpl tmpl3">
							<span class="display"></span>
						</li>
						<li class="tmpl tmpl4">
							<span class="display"></span>
						</li>
						<li class="tmpl tmpl5">
							<span class="display"></span>
						</li>
						<li class="tmpl tmpl6">
							<span class="display"></span>
						</li>
						<li class="tmpl tmpl7">
							<span class="display"></span>
						</li>
					</ul>
				</div>

				<div class="clearfix"></div>

				<div class="tool_selectsize">
					<h5>Size</h5>
					<ul>
						<li class="tmpl tmpl1 tmpl_active">
							<span class="display">20x15(cm)</span>
						</li>
						<li class="tmpl tmpl2">
							<span class="display">25x20(cm)</span>
						</li>
						<li class="tmpl tmpl3">
							<span class="display">30x25(cm)</span>
						</li>
					</ul>
				</div>

				<div class="clearfix"></div>
				
				<div class="tool_selectsize">
					<div class="row">
						<div class="span2">
							<h5>Quantity</h5>
							<select name="qty" id="qty" class="span2">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="span2">
							<h5>Spin Color</h5>
							<select name="qty" id="qty" class="span2">
								<option value="White">White</option>
								<option value="Black">Black</option>
							</select>
						</div>
					</div>
				</div>

				<div class="clearfix"></div>

				<div class="tool_totalprice">
					<div class="row">
						<div class="span1 span_label">Total Price</div>
						<div class="span3 span_price">IDR 350.000</div>
						<div class="span2 span_btn"><button type="submit" class="btn btn-warning" name="checkout" id="checkout">Pay Now</button></div>
					</div>
				</div>

				<div class="clearfix"></div>

			</div>
		</div>
	</div>

</div>

<?php $this->load->view('t/general/footer_view', $this->data); ?>