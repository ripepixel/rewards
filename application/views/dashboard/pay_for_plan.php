<div class="content">
			<div class="container box">
				
				<section id="features" class="row">
					<div class="col-md-12 col-sm-12">
						<h3>Plan Payment</h3>
					</div>
					
					<div class="col-md-8 col-sm-6">
						<p>When you registered, you chose the <strong><?php echo $plan->title; ?> plan</strong> at <strong>&pound;<?php echo $plan->price; ?></strong> per month. <br />If you are happy with this choice, you can pay now, otherwise, please view the pricing plans below to see if you would like to choose a different plan.</p>
						<h4>What Happens Next</h4>
						<p>Once payment has been received, we will deliver your tablet, stand, lock, cards and a load of other goodies. <br />We have included simple instructions on how to setup and use the system, however, if you do have any trouble, you can contact us for help.</p>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="panel panel-default">
							<div class="panel-body">								
							
							<form class="form" action="<?php echo base_url(); ?>dashboard/send_for_payment" method="post">
								<div class="col-md-12">
									<h3>Plan Details</h3>
								</div>
								<div class="col-md-12">
									<select name="plan" id="plan">
										<?php 
										foreach($plans as $pln) {
										$sel = ($pln['id'] == $plan->id) ? "selected='selected'" : '';
										?>
											<option value="<?php echo $pln['id']; ?>" <?php echo $sel; ?>><?php echo $pln['title']; ?> - &pound;<?php echo $pln['price']; ?> /month</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-12">
									<input type="submit" name="submit" value="Pay Now">
								</div>
								
							</form>								
							</div>
						</div>
					</div>
					
				</section>
				
				<?php $this->load->view('pages/pricing_tables'); ?>

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>