<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-8 col-sm-12">
						<h3>Contact Form</h3>
						<form id="contact-form" method="post" class="form">
							<div class="col-md-12 col-sm-6">
								<input name="name" id="name" type="text" placeholder="Name" required>
							</div>
							<div class="col-md-12 col-sm-6">
								<input name="email" id="email" type="email" placeholder="Email" required>
							</div>
							<div class="col-md-12 col-sm-6">
								<input name="telephone" id="telephone" type="tel" placeholder="Telephone">
							</div>
							<div class="col-md-12 col-sm-6">
								<textarea name="message" id="message" placeholder="Your message" rows="8" required></textarea>
							</div>
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Send" name="submit">
							</div>
							<p class="form-notification" style="display: none;">Thanks, your information has been sent.<br />We will get in touch shortly.</p>
						</form>
					</div>
					<div class="col-md-4 col-sm-12">
						<h3>Contact Details</h3>
						<address>
							<p><?php echo $this->lang->line('site_postal_address'); ?></p>
							<p><?php echo $this->lang->line('site_telephone_number'); ?></p>
							<p><?php echo $this->lang->line('site_contact_email'); ?></p>
						</address>
					</div>
					
				</section>
				<!--==========-->

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>