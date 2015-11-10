<?php
/**
 * 	Template Name: Overview - projecten
 *
 *	This page is the template for a overview - global.
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
					<h1><?php _e( 'title_projecten', 'hog_lang' ) ?></h1>
				</div>
			</div>
		</div>
	</div>

	<?php // listing ?>
	<div class="listing">
		<?php
			$arg = array(
				'post_type' => 'project_item'
			);

			$loop = new WP_Query( $arg );
			if ( $loop->have_posts() ) :
				$output = '';
				while ( $loop->have_posts() ) : $loop->the_post();
					$image = get_field('featured_image');
					$img_size = 'ratio4-3-half';
					$img_url = 	wp_get_attachment_image_src( $image, $img_size );
					$output .='
						<div class="item isotope-item '. custom_taxonomies_overview_page() .'">
							<div>
								<a href="'. get_the_permalink() .'">
									<img class="ll" src="'. get_stylesheet_directory_uri() .'/assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="" />
									<div class="title">'. get_the_title() .'</div>
								</a>
							</div>
						</div>';

				endwhile;
			endif;
			echo $output;
		?>

	</div>
	<?php // end listing ?>

	<!-- <p id="filter-display">filters here</p> -->

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