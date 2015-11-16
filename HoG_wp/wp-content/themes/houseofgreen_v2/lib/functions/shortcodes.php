<?php

	///////////////////////////////////////////////////////////////
	function contact_func( $atts, $content = null ) {
		$contact_page = get_field( 'contact_page', 'option' );
		if ($contact_page) :
			$tmpVar = '';
			$tmpVar .= '<a href="'. $contact_page .'"><div class="col-sm-3 right contact-placeholder"><div><div class="dummy"></div><div class="contact"></div></div></div></a>';
			return $tmpVar;
		endif;
	}
	add_shortcode('contact_button', 'contact_func');

	///////////////////////////////////////////////////////////////
	function quote_func( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'name' => '',
			'content' => '',
			'align' => 'left'
		), $atts );

		$tmpVar = '';
		$tmpVar .= '<div class="col-xs-6 col-sm-3 quote '. $a['align'] .'">'. $a['content'] .'<div class="who">'. $a['name'] .'</div></div>';

		return $tmpVar;
	}
	add_shortcode('quote', 'quote_func');

	///////////////////////////////////////////////////////////////
	function image_func( $atts, $content = null ) {
		$a = shortcode_atts( array(
			'id' => '',
			'align' => 'left',
			'description' => '',
		), $atts );

		$image = wp_get_attachment_image( $a['id' ], 'ratio4-3-half' );
		$tmpVar = '';
		$tmpVar .= '<div class="col-sm-3 quote image '. $a['align'] .'">'. $image .'<div class="who">'. $a['description'] .'</div></div>';

		return $tmpVar;
	}
	add_shortcode('image', 'image_func');



	///////////////////////////////////////////////////////////////
	/////////////////////////////
	function br_func( $atts, $content = null ) {
		$tmpVar = '';
		$tmpVar .= '<br><br>';
		return $tmpVar;
	}
	add_shortcode('br', 'br_func');


?>