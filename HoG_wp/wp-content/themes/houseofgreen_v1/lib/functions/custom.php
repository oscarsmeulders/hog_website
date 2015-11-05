<?php


function get_responsive_title($title) {
	$length_S = 10;
	$length_M = 15;
	$length_L = 20;
	$length_XL = 25;
	$close = '&hellip;';

	$title_S =		substr( $title, 0, $length_S);
	$title_M =		substr( $title, 0, $length_M);
	$title_L =		substr( $title, 0, $length_L);
	$title_XL =		substr( $title, 0, $length_XL);

	$tmp = '
		<span class="hidden-xs hidden-sm hidden-md">'. $title_XL .'</span>
		<span class="hidden-xs hidden-sm hidden-lg">'. $title_L .'</span>
		<span class="hidden-xs hidden-md hidden-lg">'. $title_M .'</span>
		<span class="hidden-sm hidden-md hidden-lg">'. $title_S .'</span>
		';
	return $tmp;
}



// get taxonomies terms links
// https://codex.wordpress.org/Function_Reference/get_the_terms
// echo custom_taxonomies_detail_page();

function custom_taxonomies_detail_page(){

	$terms = get_the_terms( $post->ID, 'project_kind_category' );

	if ( $terms && ! is_wp_error( $terms ) ) :
		$kindsArray = array();

		foreach ( $terms as $term ) {
			$kindsArray[] = '<div class="meta">' . $term->name . '</div>';
		}

		$kinds = join( "", $kindsArray );
	endif;

	return $kinds;

}

function custom_taxonomies_overview_page(){

	$terms = get_the_terms( $post->ID, 'project_kind_category' );

	if ( $terms && ! is_wp_error( $terms ) ) :
		$kindsArray = array();

		foreach ( $terms as $term ) {
			$kindsArray[] = $term->slug . ' ';
		}

		$kinds = join( "", $kindsArray );
	endif;

	return $kinds;

}



?>