<!DOCTYPE html>
<html lang="en">
<head>
		<title><?php echo $this->lang->line('site_title'); ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>  
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link href="<?php echo base_url(); ?>css/app/main.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" media="screen">
		
		<script src="<?php echo base_url(); ?>js/jquery-2.1.0.min.js"></script>
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

		
		<div id="navigation" class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><licon class="li_data"></licon> <b><?php echo $this->lang->line('site_name'); ?></b></a>
				</div>

				<div class="navbar-collapse collapse">
					

					
					<ul class="nav navbar-nav navbar-right">
						
						<div class="navbar-form pull-left">
							<a href="#" type="button" class="btn btn-sm btn-theme">Forgot Card?</a>
						</div>
					</ul>
				</div>
			</div>
		</div>

		
				<section id="features" name="features"></section>
				<div id="featureswrap">
					<div class="container">
						<?php $this->load->view($main); ?>
					</div>
				</div>
				
				
						<!--<div id="copywrap">
							<div class="container">
								<div class="row">
									<div class="col-lg-10">
										<p><?php //echo $this->lang->line('site_copyright_footer'); ?></p>
									</div>
									<div class="col-lg-2">
										<p></p>
									</div>
								</div>
							</div>
						</div> -->
</body>				
		

</html>