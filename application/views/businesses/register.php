<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-8 col-sm-12">
						<h3>Register Form</h3>
						<form method="post" class="form" action="<?php echo base_url(); ?>businesses/process_registration">
							<div class="col-md-6 col-sm-12">
								<input name="first_name" id="first_name" type="text" placeholder="First Name" value="<?php echo set_value('first_name'); ?>" required>
								<?php echo form_error('first_name'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="last_name" id="last_name" type="text" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>" required>
								<?php echo form_error('last_name'); ?>
							</div>
							<div class="col-md-12 col-sm-12">
								<input name="email" id="email" type="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
								<?php echo form_error('email'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="password" id="password" type="password" placeholder="Password" required>
								<?php echo form_error('password'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="conf_password" id="conf_password" type="password" placeholder="Confirm Password" required>
								<?php echo form_error('conf_password'); ?>
							</div>
							<div class="col-md-12 col-sm-12">
								<select name="plan" id="plan">
									<?php foreach($plans as $plan) { ?>
										<option value="<?php echo $plan['id']; ?>"><?php echo $plan['title']; ?> Plan - <?php echo $set_up = $plan['setup_fee'] > 0 ? "&pound;".$plan['setup_fee']." + " : "" ?> &pound;<?php echo $plan['price']; ?> /month</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Register" name="submit">
							</div>
						</form>
						<div class="col-md-6 col-sm-6">
							<p><a href="<?php echo base_url(); ?>businesses/signin">Already registered? Sign in here.</a></p>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<h3>Registration Benefits</h3>
						<p>Register today - you do not need to enter your payment info straight away. <br />Have a look around and if you like what you see, pay for your plan.</p>
						
						
					</div>
				</section>
				<!--==========-->

				<?php $this->load->view('pages/pricing_tables'); ?>

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>