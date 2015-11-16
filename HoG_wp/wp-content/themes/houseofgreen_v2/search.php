<?php
/**
 * The template for displaying Search Results pages
 *
 */

get_header(); ?>
</head>
<body <?php body_class('overview search-is-open'); ?> >
<?php get_template_part( '/lib/parts/header', '' ); ?>

<?php //main ?>
	<div class="main">

		<div class="container-fluid container-title">
			<div class="row">
				<div class="col-xs-6 col-sm-6">
					<div class="title">
						<h1><?php _e( 'title_search', 'hog_lang' ) ?></h1>
					</div>
				</div>
			</div>
		</div>
		<?php if ( have_posts() ) : ?>
		<!-- listing -->
		<div class="listing">
			<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$output = '';
				$image = get_field('featured_image');
				$img_size = 'ratio4-3';
				$img_url = 	wp_get_attachment_image_src( $image, $img_size );
				$output .='
					<div class="item isotope-item '. custom_taxonomies_overview_page() .'">
						<div>
							<a href="'. get_the_permalink() .'">
								<img class="ll" src="assets/img/src-empty.png" data-original="'. $img_url[0] .'" alt="" />
								<div class="title">'. get_the_title() .'</div>
							</a>
						</div>
					</div>';

				echo $output;
			?>
			<?php endwhile; // end of the loop. ?>
		</div>
		<!-- end listing -->

		<?php endif; ?>

	</div>



<?php //end main ?>

<?php get_template_part( '/lib/parts/navigation', '' ); ?>
<?php get_template_part( '/lib/parts/footer', '' ); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/isotope.pkgd.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.debouncedresize.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jquery.lazyload.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/min/overview-min.js"></script>
<?php get_footer(); ?>