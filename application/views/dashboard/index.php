<div class="content">
			<div class="container box">
				<?php
				$paid_plan = $this->business_model->hasActivePlan();
				$has_outlet = $this->business_model->hasCreatedOutlet();
				$has_rewards = $this->business_model->hasCreatedRewards();
				
				if($paid_plan == false || $has_outlet == false || $has_rewards == false) {
				?>
				<section id="features" class="row">
					<div class="col-md-12 col-sm-12">
						<h3>ToDo's</h3>
					</div>
					<?php if($paid_plan == false) {?>
					<div class="col-md-4 col-xs-6">
						<div class="event-info">
							<div class="icon fa fa-tasks"></div>
							<div class="info">
								<h3>Pay Your Plan</h3>
								<span>Please pay for your plan</span>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($has_outlet == false) {?>
					<div class="col-md-4 col-xs-6">
						<div class="event-info">
							<div class="icon fa fa-map-marker"></div>
							<div class="info">
								<h3>Create Your Outlet</h3>
								<span>Set up your outlet details</span>
							</div>
						</div>
					</div>
					<?php } ?>
					<?php if($has_rewards == false) {?>
					<div class="col-md-4 col-xs-6">
						<div class="event-info">
							<div class="icon fa fa-star-o"></div>
							<div class="info">
								<h3>Add Your Rewards</h3>
								<span>Setup your rewards</span>
							</div>
						</div>
					</div>
					<?php } ?>
				</section>
				<?php } ?>

				<section id="dashboard" class="row">
					<div class="col-md-8 col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Customers</h3>
						  </div>
						  <div class="panel-body">
						    <table class="table table-striped">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>	
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>name</td>
											<td>email</td>
										</tr>
									</tbody>
								</table>
						  </div>
						</div>
						
					</div>
					
					<div class="col-md-4 col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Analytics</h3>
						  </div>
						  <div class="panel-body">
						    Content
						  </div>
						</div>
					</div>
				</section>

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>