<?php get_header(); ?>

	<div class="row">
		<div class="col-sm-12 col-md-9">
			<div class="row">
				<div class="col-md-12 columns">
					<div class="padding">
					<?php	if ( !defined('ABSPATH') ) { die('-1'); } ?>
					
					<?php do_action( 'tribe_events_before_template' ) ?>
					
					<!-- Tribe Bar -->
					<?php tribe_get_template_part( 'modules/bar' ); ?>
					
					<!-- Main Events Content -->
					<?php tribe_get_template_part('month/content'); ?>
					
					<?php do_action( 'tribe_events_after_template' ) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-md-3 hidden-xs hidden-sm">
			<?php get_sidebar(); ?>
		</div>
	</div>
	
<?php get_footer(); ?>	