<div class="content">
			<div class="container box">
				<?php $this->load->view('dashboard/outlet_menu'); ?>
				
				<section id="dashboard" class="row">
					<div class="col-md-12 col-sm-12">
						<h3>Outlet Settings</h3>
					</div>
					<div class="col-md-8 col-sm-12">
						<form action="<?php echo base_url(); ?>dashboard/update_outlet_settings" method="post" class="form">
							<div class="col-md-12 col-sm-12">
								<label for="checkin_points">How many points does a customer get when they check in</label>
								<input name="checkin_points" id="checkin_points" type="text" placeholder="Check In Points" value="<?php echo $os->checkin_points; ?>" required />
								<?php echo form_error('checkin_points'); ?>
							</div>
							<div class="col-md-12 col-sm-12">
								<label for="min_checkin_period">How many hours in between checking in</label>
								<input name="min_checkin_period" id="min_checkin_period" type="text" placeholder="Minimum Check In Period" value="<?php echo $os->min_checkin_period; ?>" required />
								<?php echo form_error('min_checkin_period'); ?>
							</div>
							<div class="col-md-12 col-sm-12">
								<label for="new_customer_bonus">Number of bonus points for new customers</label>
								<input name="new_customer_bonus" id="new_customer_bonus" type="text" placeholder="New Customer Bonus Points" value="<?php echo $os->new_customer_bonus; ?>" required />
								<?php echo form_error('new_customer_bonus'); ?>
							</div>
							
							<input type="hidden" name="outlet_s_id" id="outlet_s_id" value="<?php echo $os->id; ?>" />
							
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Save" name="submit">
							</div>
						</form>
						
					</div>
					
					<div class="col-md-4 col-sm-12">
						<h4>Outlet Settings Help</h4>
						<hr />
						<p>Each time a customer uses their card (checks in) at your outlet, they receive points. Set how many points they will get, per check in.</p>
						<p>If you only want your customer to be able to collect points within a certain time period, enter the minimum number of hours between check ins. We would recommend entering a figure here, but the amount really depends on the type of business you have.</p>
						<p>If you would like to give your customers an extra bonus, when they first use their card at your outlet, enter a number in the bonus points box.</p>
					</div>				
					
				</section>

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>