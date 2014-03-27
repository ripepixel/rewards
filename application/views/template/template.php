<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('template/head'); ?>
	<body>
		<?php $this->load->view('template/header'); ?>
		<?php $this->load->view('template/error_messages'); ?>

		<?php $this->load->view($main); ?>
		
		<?php $this->load->view('template/footer'); ?>

	</body>
</html>