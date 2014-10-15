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
	</div>
	<div class="row">
	
		<div class="col-sm-8 col-md-9">
			<div class="padding">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
				<?php endwhile; ?>
				<?php endif; ?>	
			</div>		
		</div>
		<div class="col-sm-4 col-md-3 hidden-xs">
			<?php get_sidebar(); ?>
		</div>		
		<div class="col-md-9">
			<div class="padding">
				<?php wp_pagenavi(); ?>
			</div>
		</div>
		<div class="col-md-3">
			
		</div>	
	</div>
	
<?php get_footer(); ?>	