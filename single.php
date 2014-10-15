<?php get_header(); ?>
	<div class="row" id="mobilesidebar">
		<div class="col-sm-12 visible-xs">
			<div class="padding">
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Sidebar </a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<?php dynamic_sidebar('mobile-sidebar-menu'); ?>  
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	<div class="row">
	
		<div class="col-sm-8 col-md-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="row">
				<div class="col-md-12">
					<div class="padding">
						<h5 class="date subheader"><?php the_date(); ?></h5>
						<h4 class="subheader"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
						<h5 class="subheader"><?php
								global $post;
								$speaker_text = get_post_meta($post->ID, '_cmb_speaker_text', true);
								echo $speaker_text;
						?>
						</a></h5>									
						<?php if (in_category( 'Meeting Report' )) { ?>
							<h5 class="subheader">Report by: 
							<?php
								global $post;
								$author_text = get_post_meta($post->ID, '_cmb_author_text', true);
								echo $author_text;
						?></h5>
						<?php } ?>
						
						<?php the_content(); ?>
						
						<p><small>Posted under: <?php the_category(', '); ?></small></p>
						</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>			
		</div>
		<div class="col-sm-4 col-md-3 hidden-xs">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
	
<?php get_footer(); ?>	