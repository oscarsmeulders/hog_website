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
			<div class="col-xs-12 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9 buttons-gallery">
				<div class="button button-filters closed">Filters</div>
			</div>
			<?php  filters ?>
			<div class="closed hidden filters-menu">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6 filters-list">
						<div id="options">
							<?php 
								if (isset($_GET['filter'])) {
									$filter = $_GET['filter'];
								}
							?>
							<?php // set filters 1 ?>
							<div class="option-set" data-group="soort">
								<h5><?php _e( 'filter_project_kind_category', 'hog_lang' ) ?></h5>
								<ul>
									<?php
										$args = array(
											'hide_empty' => 1
										);
										$taxonomies = get_terms('project_kind_category', $args);
										if  ($taxonomies) :
											foreach ($taxonomies  as $taxonomy ) :
												echo '<li><input type="checkbox" value=".'. $taxonomy->slug .'" id="'. $taxonomy->slug .'" class="hog-checkbox" '. check_filterVar_with_filter_slug($filter, $taxonomy->slug).'/><label for="'. $taxonomy->slug .'" class="hog-label">'. $taxonomy->name .'</label></li>';
											endforeach;
										endif;
										wp_reset_query();
									?>
								</ul>
							</div>
							<?php // end set filters 1 ?>
							<?php // set filters 2 ?>
							<div class="option-set" data-group="soort">
								<h5><?php _e( 'filter_project_size_category', 'hog_lang' ) ?></h5>
								<ul>
									<?php
										$args = array(
											'hide_empty' => 1
										);
										$taxonomies = get_terms('project_size_category', $args);
										if  ($taxonomies) :
											foreach ($taxonomies  as $taxonomy ) :
												echo '<li><input type="checkbox" value=".'. $taxonomy->slug .'" id="'. $taxonomy->slug .'" class="hog-checkbox" '. check_filterVar_with_filter_slug($filter, $taxonomy->slug) .'/><label for="'. $taxonomy->slug .'" class="hog-label">'. $taxonomy->name .'</label></li>';
											endforeach;
										endif;
										wp_reset_query();
									?>
								</ul>
							</div>
							<?php // end set filters 2 ?>
						</div>

					</div>
				</div>
			</div>
			<?php // end filters ?>
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