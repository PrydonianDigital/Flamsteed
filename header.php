<!DOCTYPE html>
<html lang="en">
<head <?php language_attributes(); ?>>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="author" content="">

<title><?php bloginfo('name'); ?> <?php wp_title('&laquo;', true, 'left'); ?></title>
<?php wp_head(); ?>
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/icons.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/cookiecuttr.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
	if(is_single()) {
		$twitter_url = get_permalink();
		$twitter_title = get_the_title();
		$twitter_desc = get_the_excerpt();
		$twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), slider );
		$twitter_thumb  = $twitter_thumbs[0];
?>
<?php if(is_single()) { ?>
<meta name="twitter:card" content="summary_large_image">
<?php } ?>
<meta name="twitter:site" content="@Flamsteed">
<meta name="og:title" content="<?php echo $twitter_title; ?>">
<meta name="twitter:url" content="<?php echo $twitter_url; ?>">
<meta name="twitter:domain" content="<?php bloginfo('url'); ?>">
<meta name="twitter:description" content="<?php echo $twitter_desc; ?>">
<meta name="twitter:creator" content="@Flamsteed">
<meta name="twitter:app:id:iphone" content="">
<meta name="twitter:app:id:ipad" content="">
<meta name="twitter:app:id:googleplay" content="">
<meta name="twitter:app:url:iphone" content="">
<meta name="twitter:app:url:ipad" content="">
<meta name="twitter:app:url:googleplay" content="">
<meta name="twitter:image" content="<?php echo $twitter_thumb; ?>">
<meta property="og:title" content="<?php echo $twitter_title; ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $twitter_thumb; ?>" />
<meta property="og:url" content="<?php echo $twitter_url; ?>" />
<meta property="og:description" content="<?php echo $twitter_desc; ?>" />
<meta property="title" content="<?php echo $twitter_title; ?>" />
<meta property="type" content="article" />
<meta property="image" content="<?php echo $twitter_thumb; ?>" />
<meta property="url" content="<?php echo $twitter_url; ?>" />
<meta property="description" content="<?php echo $twitter_desc; ?>" />
<?php		
	}
?>
<?php endwhile; else :  endif; ?>
</head>
<body <?php body_class(); ?>>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<?php
    			$args = array(
    				'theme_location' => 'header',
    				'depth'		 => 2,
    				'container'	 => false,
    				'menu_class'	 => 'nav navbar-nav',
    				'walker'	 => new Bootstrap_Walker_Nav_Menu()
    			);
    			wp_nav_menu($args);
    		?>			
		</div>
	</div>
</div>

<!--[if lte IE 8]>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success fade in">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				<p><strong>Out of date browser</strong></p>
				<p>The browser you're using is not *quite* good enough to handle the latest technologies that this site uses.</p>
				<p><a class="btn btn-info" href="http://getfirefox.com">Download Firefox</a> <a class="btn btn-info" href="https://www.google.com/chrome">Download Chrome</a></p>
			</div>
		</div>
	</div>
</div>
<![endif]-->

<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
			</div>
			<div class="col-md-6 hidden-xs hidden-sm">
				<?php dynamic_sidebar('search'); ?>
			</div>
		</div>
	</div>
</div>

<div class="container">