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
				<div class="button button-filters">Filters</div>
			</div>
			<!-- filters -->
			<div class="closed hidden filters-menu">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-6 col-lg-6 col-lg-offset-6 filters-list">
						<div id="options">
							<?php // set filters 1 ?>
							<div class="option-set" data-group="soort">
								<h4><?php _e( 'filter_project_kind_category', 'hog_lang' ) ?></h4>
								<ul>
									<?php
										$args = array(
											'hide_empty' => 1
										);
										$taxonomies = get_terms('project_kind_category', $args);
										if  ($taxonomies) :
											foreach ($taxonomies  as $taxonomy ) :
												echo '<li><input type="checkbox" value=".'. $taxonomy->slug .'" id="'. $taxonomy->slug .'" class="hog-checkbox" /><label for="'. $taxonomy->slug .'" class="hog-label">'. $taxonomy->name .'</label></li>';
											endforeach;
										endif;
									?>
								</ul>
							</div>
							<?php // end set filters 1 ?>
							<div class="option-set" data-group="oppervlakte">
								<h4>Not working yet</h4>
								<ul>
									<li>
										<input type="checkbox" value=".oppervlakte1" id="oppervlakte1" class="hog-checkbox" /><label for="oppervlakte1" class="hog-label">Oppervlakte 1</label>
									</li>
									<li>
										<input type="checkbox" value=".oppervlakte2" id="oppervlakte2" class="hog-checkbox" /><label for="oppervlakte2" class="hog-label">Oppervlakte 2</label>
									</li>
									<li>
										<input type="checkbox" value=".oppervlakte3" id="oppervlakte3" class="hog-checkbox" /><label for="oppervlakte3" class="hog-label">Oppervlakte 3</label>
									</li>
								</ul>
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- end filters -->
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

	<!-- listing -->
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

				endwhile;
			endif;
			echo $output;
		?>

	</div>
	<!-- end listing -->

	<p id="filter-display">filters here</p>

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