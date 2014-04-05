<div class="row">
	
	<div class="col-md-5 col-sm-5">
		<div class="col-md-12 text-center">
			<img src="<?php echo base_url(); ?>uploads/outlets/<?php echo $outlet->image; ?>" alt="<?php echo $outlet->name; ?>" height="300px" />
		</div>
		<div class="col-md-12 text-center">
			<h2><?php echo $outlet->name; ?></h2>
		</div>
		<div class="col-md-12 text-center">
			<h3>Grab a card, they're FREE, hit the button and start collecting for great rewards.</h3>
		</div>
		<div class="col-md-12 text-center">
			<button class="btn btn-lg btn-lets-go">Git Sum!</button>
		</div>
		
	</div>

	<div class="col-md-7 col-sm-7">
		<?php if($rewards) { ?>
			
			<ul class="rewards">
				<h3 class="mbottom20">Some of the great rewards waiting for you inside</h3>
			<?php 
			foreach($rewards as $reward) { ?>
				<li><span class="points"><?php echo $reward['points']; ?> Points</span><span class="title"><?php echo $reward['title']; ?></span></li>
			<?php } ?>
			</ul>
		<?php } else { ?>
			<p>This outlet has not yet added any rewards :(</p>
		<?php } ?>
	</div>

</div>
