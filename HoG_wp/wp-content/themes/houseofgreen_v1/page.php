<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

</head>
<body <?php body_class('detail'); ?> >

<?php get_template_part( '/lib/parts/header', '' ); ?>

<?php //main ?>
<div class="main">

	<?php // title + buttons ?>
	<div class="container-fluid container-title">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-2">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 title">
					<?php
						$projectCookie = get_field('projects_overview', 'option');
						if( $projectCookie ) :
							$post = $projectCookie;	// override $post
							setup_postdata( $post );
							//echo '<a href="'. get_the_permalink() .'"><h2>'. __( 'title_projecten', 'hog_lang' ) .'</h2></a>';
							echo '<a href="'. get_the_permalink() .'"><h2>check the parent page</h2></a>';
						endif;
						wp_reset_postdata();
					?>
					<h1><?php echo the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php // end title + button ?>




	<?php // content ?>
	<div class="container-fluid container-content">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php // end content ?>

	<?php get_template_part( '/lib/parts/related_custom_posts', '' ); ?>
</div>

<?php //end main ?>

<?php get_template_part( '/lib/parts/navigation', '' ); ?>
<?php get_template_part( '/lib/parts/footer', '' ); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/min/detail-min.js"></script>
<?php endWhile; ?>
<?php get_footer(); ?>