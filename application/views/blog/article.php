<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-12 col-sm-12">
						<?php
						if($article) { ?>
							<h2><?php echo $article->title; ?></h2>
							<p>Posted on <strong><?php echo date("d/m/Y", strtotime($article->date_posted)); ?></strong> by <strong><?php echo $article->author; ?></strong></p>
							<?php echo $article->content; ?> <p></p>


						<?php 
						} else { ?>
							<h4>Sorry, that blog post does not exist!</h4>
						<?php } ?>
					</div>
				</section>
				<!--==========-->

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>