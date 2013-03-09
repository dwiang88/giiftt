<?php $this->load->view('t/general/header_view', $this->data); ?>

<div class="container container_content" style="margin-bottom:200px;min-height:300px;">

	<div class="row shopping_cart_container">

		<div class="span8">
			<fieldset>
				<legend>Shipping Information</legend>
				<form class="">

   					<label class="control-label" for="recipientName"><b>Recipient Name</b></label>
   					<input type="text" class="input-xlarge" id="recipientName" placeholder="" style="width:610px;" />

   					<label class="control-label" for="shippingAddress"><b>Shipping Address</b></label>
   					<textarea style="width:610px;height:70px;" id="shippingAddress"></textarea>

   					<div class="row">
   						<div class="span4">
   							<label class="control-label" for="selectCountry"><b>Country</b></label>
   							<select id="selectCountry" class="input-large" style="width:300px;">
   								<option name="Indonesia">Indonesia</option>
   							</select>

   							<label class="control-label" for="postalCode"><b>Postal Code</b></label>
   							<input type="text" class="input-large" id="postalCode" placeholder="" style="width:285px;" />
   						</div>
   						<div class="span4">
   							<label class="control-label" for="selectProvince"><b>Province / State</b></label>
   							<select id="selectProvince" class="input-large" style="width:300px;">
   								<option name="DKI Jakarta">DKI Jakarta</option>
   								<option name="Sumatera Selatan">Sumatera Selatan</option>
   							</select>

   							<label class="control-label" for="phoneNumber"><b>Phone Number</b></label>
   							<input type="text" class="input-large" id="phoneNumber" placeholder="" style="width:285px;"  />
   						</div>
   					</div>

   					<div class="" style="margin-top:10px;">
   						<button type="submit" name="pay" id="pay" class="btn btn-success">Continue Order</button>
   					</div>

				</form>
			</fieldset>
		</div>
		<div class="span4">
			<fieldset>
				<div class="alert" style="padding-right:14px;">
               <h2 style="margin-top:0;margin-bottom:0;">Order Summary</h2>
               <div class="label label-warning">Order Id : 349300</div>
               <div class="products" style="width:100%;">
                  <table class="table" style="margin-bottom:0;">
                     <tr>
                        <td style="padding-left:0;">
                           <h3>Canvas</h3>
                           <p>20x30(cm)</p>
                           <span class="label label-info">Price : IDR 40,000.00</span>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding-left:0;">
                           <h3>Canvas</h3>
                           <p>20x30(cm)</p>
                           <span class="label label-info">Price : IDR 40,000.00</span>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding-left:0;"><small>Total</small> <b style="float:right;">IDR 80,000.00</b></td>
                     </tr>
                  </table>
               </div>
            </div>
			</fieldset>
		</div>

	</div>

</div>

<?php $this->load->view('t/general/footer_view', $this->data); ?>