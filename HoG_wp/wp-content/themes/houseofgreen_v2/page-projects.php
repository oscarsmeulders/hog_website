<?php
/**
 * 	Template Name: Overview - projecten
 *
 *	This page is the template for a overview - projecten.
 *
*/
get_header(); ?>
</head>
<body <?php body_class('overview'); ?> >
<?php get_template_part( '/lib/parts/header', '' ); ?>

<?php //main ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="main">
	<div class="container-fluid container-filters">
		<div class="row">
			<?php get_template_part( '/lib/parts/filters_projects', '' ); ?>
		</div>
	</div>
	<div class="container-fluid container-title">
		<div class="row">
			<div class="col-xs-6 col-sm-6">
				<div class="title">
					<h1><?php the_title() ?></h1>
				</div>
			</div>
		</div>
	</div>

	<?php // listing ?>
	<div class="listing">
		<?php
			$arg = array(
				'post_type' => 'project_item',
				'post_status' => 'publish',
				'order'    => 'DESC',
				'orderby' => 'date',
				'post_count' => 9999
			);
			$loop = new WP_Query( $arg );
			if ( $loop->have_posts() ) :
				$output = '';
				$count = 0;
				$count_where = get_field('where_contact', 'option');
				while ( $loop->have_posts() ) : $loop->the_post();
					$image = get_field('featured_image');
					$img_size = 'ratio4-3-half';
					$img_url = 	wp_get_attachment_image_src( $image, $img_size );
					if ($count == $count_where - 1 && $count_where != 0):
						$output .= add_contact_to_output_projects(); // add contact in overview
					endif;
					$output .='
						<div class="item isotope-item vcenter '. custom_taxonomies_project_page() .'">
							<div>
								<a href="'. get_the_permalink() .'">
									<img class="ll" src="'. get_stylesheet_directory_uri() .'/assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="" />
									<div class="title">'. get_the_title() .'</div>
								</a>
							</div>
						</div>';

					$count++;
				endwhile;
			endif;

			echo $output;
		?>

	</div>
	<?php // end listing ?>

	<?php if ( is_user_logged_in() ): ?>
		<p id="filter-display">filters here</p>
	<?php endif; ?>

</div>
<?php endwhile; // end of the loop. ?>
<?php //end main ?>

<?php get_template_part( '/lib/parts/navigation', '' ); ?>
<?php get_template_part( '/lib/parts/footer', '' ); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/isotope.pkgd.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.debouncedresize.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.lazyload.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/min/overview-min.js"></script>
<?php get_footer(); ?>