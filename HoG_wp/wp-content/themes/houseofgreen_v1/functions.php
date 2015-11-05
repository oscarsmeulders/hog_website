<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'hog_version', 1.0 );
define( 'TEMPLATEPATH', get_template_directory_uri(), true );
define( 'SITEPATH', site_url(), true );

include_once( 'lib/functions/custom.php');
include_once( 'lib/functions/shortcodes.php');


/*-----------------------------------------------------------------------------------*/
/* custom text dashboard
/*-----------------------------------------------------------------------------------*/
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('sos_global', 'Contact', 'custom_dashboard_sos');
	wp_add_dashboard_widget('sos_shortcodes_help_widget', 'Shortcodes', 'custom_dashboard_help_shortcodes');

}


function custom_dashboard_sos() {
	echo '<img src="'. get_template_directory_uri() .'/lib/sos/img/sos_logo.jpg">';
	echo '<h1>Oscar Smeulders</h1>
		<p>
			<span>Phone</span>&nbsp;&nbsp;<a href="tel:0621570942">06 215 70 942</a><br/>
			<span>Email</span>&nbsp;&nbsp;<a href="mailto:info@oscarsmeulders.com">info@oscarsmeulders.com</a><br/>
			<span>Www</span>&nbsp;&nbsp;<a href="http://www.oscarsmeulders.com">oscarsmeulders.com</a>
		</p>';
}


function custom_dashboard_help_shortcodes() {
	echo '<p>
		Shortcodes used in the theme, these are only usable in the content fields.

		<table style="width:100%">
		<thead>
			<tr>
				<td style="font-weight:600">SHORTCODES&nbsp;</td>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td valign="top">
					<strong>[quote content="<em>content</em>" name="<em>optional</em>" align="<em>left or right</em>"]</strong><br/>
					Add a quote in the content. More quotes are possible.
					<br/><br/>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<strong>[image id="<em>ID</em>" description="<em>optional</em>" align="<em>left or right</em>"]</strong><br/>
					The ID can be found in the media Libary, look at the url of the selected image.<br/>
					Best practice is to make the url relative.<br/>
					Example: "/wp-content/uploads/image.jpg"
					<br/><br/>
				</td>
			</tr>

			<tr>
				<td valign="top">
					<strong>[contact]</strong><br/>
					Place a contact button right below the content. The position of the short-code in the content is important
					<br/><br/>
				</td>
			</tr>

		</tbody>
		</table>';
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');



/*-----------------------------------------------------------------------------------*/
/*	Changing the Logo Above the Login Form
// Example Source: http://wpsnippy.com/add-custom-login-logo-in-your-wordpress-blog/
/*-----------------------------------------------------------------------------------*/
function login_enqueue_scripts_example() {

    echo '<style type="text/css">'
            . '#login h1 a {'
                . 'background-image: url(' . get_bloginfo( 'template_directory' ) . '/lib/sos/img/hog_logo.png);'
                . 'background-size: 100% !important;'
                . 'padding-bottom: 10px;'
                . 'width: 150px;'
                . 'height: 150px;'
            . '}'
        . '</style>';

}
add_action( 'login_enqueue_scripts', 'login_enqueue_scripts_example' );


function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

function remove_menus(){

	//remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'edit.php' );                   //Posts
	//remove_menu_page( 'upload.php' );                 //Media
	//remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
	//remove_menu_page( 'themes.php' );                 //Appearance
	//remove_menu_page( 'plugins.php' );                //Plugins
	//remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
	//remove_menu_page( 'options-general.php' );        //Settings

}
add_action( 'admin_menu', 'remove_menus' );


/*-----------------------------------------------------------------------------------*/
/* set language PO & MO files
/*-----------------------------------------------------------------------------------*/
add_action('after_setup_theme', 'language_theme_setup');
function language_theme_setup(){
    load_theme_textdomain('hog_lang', TEMPLATEPATH . '/lib/languages');
}


/*-----------------------------------------------------------------------------------*/
/* disable the emoji stuff from the head, WP 4.2
/*-----------------------------------------------------------------------------------*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/*-----------------------------------------------------------------------------------*/
/* add sizes for media
/*-----------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'image_sizes_theme_setup' );
function image_sizes_theme_setup() {
	add_image_size( 'ratio4-3', 1200, 800, true );
	add_image_size( 'ratio1-1', 1000, 1000, true );
	add_image_size( 'ratio1-2', 1000, 2000, true );
	add_image_size( 'ratio2-1', 2000, 1000, true );
	add_image_size( 'facebook', 1200, 630, true );
}


/*-----------------------------------------------------------------------------------*/
/* Custom post types + taxonomies for House of Green
	for the icons:
	https://developer.wordpress.org/resource/dashicons/#format-video
*/
/*-----------------------------------------------------------------------------------*/
function create_project_kind() {
	register_taxonomy(
		'project_kind_category',
		'project_kind_category',
		array(
			'label' => __( 'wp_menu_label_project_kind_category', 'hog_lang' ),
			'rewrite' => array( 'slug' => 'project-kind-category' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'create_project_kind' );

function create_post_type_project() {
	register_post_type( 'project_item',
		array(
			'labels' => array(
				'name' => __( 'wp_menu_project','hog_lang' ),
				'singular_name' => __( 'wp_menu_project','hog_lang' ),
				'add_new' => __( 'wp_menu_project_new','hog_lang' ),
			),
			'public' => true,
			'has_archive' => false,
			'taxonomies' => array('project_kind_category'),
			'rewrite' => array('slug'=> __( 'wp_menu_project_slug','hog_lang' ), 'with_front'=>false),
			'menu_icon' => 'dashicons-format-aside'
		)
	);
}
add_action( 'init', 'create_post_type_project' );

function create_post_type_gallery() {
	register_post_type( 'gallery_item',
		array(
			'labels' => array(
				'name' => __( 'wp_menu_gallery','hog_lang' ),
				'singular_name' => __( 'wp_menu_gallery','hog_lang' ),
				'add_new' => __( 'wp_menu_gallery_new','hog_lang' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug'=> __( 'wp_menu_gallery_slug','hog_lang' ), 'with_front'=>false),
			'menu_icon' => 'dashicons-images-alt2'
		)
	);
}
add_action( 'init', 'create_post_type_gallery' );

/*-----------------------------------------------------------------------------------*/
/*	add custom poststypes to search
/*-----------------------------------------------------------------------------------*/
function custom_posts_to_search($query) {

	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'page', 'project_item' ) );
    }

    return $query;
}
add_action( 'pre_get_posts', 'custom_posts_to_search' );


/*-----------------------------------------------------------------------------------*/
/*	Redirecting User to the Homepage After Logout
/*-----------------------------------------------------------------------------------*/
add_action( 'wp_logout', 'wp_logout_example' );

function wp_logout_example() {
    wp_redirect( home_url() );
    exit();
}


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
	array(
		'primary'	=>	__( 'Primary Menu', 'main' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu,
		// just change the 'primary' to another name
	)
);


/*-----------------------------------------------------------------------------------*/
/* Set ACF to custom folder
/*-----------------------------------------------------------------------------------*/
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/lib/acf/';
    return $path;
}


add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/lib/acf/';
    return $dir;
}

// add_filter('acf/settings/show_admin', '__return_false'); // hide menu

include_once( get_stylesheet_directory() . '/lib/acf/acf.php' );


/*-----------------------------------------------------------------------------------*/
/* Options pages if ACF is loaded
/*-----------------------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Global links',
		'menu_title'	=> 'Global links',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Navigation Settings',
		'menu_title'	=> 'Navigation',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));



}




/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function gs_scripts()  {
	// get the theme directory styles and link to it in the header
	wp_enqueue_style( 'gs_style', get_template_directory_uri() . '/assets/css/style.css', array(), '10000', 'all' );

	// jquery
	if( !is_admin()){
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery',	get_template_directory_uri() . '/assets/js/plugins/jquery-1.11.1.js', array(), hog_version, false);
	}

	wp_enqueue_script( 'hog_modernizr', get_template_directory_uri() . '/assets/js/plugins/modernizr.js', array(), hog_version, false );
	wp_enqueue_script( 'hog_ie10', get_template_directory_uri() . '/assets/js/min/ie10-viewport-bug-workaround-min.js', array(), hog_version, false );
	wp_enqueue_script( 'hog_nav', get_template_directory_uri() . '/assets/js/min/navigation-min.js', array(), array(), hog_version, true );
	wp_enqueue_script( 'hog_foot', get_template_directory_uri() . '/assets/js/min/footer-min.js', array(), array(), hog_version, true );

}
add_action( 'wp_enqueue_scripts', 'gs_scripts' );
?>