


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="<?= base_url('assets/'); ?>img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>Register</h2>
			<div class="site-breadcrumb">
				<a href="<?= base_url('log_in'); ?>">Log in</a>  /
				<span>Register</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->
	<!-- Contact page -->
	<section class="contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 order-2 order-lg-1">
					<?php form_open('log_in/register'); ?>
						<form class="contact-form" action="" method="post">
							<?= form_error('email', '<p style="color: red;">', '</p>'); ?>
							<input type="text" name="email" id="email" placeholder="Your e-mail" autocomplete="off" autofocus="">

							<?= form_error('password', '<p style="color: red;">', '</p>'); ?>
							<input type="password" name="password" id="password" placeholder="Your password">

							<button class="site-btn" type="submit">Register<img src="<?= base_url('assets/'); ?>img/icons/double-arrow.png" alt="#"/></button>
						</form>
					<?php form_close(); ?>
				</div>
				<div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
					<h3>Hi!</h3>
					<p>Need help? <br>Please fill in the data form that has been provided.</br>User real e-mail to veryfication</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->