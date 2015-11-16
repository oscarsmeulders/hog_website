<?php // related custom posts ?>

<?php
if(get_field('related_pages')):

	$output = '';
	if(have_rows('related_pages')):
		while( have_rows('related_pages') ): the_row();
			$related = get_sub_field('related_page');
			setup_postdata( $related );

			$id =			$related->ID;
			$link =		 	get_permalink($id);
			$title =		$related->post_title;
			$image = 		get_field('featured_image', $id);
			$img_size = 	'ratio4-3';
			$img_url =		wp_get_attachment_image_src( $image, $img_size );
			$output .= '
				<div class="col-xs-6 col-sm-3">
					<a href="'. $link .'">
						<div class="item">
							<div class="proportions ratio4_3">
								<div class="content background-image" style="background-image: url('. $img_url[0] .')">
									<div class="title">
										'. get_responsive_title( $title ) .'
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>';
		endwhile;
	endif;
	wp_reset_postdata();
?>

	<div class="container-fluid container-related">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
				<h4><?php _e( 'title_gerelateerd_custom_error', 'hog_lang' ) ?></h4>
				<div class="row">
					<?php echo $output; ?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
<?php // end related projects ?>