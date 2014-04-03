<?php
      if ($this->session->flashdata('success')) {
          echo "<div id='fadeout'>";
          echo "<section id='alerts'>";
          echo "<div class='container'>";
          echo "<div class='row'>";
          echo '<div class="col-md-12 col-sm-12">';
            echo "<div class='alert alert-success'>";
            //echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              echo $this->session->flashdata('success');
            echo "</div>";
          echo "</div>";
          echo "</div></div></section>";
          echo "</div>";
      }

      if ($this->session->flashdata('error')) {
        echo "<section id='alerts'>";
        echo "<div class='container'>";
        echo "<div class='row'>";
          echo '<div class="col-md-12 col-sm-12">';
            echo "<div class='alert alert-danger'>";
            //echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
              echo $this->session->flashdata('error');
            echo "</div>";
          echo "</div>";
          echo "</div></div></section>";
      }
    
	if(validation_errors()) { ?>
		<section id='alerts'>
			<div class='container'>
				<div class='row'>
					<div class="col-md-12 col-sm-12">
						<div class='alert alert-danger'>
							There were errors with the information. Please check all required fields are completed.
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>