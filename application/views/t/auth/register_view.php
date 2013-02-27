<?php $this->load->view('t/general/header_view', $this->data); ?>

<div class="container container_content">

	<div class="row ">
		<div class="span7 row_border">

			<div class="pp_frame_block">
				<img src="https://graph.facebook.com/<?php echo $this->dataFB['id']; ?>/picture?width=159&height=159" alt="photoprofile" />
			</div>

			<form class="form-horizontal form_register">
			  <div class="control-group">
			    <label class="control-label" for="inputEmail">Email</label>
			    <div class="controls">
			      <input type="text" id="inputEmail" class="input-xlarge" placeholder="Email" value="<?php echo $this->dataFB['email']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputName">Name</label>
			    <div class="controls">
			      <input type="text" id="inputName" class="input-xlarge" placeholder="Name" value="<?php echo $this->dataFB['name']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputUsername">Username</label>
			    <div class="controls">
			      <input type="text" id="inputUsername" class="input-xlarge" placeholder="Username" value="<?php echo $this->dataFB['username']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <div class="controls">
			      <button type="submit" class="btn">Let's Go</button>
			    </div>
			  </div>
			</form>

		</div>
	</div>

</div>

<?php $this->load->view('t/general/footer_view', $this->data); ?>