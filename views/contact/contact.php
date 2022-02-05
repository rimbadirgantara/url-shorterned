
	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="<?= base_url('assets/'); ?>img/page-top-bg/4.jpg">
		<div class="page-info">
			<h2>Contact</h2>
			<div class="site-breadcrumb">
				<a href="<?= base_url('a'); ?>">Home</a>  /
				<span>Contact</span>
			</div>
		</div>
	</section>
	<!-- Page top end-->
	<!-- Contact page -->
	<section class="contact-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 order-2 order-lg-1">
					<?php form_open('a/contact'); ?>
						<form class="contact-form" action="" method="post">
							<?= form_error('name', '<p style="color: red;">', '</p>'); ?>
							<input type="text" name="name" id="name" placeholder="Your name">

							<?= form_error('email', '<p style="color: red;">', '</p>'); ?>
							<input type="text" name="email" id="email" placeholder="Your e-mail">

							<?= form_error('subject', '<p style="color: red;">', '</p>'); ?>
							<input type="text" name="subject" id="subject" placeholder="Subject">

							<?= form_error('message', '<p style="color: red;">', '</p>'); ?>
							<textarea name="message" id="message" placeholder="Message"></textarea>
							<button class="site-btn" type="submit">Send message<img src="<?= base_url('assets/'); ?>img/icons/double-arrow.png" alt="#"/></button>
						</form>
					<?php form_close(); ?>
				</div>
				<div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
					<h3>Hi!</h3>
					<p>Need help? <br>please fill in the data form that has been provided.</br>PLEASE USE POLICY LANGUAGE !!!</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact page end-->