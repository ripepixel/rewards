<div class="content">
			<div class="container box">
				<?php $this->load->view('dashboard/outlet_menu'); ?>
				
				<section id="dashboard" class="row">
					<div class="col-md-12 col-sm-12">
						<h3>Outlet Details</h3>
					</div>
					<div class="col-md-12 col-sm-12">
						<form action="<?php echo base_url(); ?>dashboard/update_outlet" method="post" class="form" enctype="multipart/form-data">
							<div class="col-md-12 col-sm-12">
								<input name="name" id="name" type="text" placeholder="Business Name" value="<?php echo $outlet->name; ?>" required>
								<?php echo form_error('name'); ?>
							</div>
							<div class="col-md-12 col-sm-12">
								<h4>Outlet Address</h4>
							</div>
							<div class="col-md-12 col-sm-12">
								<input name="street" id="street" type="text" placeholder="Street" value="<?php echo $outlet->street; ?>" required>
								<?php echo form_error('street'); ?>
							</div>
							<div class="col-md-4 col-sm-12">
								<input name="town" id="town" type="text" placeholder="Town" value="<?php echo $outlet->town; ?>" required>
								<?php echo form_error('town'); ?>
							</div>
							<div class="col-md-4 col-sm-12">
								<input name="county" id="county" type="text" placeholder="County" value="<?php echo $outlet->county; ?>" required>
								<?php echo form_error('county'); ?>
							</div>
							<div class="col-md-4 col-sm-12">
								<input name="postcode" id="postcode" type="text" placeholder="Postcode" value="<?php echo $outlet->postcode; ?>" required>
								<?php echo form_error('postcode'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="telephone" id="telephone" type="text" placeholder="Telephone" value="<?php echo $outlet->telephone; ?>">
								<?php echo form_error('telephone'); ?>
							</div>
							
							<div class="col-md-12 col-sm-12">
								<h4>Social</h4>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="website" id="website" type="text" placeholder="www.your-website.com" value="<?php echo $outlet->website; ?>">
								<?php echo form_error('website'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="email" id="email" type="email" placeholder="Public Email" value="<?php echo $outlet->email; ?>">
								<?php echo form_error('email'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="twitter" id="twitter" type="text" placeholder="Twitter Page" value="<?php echo $outlet->twitter; ?>">
								<?php echo form_error('twitter'); ?>
							</div>
							<div class="col-md-6 col-sm-12">
								<input name="facebook" id="facebook" type="text" placeholder="Facebook Page" value="<?php echo $outlet->facebook; ?>">
								<?php echo form_error('facebook'); ?>
							</div>
							<div class="col-md-12 col-sm-12">
								<h4>Logo</h4>
							</div>
							<div class="col-md-3 col-sm-4">
								<?php if($outlet->image != '') { ?>
									<img src="<?php echo base_url()."uploads/outlets/".$outlet->image; ?>" alt="<?php echo $outlet->name; ?>" height="70px" />
								<?php } else { ?>
								<label for="image">Add an image or logo</label>
								<?php } ?>
							</div>
							<div class="col-md-9 col-sm-8">
								<input name="photo" id="photo" type="file" placeholder="Add a logo" value="<?php echo set_value('photo'); ?>">
								<?php echo form_error('photo'); ?>
							</div>
							<input type="hidden" name="outlet_id" id="outlet_id" value="<?php echo $outlet->id; ?>" />
							
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Save" name="submit">
							</div>
						</form>
						
					</div>					
					
				</section>

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>