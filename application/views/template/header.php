<header id="header">
	<div id="menu" class="header-menu fixed">
		<div class="container box">
			<div class="row">
				<nav role="navigation" class="col-sm-12">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<!--== Logo ==-->
						<span class="navbar-brand logo">
							<span class="fa fa-map-marker"></span><?php echo $this->lang->line('site_name'); ?>
						</span>

					</div>
					<div class="navbar-collapse collapse">
						<!--== Navigation Menu ==-->
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_url(); ?>">Home</a></li>
							<li><a href="<?php echo base_url(); ?>#schedule">Schedule</a></li>
							<li><a href="<?php echo base_url(); ?>#faq">FAQ</a></li>
							<li><a href="<?php echo base_url(); ?>#prices">Pricing</a></li>
							<li><a href="<?php echo base_url(); ?>blog/">Blog</a></li>
							<li><a href="<?php echo base_url(); ?>pages/contact">Contact</a></li>
							<li class="current"><a href="<?php echo base_url(); ?>#register">Register</a></li>
							<li class="signin"><a href="<?php echo base_url(); ?>#register">Signin</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>

	<?php $this->load->view($slider); ?>

</header>