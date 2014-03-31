<div class="content">
			<div class="container box">
				
				<section id="features" class="row">
					<div class="col-md-12 col-sm-12">
						
					</div>
					
					<div class="col-md-8 col-sm-12">
						<h3>Your Details</h3>
						<p>Your email address is currently set to <strong><?php echo $business->email; ?></strong>. If you need to change your email address, please contact support.</p>

						<hr />
						<h3>Change your password</h3>
						<form class="form" action="<?php echo base_url(); ?>dashboard/change_password" method="post">
							<div class="col-md-6 col-sm-12">
								<input type="password" name="password" placeholder="New Password" required >
								<?php echo form_error('password'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input type="password" name="conf_password" placeholder="Confirm Password" required >
								<?php echo form_error('conf_password'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Reset Password" name="submit">
							</div>
						</form>
					</div>
					
					<div class="col-md-4 col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Plan Details</h4>
							</div>
							<div class="panel-body">
								<p>You are currently subscribed to the <strong><?php echo $subscription->name; ?></strong>.</p>
								<p>Your next payment of <strong>&pound;<?php echo $subscription->amount; ?></strong> is due on the <strong><?php echo date('d/m/Y', strtotime($subscription->next_interval_start)); ?></strong>.</p>
								<hr />
								<?php $now = time();
									$start = strtotime($subscription->created_at);
									$cancel_after = $plan->cancel_after * 2628000;
								?>
								<?php if(($now - $start) > $cancel_after) {	?>
									<p>If you would like to cancel your account, please click the button below</p>
								<?php } else { ?>
									<p>Your plan started on <strong><?php echo date('d/m/Y', $start); ?></strong>.</p> 
									<p>Once your initial <?php echo $plan->cancel_after; ?> month period has ended (<?php echo date('d/m/Y', $start+$cancel_after); ?>), you can cancel your plan through your dashboard.</p>
								<?php } ?>
							</div>
						</div>
					</div>
					
				</section>

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>