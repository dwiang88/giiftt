<?php $this->load->view('a/general/header_view', $this->data); ?>

<div class="container" style="margin-top:100px;">
	<form class="form-inline">
	  <input type="text" class="input-small" placeholder="Email">
	  <input type="password" class="input-small" placeholder="Password">
	  <label class="checkbox">
		<input type="checkbox"> Remember me
	  </label>
	  <button type="submit" class="btn">Sign in</button>
	</form>
</div>

<?php $this->load->view('a/general/footer_view', $this->data); ?>
