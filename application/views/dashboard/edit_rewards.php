<div class="content">
	<div class="container box">
		
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
								<td><i class="fa fa-pencil"></i> <i class="fa fa-bar-chart-o"></i> <i class="fa fa-times"></i></td>
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
</script>
