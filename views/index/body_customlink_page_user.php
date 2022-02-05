	<!-- Newsletter section -->
	<section class="newsletter-section">
		<div class="container">
			<h2 style="margin-top: 30px;">Your List</h2>
			<form class="newsletter-form">
				<?php foreach ($data_user as $du) : ?>
					<input style="text-align: center;" autocomplete="off" disabled="" value="<?php echo $_SERVER['SERVER_NAME']."/short/a/z/".$du['short_link'] ?> => [ <?= $du['link']; ?> ]">
				<?php endforeach; ?>
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