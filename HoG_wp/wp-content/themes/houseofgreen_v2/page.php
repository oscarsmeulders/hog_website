<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); ?>
<?php
	$output = '<h2>&nbsp;</h2>';
	if ( $post->post_parent ):
		$parent_url = get_permalink( $post->post_parent );
		$parent_title = get_the_title( $post->post_parent );
		$output = '<a href="'. $parent_url .'"><h2>'. $parent_title .'</h2></a>';
	endif;
	set_query_var( 'cookie', $output );
	wp_reset_postdata();
?>
<?php set_query_var( 'relations', 'custom' ); ?>
<?php get_template_part( '/lib/parts/detail-global', '' ); ?>

<?php get_footer(); ?>