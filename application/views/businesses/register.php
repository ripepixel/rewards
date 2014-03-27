<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-8 col-sm-12">
						<h3>Register Form</h3>
						<form method="post" class="form" action="">
							<div class="col-md-6 col-sm-6">
								<input name="first_name" id="first_name" type="text" placeholder="First Name" required>
							</div>
							<div class="col-md-6 col-sm-6">
								<input name="last_name" id="last_name" type="text" placeholder="Last Name" required>
							</div>
							<div class="col-md-12 col-sm-6">
								<input name="email" id="email" type="email" placeholder="Email" required>
							</div>
							<div class="col-md-6 col-sm-6">
								<input name="password" id="password" type="password" placeholder="Password" required>
							</div>
							<div class="col-md-6 col-sm-6">
								<input name="conf_password" id="conf_password" type="password" placeholder="Confirm Password" required>
							</div>
							<div class="col-md-12 col-sm-6">
								<select name="plan" id="plan">
									<?php foreach($plans as $plan) { ?>
										<option value="<?php echo $plan['id']; ?>"><?php echo $plan['title']; ?> - &pound;<?php echo $plan['price']; ?> /month</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Register" name="submit">
							</div>
						</form>
					</div>
					<div class="col-md-4 col-sm-12">
						<h3>Registration Benefits</h3>
						
					</div>
				</section>
				<!--==========-->

				<?php $this->load->view('pages/pricing_tables'); ?>

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>