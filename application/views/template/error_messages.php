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
		<div class="alert alert-error">
			<button class="close" data-dismiss="alert">×</button>
			There have been errors editing your profile!
		</div>
	<?php } ?>