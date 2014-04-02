<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-8 col-sm-12">
						<h3>Forgotten Your Password?</h3>
						<p>Please enter the email address you registered with and we will send you a new password.</p>
						<form method="post" class="form" action="<?php echo base_url(); ?>businesses/reset_password">
							<div class="col-md-12 col-sm-12">
								<input name="email" id="email" type="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
								<?php echo form_error('email'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Reset Password" name="submit">
							</div>
						</form>
						
						<div class="col-md-6 col-sm-6">
							<p><a href="<?php echo base_url(); ?>businesses/signin">Sign in</a></p>
						</div>
						<div class="col-md-6 col-sm-6">
							<p><a href="<?php echo base_url(); ?>businesses/register">Register</a></p>
						</div>
						
					</div>
					<div class="col-md-4 col-sm-12">
						<h3>Something Catchy</h3>
						
					</div>
				</section>

			</div>
		</div>