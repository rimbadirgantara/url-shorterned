

<style type="text/css">
	.link {
		font-size: 20px;
		text-align: center;
		font-weight: 700;
		font-style: italic;
		color: #fff;
		margin-left: 20px		
	}

	.link:hover {
		color: #EE82EE;
	}
</style>
	<!-- Hero section -->
	<section class="hero-section overflow-hidden">
		<div class="hero-slider owl-carousel">
			<div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="<?= base_url('assets/') ?>img/slider-bg-1.jpg">
				<div class="container">
					<h2>Your Link</h2>
					<br>
					<div class="newsletter-form">
						<input class="link" value="<?= $link; ?>" disabled></input>	
					</div>
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
