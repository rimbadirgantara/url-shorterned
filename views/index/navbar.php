	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="home.html" class="site-logo">
					<img src="<?= base_url('assets/') ?>/img/l0go.png" alt="" style="width: 130px; height: 50px; margin-top: -20px">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<?php if ($this->session->userdata('email')) { ?>
							<a href=""><?= $this->session->userdata('email') ?></a> / <a href="<?php echo site_url('a/out') ?>">Log out</a>
						<?php } else { ?>
							<a href="<?php echo site_url('log_in') ?>">Login</a> / <a href="<?php echo site_url('log_in/register') ?>">Register</a>
						<?php } ?>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="<?= base_url('a'); ?>">Home</a></li>
						<li><a href="<?= base_url('a/about'); ?>">About</a></li>
						<li><a href="<?= base_url('a/contact'); ?>">Contact</a></li>
						<?php if ($this->session->userdata('email')) { ?>
							<li><a href="<?= base_url('a/customlink_page_user'); ?>">List Custom Link</a></li>
						<?php } else {} ?>					
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header section end -->