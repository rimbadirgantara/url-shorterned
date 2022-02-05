
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="<?= base_url('assets/'); ?>img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>Forget password</h2>
			<div class="site-breadcrumb">
				<a href="<?= base_url('a'); ?>">Log in</a>  /
				<span>Forget password</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->
	<!-- Contact page -->
	<section class="contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 order-2 order-lg-1">
					<?php form_open('log_in/forget_password'); ?>
						<form class="contact-form" action="" method="post">
							<?= form_error('email', '<p style="color: red;">', '</p>'); ?>
							<input type="text" name="email" id="email" placeholder="Your e-mail" autofocus="" autocomplete="off">

							<button class="site-btn" type="submit">Reset password<img src="<?= base_url('assets/'); ?>img/icons/double-arrow.png" alt="#"/></button>
						</form>
					<?php form_close(); ?>
				</div>
				<div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
					<h3>Hi!</h3>
					<p>Need help? <br>please fill in the data form that has been provided.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->