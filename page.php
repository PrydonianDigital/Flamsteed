<?php get_header(); ?>

<?php 
	if (is_page( 'Home' )) {
?>
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
	</div>
	<div class="row">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="col-sm-8 col-md-9">
			<div class="padding">
				<?php the_content(); ?>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#meeting" data-toggle="tab">Meeting Reports</a></li>
					<li><a href="#events" data-toggle="tab">Events</a></li>
					<li><a href="#news" data-toggle="tab">News</a></li>
					<li><a href="#twitter" data-toggle="tab">Twitter</a></li>
					<li><a href="#facebook" data-toggle="tab">Facebook</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="meeting">
					<?php
						$args = array (
							'post_type' => 'post',
							'posts_per_page' => '5',
						);
						$home_posts = new WP_Query( $args );
						if ( $home_posts->have_posts() ) {
							while ( $home_posts->have_posts() ) {
								$home_posts->the_post();
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="padding less">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-2">
								<div class="padding less">
									<a href="<?php the_permalink(); ?>" class="th"><?php the_post_thumbnail('fb-preview'); ?></a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-10">
								<div class="padding less">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<?php
							}
						} else {
						
						}
						wp_reset_postdata();							
					?>
					</div>
					<div class="tab-pane fade" id="events">
					<?php
						$args = array (
							'post_type' => 'tribe_events',
							'posts_per_page' => '5',
						);
						$home_posts = new WP_Query( $args );
						if ( $home_posts->have_posts() ) {
							while ( $home_posts->have_posts() ) {
								$home_posts->the_post();
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="padding less">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-2">
								<div class="padding less">
									<a href="<?php the_permalink(); ?>" class="th"><?php the_post_thumbnail('fb-preview'); ?></a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-10">
								<div class="padding less">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<?php
							}
						} else {
						
						}
						wp_reset_postdata();							
					?>
					</div>
					<div class="tab-pane fade" id="news">
					<?php
						$args = array (
							'post_type' => 'news',
							'posts_per_page' => '5',
						);
						$home_posts = new WP_Query( $args );
						if ( $home_posts->have_posts() ) {
							while ( $home_posts->have_posts() ) {
								$home_posts->the_post();
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="padding less">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-2">
								<div class="padding less">
									<a href="<?php the_permalink(); ?>" class="th"><?php the_post_thumbnail('fb-preview'); ?></a>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-10">
								<div class="padding less">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<?php
							}
						} else {
						
						}
						wp_reset_postdata();							
					?>
					</div>
					<div class="tab-pane fade" id="twitter">
						<a class="twitter-timeline" data-dnt="true" width="520" height="600" href="https://twitter.com/Flamsteed" data-widget-id="516532501565542400" data-chrome="noheader noborders nofooter transparent">Tweets by @Flamsteed</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
					<div class="tab-pane fade" id="facebook">
						<?php echo do_shortcode('[jsl3_fwf]'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>			
		<div class="col-sm-4 col-md-3 hidden-xs">
			<?php get_sidebar(); ?>
		</div>
	</div>	
	
<?php } else if (is_page( 'Image Gallery on Flickr' )) {
?>
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
	</div>
	<div class="row">
		<div class="col-sm-8 col-md-9">
			<div class="padding" id="flickrGallery">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>				
			</div>
		</div>
		<div class="col-sm-4 col-md-3 hidden-xs">
			<?php get_sidebar(); ?>
		</div>
	</div>
	
<?php } else { ?>
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
	</div>
	<div class="row">
		<div class="col-sm-8 col-md-9">
			<div class="padding">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>				
			</div>
		</div>
		<div class="col-sm-4 col-md-3 hidden-xs">
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php } ?>
	
<?php get_footer(); ?>	