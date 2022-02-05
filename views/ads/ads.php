<!-- Review section -->
<style type="text/css">
	.link_mail {
		font-size: 12px;
		text-transform: uppercase;
		font-weight: 700;
		font-style: italic;
		color: #fff;
		margin-left: 500px		
	}

	.link_mail:hover {
		color: #EE82EE;
	}
</style>	
	<section class="review-section">
		<div class="container">

			<?php foreach($ads as $a): ?>
			<div class="review-item">
				<div class="row">
					<div class="col-lg-4">
						<div class="review-pic">
							<img src="<?php echo base_url('assets/') ?>ads/<?= $a['pict']; ?>" alt="">
						</div>
					</div>
					<div class="col-lg-8">
						<div class="review-content text-box text-white">
							<h3><?= $a['title_ad']; ?></h3>
							<p><?= $a['decsription']; ?></p>
							<a href="<?= $order_ad; ?>" class="read-more">Display your ad?  <img src="<?php echo base_url('assets/'); ?>img/icons/double-arrow.png" alt="#"/></a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

			<a href="http://<?= $link; ?>" class="link_mail">your link click here</a>
		</div>
	</section>
	<!-- Review section end-->