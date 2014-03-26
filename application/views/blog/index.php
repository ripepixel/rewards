<div class="content">
			<div class="container box">

				<section id="blog" class="row">
					<div class="col-md-8 col-sm-12">
						<?php
						if($posts) {
							foreach($posts as $post) { ?>

							<h2><?php echo $post['title']; ?></h2>
							<p>Posted on <strong><?php echo date("d/m/Y", strtotime($post['date_posted'])); ?></strong> by <strong><?php echo $post['author']; ?></strong></p>
							<?php echo $post['summary']; ?> <p><a href="<?php echo base_url(); ?>blog/article/<?php echo $post['slug']; ?>">Read more</a>.</p>


						<?php 
							}
						} else { ?>
							<h4>Sorry, no blog posts yet!</h4>
						<?php } ?>
					</div>
					<div class="col-md-4 col-sm-12">
						<h4>Blog Categories</h4>
						<ul>
							<?php foreach($blog_categories as $bc) {
								echo "<li>".$bc['name']."</li>";
							} ?>
						</ul>
					</div>
				</section>
				<!--==========-->

				<div id="gotop" class="gotop fa fa-arrow-up"></div>
			</div>
		</div>