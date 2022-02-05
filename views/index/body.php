


	<!-- Hero section -->
	<section class="hero-section overflow-hidden">
		<div class="hero-slider owl-carousel">
			<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="<?= base_url('assets/') ?>img/slider1-bg-1.jpg">
				<div class="container">
					<h2>R Short</h2>
					<p>A URL shortener built with powerful tools to help you.</p>
					<a href="<?= base_url('a/about'); ?>" class="site-btn">Read More  <img src="<?= base_url('assets/') ?>img/icons/double-arrow.png" alt="#"/></a>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end-->

	<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<h2>Get Started For Free</h2>
			<?= form_error('link', '<h5 style="color: red;">', '</h5>'); ?>
			<form class="newsletter-form" action="<?= base_url('a/c'); ?>" method="post">
				<input type="text" name="link" id="link" placeholder="ENTER YOUR LINK" autocomplete="off">
				<button class="site-btn" type="submit">SHORTEN  <img src="<?= base_url('assets/') ?>img/icons/double-arrow.png" alt="#"/></button>
			</form>
		</div>
	</section>
	<!-- Newsletter section end -->

	<!-- Intro section -->
	<section class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="intro-text-box text-box text-white">
						<div class="top-meta">1 Week Package <a href="<?php echo $week; ?>">(A WEEK)</a></div>
						<h3>Top 1 used by users</h3>
						<p>Buy this package! by purchasing this, your link will not pass through the ad page for 1 week</p>
						<a href="<?php echo $week; ?>" class="read-more">Buy it at a price of Rp. 5,000.00-,</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-text-box text-box text-white">
						<div class="top-meta">1 Month Package <a href="<?php echo $month; ?>">(A MONTH)</a></div>
						<h3>Top 2 used by users</h3>
						<p>Buy this package! by purchasing this, your link will not pass through the ad page for 1 month</p>
						<a href="<?php echo $month; ?>" class="read-more">Buy it at a price of Rp. 15,000.00-,</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="intro-text-box text-box text-white">
						<div class="top-meta">Over A Month Package <a href="<?php echo $trii_month; ?>">(3 MONTHS)</a></div>
						<h3>Top 3 used by users</h3>
						<p>Buy this package! By purchasing this, your link will not pass through the ad page for 3 months</p>
						<a href="<?php echo $trii_month; ?>" class="read-more">Buy it at a price of Rp. 50,000.00-,</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->