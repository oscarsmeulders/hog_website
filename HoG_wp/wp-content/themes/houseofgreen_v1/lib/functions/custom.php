<?php


function get_responsive_title($title) {
	$length_S = 5;
	$length_M = 5;
	$length_L = 5;
	$length_XL = 5;
	$close = '&hellip;';

	$title_S =		substr( $title, 0, $length_S);
	$title_M =		substr( $title, 0, $length_M);
	$title_L =		substr( $title, 0, $length_L);
	$title_XL =		substr( $title, 0, $length_XL);

	$title_XL .= $close;
	$tmp = '<span class="hidden-xs">'. $title_XL .'</span>';
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