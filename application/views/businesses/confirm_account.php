<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-8 col-sm-12">
						<h3>Confirm Account</h3>
						<form method="post" class="form" action="<?php echo base_url(); ?>businesses/process_confirmation">
							<div class="col-md-12 col-sm-12">
								<input name="email" id="email" type="email" placeholder="Email" value="<?php echo set_value('email'); ?>" required>
								<?php echo form_error('email'); ?>
							</div>							
							<div class="col-md-6 col-sm-12">
								<input type="submit" value="Confirm" name="submit">
							</div>
							<input type="hidden" name="conf_code" value="<?php echo $conf_code; ?>">
						</form>
					</div>
					<div class="col-md-4 col-sm-12">
						<p>Please enter the email address that you registered with, to get started using <?php echo $this->lang->line('site_name'); ?></p>
						
					</div>
				</section>

			</div>
		</div>