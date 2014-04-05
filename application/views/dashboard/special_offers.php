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
              <th>Status</th>
							<th>Title</th>
              <th>Original Price</th>
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
                  $status = 'Active';
								} elseif(strtotime($offer['expiry_date']) < time()) {
									// Expired
									$class='danger';
                  $status = 'Expired';
								} else {
									$class = '';
                  $status = 'Waiting';
								}
						?>
							<tr class="<?php echo $class; ?>">
							<td><?php echo $status; ?></td>
              <td><?php echo $offer['title']; ?></td>
              <td><?php echo "&pound;".$offer['original_price']; ?></td>
							<td><?php echo "&pound;".$offer['offer_price']; ?></td>
							<td><?php echo date('d/m/Y', strtotime($offer['start_date'])); ?></td>
							<td><?php echo date('d/m/Y', strtotime($offer['expiry_date'])); ?></td>
							<td>
              <i class="offers stats fa fa-bar-chart-o" title="Statistics"></i> 
              <?php if($class =="success" || $class == '') { ?> <a class="edit-offer" data-toggle="modal" data-id="<?php echo $offer['id']; ?>" href="#editOfferModal"><i class="offers edit fa fa-pencil" title="Edit"></i></a> <?php } ?>
              <?php if($class =="success" || $class == '') { ?><a href="<?php echo base_url(); ?>dashboard/expire_offer/<?php echo $offer['id']; ?>" onclick="return doexpire();"><i class="offers expire fa fa-clock-o" title="Expire Offer Now"></i></a> <?php } ?>
              <a href="<?php echo base_url(); ?>dashboard/delete_offer/<?php echo $offer['id']; ?>" onclick="return doconfirm();"><i class="offers delete fa fa-times" title="Delete"></i></a></td>
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

function doexpire()
{
    msg=confirm("Are you sure you want to expire the offer?");
    if(msg!=true)
    {
        return false;
    }
}

$(document).on("click", ".edit-offer", function () {
     var offerId = $(this).data('id');
     $.ajax({
     	type: "POST",
     	url: "getOffer",
     	data: {id:offerId},
     	dataType: 'json',
     	success: function(data) {
     		$("#o_title").val( data.title );
				var sd = new Date(data.start_date);
				var sd_d = sd.getDate();
				var sd_m = sd.getMonth()+1;
				var sd_y = sd.getFullYear();
				
				var ed = new Date(data.expiry_date);
				var ed_d = ed.getDate();
				var ed_m = ed.getMonth()+1;
				var ed_y = ed.getFullYear();
				
				$("#o_start_date").val( sd_d+"/"+sd_m+"/"+sd_y );
				$("#o_expiry_date").val( ed_d+"/"+ed_m+"/"+ed_y );
				$("#o_original_price").val( data.original_price );
				$("#o_offer_price").val( data.offer_price );
     		$("#o_terms").val( data.terms );
				$('#offer_image img').remove();
				$("<img/>").prependTo("#offer_image").attr({
					src: "<?php echo base_url(); ?>uploads/offers/"+data.image,
					alt: '',
					width: '150'
				});
     		$("#oid").val( data.id );
     	}
     });
     
});

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
        	<input type="text" name="title" id="title" placeholder="Offer Title" value="" required>
        	<?php echo form_error('title'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="start_date" id="start_date" placeholder="Start Date (dd/mm/yyyy)" value="" required>
        	<?php echo form_error('start_date'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="expiry_date" id="expiry_date" placeholder="Expiry Date (dd/mm/yyyy)" value="" required>
        	<?php echo form_error('expiry_date'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="original_price" id="original_price" placeholder="Original Price" value="" required>
        	<?php echo form_error('original_price'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="offer_price" id="offer_price" placeholder="Offer Price" value="" required>
        	<?php echo form_error('offer_price'); ?>
        </div>
        <div class="col-md-12 col-sm-12">
        	<textarea name="terms" id="terms" placeholder="Terms and conditions" required></textarea>
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

<div class="modal fade" id="editOfferModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Special Offer</h4>
      </div>
      <div class="modal-body">
      <form class="form" action="<?php echo base_url(); ?>dashboard/update_offer" method="post" enctype="multipart/form-data">
        <div class="col-md-12 col-sm-12">
        	<input type="text" name="o_title" id="o_title" placeholder="Offer Title" required>
        	<?php echo form_error('o_title'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="o_start_date" id="o_start_date" placeholder="Start Date (dd/mm/yyyy)" required>
        	<?php echo form_error('o_start_date'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="o_expiry_date" id="o_expiry_date" placeholder="Expiry Date (dd/mm/yyyy)" required>
        	<?php echo form_error('o_expiry_date'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="o_original_price" id="o_original_price" placeholder="Original Price" required>
        	<?php echo form_error('o_original_price'); ?>
        </div>
        <div class="col-md-6 col-sm-12">
        	<input type="text" name="o_offer_price" id="o_offer_price" placeholder="Offer Price" required>
        	<?php echo form_error('o_offer_price'); ?>
        </div>
        <div class="col-md-12 col-sm-12">
        	<textarea name="o_terms" id="o_terms" placeholder="Terms and conditions" required></textarea>
        	<?php echo form_error('o_terms'); ?>
        </div>
				<div class="col-md-4 col-sm-6" id="offer_image">
					<label for="image">Current image</label>
				</div>
        <div class="col-md-8 col-sm-6">
        	<input name="photo" id="photo" type="file" placeholder="Add a logo">
        </div>
        <input type="hidden" name="oid" id="oid" value="">
        <div class="col-md-3 col-sm-12"><input type="submit" name="ok" value="Save"></div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>