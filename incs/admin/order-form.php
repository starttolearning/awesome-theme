<form id="tbContactForm" class="tb-contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
	<div class="form-group tb-form-control">
		<input type="text" placeholder="Your Name" id="name" name="name"  class="form-control">
		<small class="text-danger form-control-msg" > Your Name is required.</small>
	</div>

	<div class="form-group tb-form-control">
		<input type="email" placeholder="Your Email" id="email" name="email"  class="form-control">
		<small class="form-control-msg text-danger" > Your Email is required.</small>
	</div>

	<div class="form-group tb-form-control">
		<textarea placeholder="Your Message" id="message" name="message"  class="form-control"></textarea>
		<small class="form-control-msg text-danger" > Your Message is required.</small>
	</div>
	
	<div class="form-group">
       <label for="file-uploader">上传文件</label>
       <input type="file" id="file-uploader">
    </div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-default tb-btn">提交</button>
		<small class="text-info form-control-msg js-form-submission">Submission in process, please wait...</small>
		<small class="text-success form-control-msg js-form-success">Message successfuly submited, thank you!</small>
		<small class="text-danger form-control-msg js-form-danger">There has problem in contact, try again later.</small>
	</div>
	
</form>