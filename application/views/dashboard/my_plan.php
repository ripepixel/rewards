<div class="content">
			<div class="container box">
				
				<section id="features" class="row">
					<div class="col-md-12 col-sm-12">
						<h3>Your Details</h3>
					</div>
					
					<div class="col-md-8 col-sm-12">
						<?php //print_r($subscription); ?>
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