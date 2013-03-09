<?php $this->load->view('t/general/header_view', $this->data); ?>

<div class="container container_content" style="margin-bottom:200px;min-height:300px;">

	<div class="row shopping_cart_container">

		<?php 
		if (empty($order)){
		?>
		<div class="alert alert-info">
			Oooops... You have not made an order yet
		</div>
		
		<?php }else{ ?>

		<h2>You have <?php echo count($order); ?> item in Shopping cart</h2>
		<table class="table">
			<thead>
				<tr>
					<th>Item Description</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>

				<?php 
				$total_price = 0;
				foreach($order as $k => $v){ 
				?>
				<tr>
					<td class="tableItemDetail">
						<h3><?php echo ucfirst($v->product_name); ?></h3>
						<p><?php echo $v->product_size; ?>, White</p>
					</td>
					<td class="tableQty">
						<select name="qty" class="input-mini">
							<?php 
							for($i=1; $i<=10; $i++){
							?>
							<option value="<?php echo $i; ?>" <?php echo ($i == $shoppingCart[$v->foto_collection_id]['qty']) ? "selected" : ""; ?>><?php echo $i; ?></option>
							<?php
							}
							?>
						</select>
					</td>
					<td class="tablePrice">
						<?php 
							$price = $v->commision + $v->product_prize; 
							$total_price += $price;
						?>
						<b>IDR <?php echo number_format($price, 2); ?></b>
						<span class="">
							<button name="edit" type="button" id="edit" class="btn btn-small">Edit</button>
							<button name="remove" type="button" id="remove" class="btn btn-small">Remove</button>
						</span>
					</td>
				</tr>
				<?php } ?>
				
				<?php /*
				<tr>
					<td class="tableItemDetail">
						
					</td>
					<td class="tableQty">
						
					</td>
					<td class="tablePrice">
						<div class="input-prepend input-append">
						  <span class="add-on">Enter Coupon Code : </span>
						  <input class="input-xlarge" id="coupon_code" type="text">
						</div>
					</td>
				</tr> */
				?>

				<tr class="alert alert-info">
					<td class="tableItemDetail">
						
					</td>
					<td class="tableQty">
						<b>Total Price</b>
					</td>
					<td class="tablePrice">
						<b class="">IDR <?php echo number_format($total_price, 2); ?></b>
						<span class="">
							<button name="confirm_payment" type="button" id="confirm_payment" class="btn btn-warning">Pay Now</button>
						</span>
					</td>
				</tr>

			</tbody>
		</table>
		
		<?php } ?>

	</div>

</div>

<?php $this->load->view('t/general/footer_view', $this->data); ?>