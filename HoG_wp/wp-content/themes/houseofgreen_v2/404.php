<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); ?>


</head>
<body <?php body_class('detail error'); ?> >

<?php get_template_part( '/lib/parts/header', '' ); ?>

<?php //main ?>
<div class="main">

	<?php // title + buttons ?>
	<div class="container-fluid container-title">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-2">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 title">
					<h1><?php _e( 'title_error', 'hog_lang' ) ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php // end title + button ?>



	<?php
		$errorContent = get_field('error-content', 'option');
	?>

	<?php // content ?>
	<div class="container-fluid container-content">
		<div class="row row-eq-height">
				<div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-6 col-md-offset-2 col-lg-6">
						<div class="content content-error">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<?php echo $errorContent; ?>
						</div>
				</div>
				<div class="hidden-xs hidden-sm col-md-2 col-lg-2 col-lg-offset-0">
						<div class="contact-item">
							<?php
								$contact_page = get_field( 'contact_page', 'option' );
								if( $contact_page ) {
									echo '<a href="'. $contact_page .'" target="_self"><div class="button-contact"></div></a>';
								}
							?>
						</div>
				</div>
			</div>
		</div>
	</div>
	<?php // end content ?>

	<?php get_template_part( '/lib/parts/related_custom_posts-error', '' ); ?>
</div>

<?php //end main ?>

<?php get_template_part( '/lib/parts/navigation', '' ); ?>
<?php get_template_part( '/lib/parts/footer', '' ); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/min/detail-min.js"></script>

<?php get_footer(); ?>