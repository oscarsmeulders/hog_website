<?php header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


	<script type="text/javascript">

		var menuBT_open = '<?php _e( 'menu_bt_header_open', 'hog_lang' ) ; ?>';
		var menuBT_closed = '<?php _e( 'menu_bt_header_closed', 'hog_lang' ) ; ?>';

		var siteUrl = '<?php echo get_site_url(); ?>';
		var siteUrl = '<?php echo get_site_url(); ?>';
		var templateUrl = '<?php echo get_template_directory_uri(); ?>';
		var ajaxUrl = '<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php';
	</script>
	<?php wp_head(); ?>
