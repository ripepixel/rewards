<div class="content">
	<div class="container box">
	<?php $this->load->view('dashboard/rewards_menu'); ?>
		
		<section id="dashboard" class="row">
			<div class="col-lg-12 col-sm-12 mbottom30">
				<a data-toggle="modal" href="#offerModal" class="btn btn-primary btn-lg">New Special Offer</a>
			</div>
			<div class="col-lg-12 col-sm-12">
				<h3>Your Special Offers</h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Title</th>
							<th>Offer Price</th>
							<th>Starts</th>
							<th>Expires</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php if($offers) {
							
							foreach($offers as $offer) {
								if(strtotime($offer['start_date']) < time() && strtotime($offer['expiry_date']) > time()) {
									// Active
									$class = 'success';
								} elseif(strtotime($offer['expiry_date']) < time()) {
									// Expired
									$class='warning';
								} else {
									$class = '';
								}
						?>
							<tr class="<?php echo $class; ?>">
							<td><?php echo $offer['title']; ?></td>
							<td><?php echo "&pound;".$offer['offer_price']; ?></td>
							<td><?php echo date('d/m/Y', strtotime($offer['start_date'])); ?></td>
							<td><?php echo date('d/m/Y', strtotime($offer['expiry_date'])); ?></td>
							<td>Stats| Edit | Expire | Delete</td>
							</tr>
						<?php 
							}
						} else { echo "<p>You have not added any special offers yet.</p>"; } ?>
					</tbody>
				</table>
				
			</div>

		</section>

	</div>
</div>


<script type="text/javascript">
function doconfirm()
{
    msg=confirm("Are you sure you want to delete?");
    if(msg!=true)
    {
        return false;
    }
}

</script>

<div class="modal fade" id="offerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">New Special Offer</h4>
      </div>
      <div class="modal-body">
      <form class="form" action="<?php echo base_url(); ?>dashboard/save_offer" method="post" enctype="multipart/form-data">
        <div class="col-md-12 col-sm-12">
        	<input type="text" name="title" id="title" placeholder="Offer Title" required>
        	<?php echo form_error('title'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="start_date" id="start_date" placeholder="Start Date (dd/mm/yyyy)" required>
        	<?php echo form_error('start_date'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="expiry_date" id="expiry_date" placeholder="Expiry Date (dd/mm/yyyy)" required>
        	<?php echo form_error('expiry_date'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="original_price" id="original_price" placeholder="Original Price" required>
        	<?php echo form_error('original_price'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="offer_price" id="offer_price" placeholder="Offer Price" required>
        	<?php echo form_error('offer_price'); ?>
        </div>
        <div class="col-md-12 col-sm-12">
        	<textarea name="terms" id="terms" placeholder="Terms and conditions"></textarea>
        	<?php echo form_error('terms'); ?>
        </div>
        <div class="col-md-12 col-sm-12">
        	<label for="image">Add an image</label>
        	<input name="photo" id="photo" type="file" placeholder="Add a logo">
        </div>
        <div class="col-md-3 col-sm-12">
        	<input type="submit" name="ok" value="Save">
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>