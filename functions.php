<?php
if ( ! isset( $content_width ) )
	$content_width = 1000;
function flamsteed()  {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );	
	set_post_thumbnail_size( 110, 110, true );
		add_image_size('fb-preview', 90, 90, true);
	$markup = array( 'search-form', 'comment-form', 'comment-list', );
	add_theme_support( 'html5', $markup );
	show_admin_bar(false);	
}
add_action( 'after_setup_theme', 'flamsteed' );

function fas_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '1.10.2', true );
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', false, '2.6.2', false );
	wp_register_script( 'cookie', get_template_directory_uri() . '/js/cookie.js', '1', true );
	wp_register_script( 'cookiecuttr', get_template_directory_uri() . '/js/cookiecuttr.js', '1', true );
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '3', true );
	wp_register_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'foundation' );
	wp_enqueue_script( 'cookie' );
	wp_enqueue_script( 'cookiecuttr' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'script' );
}
add_action( 'wp_enqueue_scripts', 'fas_scripts' );
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Search',
		'id'   => 'search',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Sidebar',
		'id'   => 'sidebar-menu',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Mobile Sidebar',
		'id'   => 'mobile-sidebar-menu',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Header menu',
		'id'   => 'header',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
}
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Meeting Reports';
    $submenu['edit.php'][5][0] = 'Meeting Reports';
    $submenu['edit.php'][10][0] = 'Add Meeting Report';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function remove_dashboard_widgets(){
	global$wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); 
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); 
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); 
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); 
	unset($wp_meta_boxes['dashboard']['normal']['core']['tribe_dashboard_widget']); 
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
add_filter( 'admin_footer_text', 'my_admin_footer_text' );
function my_admin_footer_text( $default_text ) {
     return '<span id="footer-thankyou">Website built by <a href="https://www.facebook.com/Marks.Portfolio">Mark Duwe</a><span>';
}
add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets() {
     global $wp_meta_boxes;
     unset(
          $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
          $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
     );
     wp_add_dashboard_widget( 'dashboard_meetings', 'Last 5 Meeting Reports', 'dashboard_meetings_output' );
}
function dashboard_meetings_output() {
     echo '<div class="rss-widget">';
     wp_widget_rss_output(array(
          'url' => 'http://flamsteed.info/feed/',
          'title' => 'Last Meeting Reports',
          'items' => 5,
          'show_summary' => 1,
          'show_author' => 0,
          'show_date' => 1 
     ));
     echo "</div>";
}
function news() {
	$labels = array(
		'name'               => __( 'News', 'post type general name' ),
		'singular_name'      => __( 'News', 'post type singular name' ),
		'add_new'            => __( 'Add New' ),
		'add_new_item'       => __( 'Add New News' ),
		'edit_item'          => __( 'Edit News' ),
		'new_item'           => __( 'New News' ),
		'all_items'          => __( 'All News' ),
		'view_item'          => __( 'View News' ),
		'search_items'       => __( 'Search News' ),
		'not_found'          => __( 'No News found' ),
		'not_found_in_trash' => __( 'No News found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'News'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Astronomy news',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'   => true,
	);
	register_post_type( 'news', $args );	
}
add_action( 'init', 'news' );
$prefix = '_cmb_'; 
add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );
function be_sample_metaboxes( $meta_boxes ) {
	global $prefix;
	$meta_boxes[] = array(
	    'id' => 'speaker',
	    'title' => 'Speaker',
	    'pages' => array('post'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	    'fields' => array(
			array(
	            'name' => 'Report By',
	            'desc' => '',
	            'id' => $prefix . 'author_text',
	            'type' => 'text'
		    ),
			array(
	            'name' => 'Speaker Name',
	            'desc' => '',
	            'id' => $prefix . 'speaker_text',
	            'type' => 'text'
		    ),
	    )
	);
	
	$meta_boxes[] = array(
	    'id' => 'about_page_metabox',
	    'title' => 'About Page Metabox',
	    'pages' => array('page'), // post type
	    'show_on' => array( 'key' => 'id', 'value' => array( 2 ) ), // specific post ids to display this metabox
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
	    'fields' => array(
	        array(
	            'name' => 'Test Text',
	            'desc' => 'field description (optional)',
	            'id' => $prefix . 'test_text',
	            'type' => 'text'
	        ),
		)
	);
	return $meta_boxes;
}


// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes' ,9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'lib/metabox/init.php' );
    }
}
function my_custom_login_logo() {
    echo '<style type="text/css">
    	body.login {
    		background: #000;
			background-position: center center;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			background-attachment: fixed;
    	}
    	.login form {
			background: #262a2d; /* Old browsers */
			background: -moz-linear-gradient(top,  #262a2d 0%, #000000 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#262a2d), color-stop(100%,#000000)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  #262a2d 0%,#000000 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  #262a2d 0%,#000000 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  #262a2d 0%,#000000 100%); /* IE10+ */
			background: linear-gradient(top,  #262a2d 0%,#000000 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#262a2d\', endColorstr=\'#000000\',GradientType=0 ); /* IE6-9 */  	
    	}
    	.login form {
    		border: 1px solid #434343;
    		box-shadow: none;
    	}	
    	.login label {
    		color: #fff;
    	}
    	.login .input{
			border: 1px solid #969696 !important;
			background: #fff !important;
			color: #000 !important;
			padding: 3px 5px !important;	
			text-shadow: none !important;
    	}
    	.login .button-primary {
			background: #5e5e5e; /* Old browsers */
			background: -moz-linear-gradient(top,  #5e5e5e 0%, #5e5e5e 49%, #191919 51%, #191919 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#5e5e5e), color-stop(49%,#5e5e5e), color-stop(51%,#191919), color-stop(100%,#191919)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top,  #5e5e5e 0%,#5e5e5e 49%,#191919 51%,#191919 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top,  #5e5e5e 0%,#5e5e5e 49%,#191919 51%,#191919 100%); /* Opera 11.10+ */
			background: -ms-linear-gradient(top,  #5e5e5e 0%,#5e5e5e 49%,#191919 51%,#191919 100%); /* IE10+ */
			background: linear-gradient(top,  #5e5e5e 0%,#5e5e5e 49%,#191919 51%,#191919 100%); /* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#5e5e5e\', endColorstr=\'#191919\',GradientType=0 ); /* IE6-9 */ 
			border: 0;
			border-radius: 0; 		
    	}
    	#login, .login h1 a {
    		width: 450px;
    	}
    	#login h1 {
    		margin: 0 0 16px 0;
    	}
    	.login #nav a, .login #backtoblog a {
			color: #fff !important;
			text-shadow: 1px 1px 1px #000;
		}
		#login_error, .message {
			background: url('.get_bloginfo('template_directory').'/css/ui-darkness/images/ui-bg_inset-soft_30_f58400_1x100.png) repeat-x scroll 50% 50% #F58400;
			border: 1px solid #f58400;
			color: #fff;
			text-shadow: 1px 1px 1px #000;
			font-weight: bold;	
		}
		#login_error a {
			color: #fff;	
		}
        h1 a { background: url('.get_bloginfo('template_directory').'/img/logo.png) no-repeat !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

add_theme_support('menus');
 
add_action( 'after_setup_theme', 'bootstrap_setup' );

if ( ! function_exists( 'bootstrap_setup' ) ):

	function bootstrap_setup(){

		add_action( 'init', 'register_menu' );

		function register_menu(){
			register_nav_menu( 'header', 'Bootstrap Top Menu' ); 
		}

		class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {


			function start_lvl( &$output, $depth ) {

				$indent = str_repeat( "\t", $depth );
				$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";

			}

			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$li_attributes = '';
				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = ($args->has_children) ? 'dropdown' : '';
				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
				$classes[] = 'menu-item-' . $item->ID;


				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
				$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

				if ( !$element )
					return;

				$id_field = $this->db_fields['id'];

				//display this element
				if ( is_array( $args[0] ) ) 
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
				else if ( is_object( $args[0] ) ) 
					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);

				$id = $element->$id_field;

				// descend only when the depth is right and there are childrens for this element
				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

					foreach( $children_elements[ $id ] as $child ){

						if ( !isset($newlevel) ) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
						unset( $children_elements[ $id ] );
				}

				if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}

				//end this element
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);

			}

		}

	}

endif;

function redirect_xmlrpc_to_custom_post_type ($data, $postarr) {
    $p2_custom_post_type = 'news';
    if (defined('XMLRPC_REQUEST') || defined('APP_REQUEST')) {
        $data['post_type'] = $p2_custom_post_type;
        return $data;
    }
    return $data;
}
add_filter('wp_insert_post_data', 'redirect_xmlrpc_to_custom_post_type', 99, 2);