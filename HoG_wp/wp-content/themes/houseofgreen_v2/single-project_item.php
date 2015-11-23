<?php
/**
 * The template for displaying any single post-type: project_item
 *
 */

get_header(); ?>
<?php
	$output = '<h2>&nbsp;</h2>';
	$projectCookie = get_field('projects_overview', 'option');
	if( $projectCookie ) :
		$output = '<a href="'. $projectCookie .'"><h2>'. __( 'title_projecten', 'hog_lang' ) .'</h2></a>';
	endif;
	set_query_var( 'cookie', $output );
	wp_reset_postdata();
?>
<?php set_query_var( 'relations', 'projects' ); ?>
<?php get_template_part( '/lib/parts/detail-global', '' ); ?>

<?php get_footer(); ?>