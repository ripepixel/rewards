<div class="content">
	<div class="container box">
	<?php $this->load->view('dashboard/rewards_menu'); ?>
		
		<section id="dashboard" class="row">
			<div class="col-lg-7 col-sm-12">
				<h3>Your Rewards</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Points</th>
							<th>Details</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($rewards as $rew) { ?>
							<tr>
								<td><?php echo $rew['points']; ?></td>
								<td><?php echo $rew['title']; ?></td>
								<td><a class="edit-reward" data-toggle="modal" data-id="<?php echo $rew['id']; ?>" href="#rewardModal"><i class="rewards edit fa fa-pencil"></i></a> <!--<i class="rewards stats fa fa-bar-chart-o"></i>--> <a href="<?php echo base_url(); ?>dashboard/delete_reward/<?php echo $rew['id']; ?>" onClick="return doconfirm();"><i class="rewards delete fa fa-times"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				
			</div>

			<div class="col-lg-5 col-sm-12">
				<form class="form" action="<?php echo base_url(); ?>dashboard/save_rewards" method="post">
					<div class="col-md-12">
						<h3>Add More Rewards</h3>
						<p>&nbsp;</p>
					</div>
					
					<div id="rewardRows">
						<div class="col-md-12">
							<p>Enter the reward details and click the add button to add to the save list</p>
							<div class="col-md-3"><input type="text" name="points" placeholder="Points"></div>
							<div class="col-md-6"><input type="text" name="title" placeholder="Description"></div>
							<div class="col-md-3"><input onclick="addRow(this.form);" type="button" value="Add" /></div>
						</div>
					</div>

					<div class="col-md-6">
						<input type="submit" name="ok" value="Save">
					</div>
				</form>
			</div>

		</section>

	</div>
</div>


<script type="text/javascript">
var rowNum = 0;
function addRow(frm) {
	rowNum ++;
	var row = '<div class="col-md-12" id="rowNum'+rowNum+'"><div class="col-md-3"><input type="text" name="points[]" value="'+frm.points.value+'" placeholder="Points"><\/div><div class="col-md-6"><input type="text" name="title[]" value="'+frm.title.value+'" placeholder="Description"><\/div><div class="col-md-3"><input type="button" onclick="removeRow('+rowNum+');" value="Remove"><\/div><\/div>';

	jQuery('#rewardRows').append(row);
	frm.points.value = '';
	frm.title.value = '';
}

function removeRow(rnum) {
	jQuery('#rowNum'+rnum).remove();
}

function doconfirm()
{
    msg=confirm("Are you sure you want to delete?");
    if(msg!=true)
    {
        return false;
    }
}

$(document).on("click", ".edit-reward", function () {
     var rewardId = $(this).data('id');
     $.ajax({
     	type: "POST",
     	url: "getReward",
     	data: {id:rewardId},
     	dataType: 'json',
     	success: function(data) {
     		$("#modal_points").val( data.points );
     		$("#modal_name").val( data.title );
     		$("#rid").val( data.id );
     	}
     });
     
});
</script>


<div class="modal fade" id="rewardModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Reward</h4>
      </div>
      <div class="modal-body">
      <form class="form" action="<?php echo base_url(); ?>dashboard/update_reward" method="post">
        <div class="col-md-2 col-sm-12"><input type="text" name="modal_points" id="modal_points" value="" required></div>
        <div class="col-md-7 col-sm-12"><input type="text" name="modal_name" id="modal_name" value="" required></div>
        <input type="hidden" name="rid" id="rid" value="">
        <div class="col-md-3 col-sm-12"><input type="submit" name="ok" value="Save"></div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>