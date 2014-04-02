<footer id="footer">
			<?php
			if($this->router->fetch_class() === $this->router->default_controller) { // only show map on main pages ?>
			<div id="map_canvas"></div>
			<?php } ?>
			
			<div class="footer">
				<div class="container box">

					<section id="info" class="row">
						<div class="col-sm-8">
						<?php if($this->session->userdata('is_logged')){ ?>
								<ul class="footer-icons">
									<li class="btn btn-info"><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
									<li class="btn btn-warning"><a href="<?php echo base_url(); ?>dashboard">Support</a></li>
								</ul>
								
						<?php } else { ?>
							<!--== Social Icons ==-->
							<ul class="social-icons">
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-google-plus"></a></li>
								<li><a href="#" class="fa fa-youtube"></a></li>
							</ul>
						<?php } ?>
												</div>
						<div class="col-sm-4 text-right">
							<div class="copyrights">
								Merchant Terms | Privacy Policy<br />
								<?php echo $this->lang->line('site_copyright_footer'); ?>
							</div>
						</div>
					</section>

				</div>
			</div>
		</footer>

		<!--== Javascript Files ==-->
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>		
		<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.scrollTo.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.nav.js"></script>
		<script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.flexslider.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.accordion.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.placeholder.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.fitvids.js"></script>
		<script src="<?php echo base_url(); ?>js/gmap3.js"></script>
		<script src="<?php echo base_url(); ?>js/fancySelect.js"></script>
		<script src="<?php echo base_url(); ?>js/main.js"></script>