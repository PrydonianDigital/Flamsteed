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
			
			<div class="row">
				<div class="col-md-12">
					<div class="padding">
						<h5 class="date subheader"></h5>
						<h4 class="subheader">404 Not found</h4>
						<h5 class="subheader"></h5>									
						
						
						<p>It looks like this page either doesn't exist, has been moved or has been swallowed by a black hole.</p>
						
						<p>Try searching for something, or use the menu at the top of the page to find what you were looking for</p>
						
						<?php dynamic_sidebar('search'); ?>
						
						</div>
				</div>
			</div>
		
		</div>
		<div class="col-sm-4 col-md-3 hidden-xs">
			<?php get_sidebar(); ?>
		</div>
		
	</div>
	
<?php get_footer(); ?>	