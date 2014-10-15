<?php get_header(); ?>
	<div class="row" id="mobilesidebar">
		<div class="col-sm-12 visible-xs visible-sm">
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

						<?php
						
						if ( !defined('ABSPATH') ) { die('-1'); } ?>
						
						<div id="tribe-events-content" class="tribe-events-list">
						
							<!-- List Title -->
							<?php do_action( 'tribe_events_before_the_title' ); ?>
							<h2 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h2>
							<?php do_action( 'tribe_events_after_the_title' ); ?>
						
							<!-- Notices -->
							<?php tribe_events_the_notices() ?>
						
							<!-- List Header -->
						    <?php do_action( 'tribe_events_before_header' ); ?>
							<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
						
								<!-- Header Navigation -->
								<?php do_action( 'tribe_events_before_header_nav' ); ?>
								<?php tribe_get_template_part('list/nav', 'header'); ?>
								<?php do_action( 'tribe_events_after_header_nav' ); ?>
						
							</div><!-- #tribe-events-header -->
							<?php do_action( 'tribe_events_after_header' ); ?>
						
						
							<!-- Events Loop -->
							<?php if ( have_posts() ) : ?>
								<?php do_action( 'tribe_events_before_loop' ); ?>
								<?php tribe_get_template_part( 'list/loop' ) ?>
								<?php do_action( 'tribe_events_after_loop' ); ?>
							<?php endif; ?>
						
							<!-- List Footer -->
							<?php do_action( 'tribe_events_before_footer' ); ?>
							<div id="tribe-events-footer">
						
								<!-- Footer Navigation -->
								<?php do_action( 'tribe_events_before_footer_nav' ); ?>
								<?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
								<?php do_action( 'tribe_events_after_footer_nav' ); ?>
						
							</div><!-- #tribe-events-footer -->
							<?php do_action( 'tribe_events_after_footer' ) ?>
						
						</div><!-- #tribe-events-content -->


	
<?php get_footer(); ?>	