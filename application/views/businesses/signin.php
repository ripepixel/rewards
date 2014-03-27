<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-8 col-sm-12">
						<h3>Sign in</h3>
						<form method="post" class="form" action="<?php echo base_url(); ?>businesses/process_signin">
							<div class="col-md-12 col-sm-12">
								<input name="email" id="email" type="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
								<?php echo form_error('email'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="password" id="password" type="password" placeholder="Password" required>
								<?php echo form_error('password'); ?>
							</div>							
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Sign in" name="submit">
							</div>
						</form>
						
						<div class="col-md-6 col-sm-6">
							<p>Forgot your password?</p>
						</div>
						<div class="col-md-6 col-sm-6">
							<p><a href="<?php echo base_url(); ?>businesses/register">Not yet registered?</a></p>
						</div>
						
					</div>
					<div class="col-md-4 col-sm-12">
						<h3>Something Catchy</h3>
						
					</div>
				</section>

			</div>
		</div>