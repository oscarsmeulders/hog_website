<?php // related projects ?>
<?php
//for use in the loop, list 4 post titles related to first tag on current post
$taxonomy = 	'project_kind_category';
$tax_args =		array('orderby' => 'date');
$tags =			wp_get_post_terms( $post->ID , $taxonomy, $tax_args);
$output = '';
if ($tags) :
	$first_tag = $tags[0]->term_id;
	$args=array(
		'taxonomy' => array($first_tag),
		'post_type' => 'project_item',
		'post__not_in' => array($post->ID),
		'posts_per_page'=>4,
		'caller_get_posts'=>1
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
		while ($my_query->have_posts()) : $my_query->the_post();
			$image = get_field('featured_image');
			$img_size = 'ratio4-3';
			$img_url = 	wp_get_attachment_image_src( $image, $img_size );
			$output .= '
				<div class="col-xs-12 col-sm-3">
					<a href="'. get_the_permalink() .'">
						<div class="item">
							<div class="proportions ratio4_3">
								<div class="content background-image" style="background-image: url('. $img_url[0] .')">
									<div class="title">
										'. get_responsive_title( get_the_title() ) .'
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>';
		endwhile;
	endif;
	wp_reset_query();
endif;
?>

<div class="container-fluid container-related">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<h4><?php _e( 'title_gerelateerd_projecten', 'hog_lang' ) ?></h4>
			<div class="row">
				<?php echo $output; ?>
			</div>
		</div>
	</div>
</div>
<?php // end related projects ?>