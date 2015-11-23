<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function add_contact_to_output_projects () {
	$contact_page = get_field( 'contact_page', 'option' );
	$tmpClasses = '';
	if( get_field('show_filtering', 'option') ) {
		$tmpClasses = all_taxonomies_project();
	}
	$tmp = '
		<div class="item ratio4-3 isotope-item contact vcenter '. $tmpClasses .'">
				<div>
					<img src="'. get_stylesheet_directory_uri() .'/assets/img/trans.png">
					<div>
						<div class="contact-overview">
							<a href="'. $contact_page .'" target="_self"><div class="button-contact"></div></a>
						</div>
					</div>
				</div>
		</div>';
	return $tmp;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function add_contact_to_output_branches () {
	$contact_page = get_field( 'contact_page', 'option' );
	$tmpClasses = '';
	if( get_field('show_filtering', 'option') ) {
		$tmpClasses = all_taxonomies_branch();
	}
	$tmp = '
		<div class="item ratio4-3 isotope-item contact vcenter '. $tmpClasses .'">
				<div>
					<img src="'. get_stylesheet_directory_uri() .'/assets/img/trans.png">
					<div>
						<div class="contact-item">
							<a href="'. $contact_page .'" target="_self"><div class="button-contact"></div></a>
						</div>
					</div>
				</div>
		</div>';
	return $tmp;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function all_taxonomies_branch() {
	$kindsArray = array();

	$terms = get_terms( 'branch_kind_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = $term->slug . ' ';
		}
	endif;
	//wp_reset_query();

	$kinds = join( "", $kindsArray );
	return $kinds;

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function all_taxonomies_project() {
	$kindsArray = array();

	$terms = get_terms( 'project_kind_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = $term->slug . ' ';
		}
	endif;
	wp_reset_query();

	$terms = get_terms( 'project_size_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = $term->slug . ' ';
		}
	endif;
	//wp_reset_query();

	$kinds = join( "", $kindsArray );
	return $kinds;

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// get taxonomies terms links
// https://codex.wordpress.org/Function_Reference/get_the_terms
// echo custom_taxonomies_detail_page();

function custom_taxonomies_detail_page() {
	$kindsArray = array();
	$projectCookie = get_field('projects_overview', 'option');

	if(get_field('branches_pages')):
		if(have_rows('branches_pages')):
			while( have_rows('branches_pages') ): the_row();
				$related = get_sub_field('branch_page');
				setup_postdata( $related );
				$kindsArray[] = '<a href="'. get_the_permalink($related) .'"><div class="meta">' . get_the_title($related) . '</div></a>';
			endwhile;
		endif;
	endif;
	wp_reset_query();

	$terms = get_the_terms( $post->ID, 'project_kind_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = '<a href="'. $projectCookie. '/?filter=' .$term->slug .'"><div class="meta">' . $term->name . '</div></a>';
		}
	endif;
	wp_reset_query();

	$terms = get_the_terms( $post->ID, 'project_size_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = '<a href="'. $projectCookie. '/?filter=' .$term->slug .'"><div class="meta">' . $term->name . '</div></a>';
		}
	endif;
	wp_reset_query();

	$kinds = join( "", $kindsArray );
	return $kinds;

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function custom_taxonomies_project_page(){
	$kindsArray = array();

	$terms = get_the_terms( $post->ID, 'project_kind_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = $term->slug . ' ';
		}
	endif;
	//wp_reset_query();

	$terms = get_the_terms( $post->ID, 'project_size_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = $term->slug . ' ';
		}
	endif;
	//wp_reset_query();

	$kinds = join( "", $kindsArray );
	return $kinds;

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function custom_taxonomies_merken_page(){
	$kindsArray = array();

	$terms = get_the_terms( $post->ID, 'branch_kind_category' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		foreach ( $terms as $term ) {
			$kindsArray[] = $term->slug . ' ';
		}
	endif;
	//wp_reset_query();

	$kinds = join( "", $kindsArray );
	return $kinds;

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function check_filterVar_with_filter_slug($tmp, $slug) {
	if ($tmp == $slug) {
		return 'checked';
	}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>