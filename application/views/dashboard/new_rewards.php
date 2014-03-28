<div class="content">
	<div class="container box">
		
		<section id="dashboard" class="row">
			<div class="col-md-12 col-sm-12">
				<form class="form" action="<?php echo base_url(); ?>dashboard/save_rewards" method="post">
					<div class="col-md-12">
						<h3>Add Your Rewards</h3>
						<p>Add the number of points and a description of the reward.</p>
						<p>&nbsp;</p>
					</div>
					
					<div id="rewardRows">
						<div class="col-md-12">
							<div class="col-md-3"><input type="text" name="points" placeholder="Points"></div>
							<div class="col-md-7"><input type="text" name="title" placeholder="Description"></div>
							<div class="col-md-2"><input onclick="addRow(this.form);" type="button" value="Add" /></div>
						</div>
					</div>

					<div class="col-md-6">
						<input type="submit" name="ok" value="Save Changes">
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
	var row = '<div class="col-md-12" id="rowNum'+rowNum+'"><div class="col-md-3"><input type="text" name="points[]" value="'+frm.points.value+'" placeholder="Points"><\/div><div class="col-md-7"><input type="text" name="title[]" value="'+frm.title.value+'" placeholder="Description"><\/div><div class="col-md-2"><input type="button" onclick="removeRow('+rowNum+');" value="Remove"><\/div><\/div>';

	//var row = '<p id="rowNum'+rowNum+'">Item quantity: <input type="text" name="qty[]" size="4" value="'+frm.points.value+'"> Item name: <input type="text" name="name[]" value="'+frm.title.value+'"> <input type="button" value="Remove" onclick="removeRow('+rowNum+');"></p>';
	jQuery('#rewardRows').append(row);
	frm.points.value = '';
	frm.title.value = '';
}

function removeRow(rnum) {
	jQuery('#rowNum'+rnum).remove();
}
</script>
