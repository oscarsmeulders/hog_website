<?php
/**
 * 	Template Name: Home Page
 *
 *	This page is the template for home.
 *
*/
get_header(); ?>
</head>
<body <?php body_class('homepage'); ?> >
<?php get_template_part( '/lib/parts/header', '' ); ?>

<?php //main ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="main">
	<!-- showcase -->
	<div id="showcase" class="container-fluid">
		 <div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3">

				<?php
					//panel
					$title = get_field('panel_1_titel');
					$link = get_field('panel_1_link');
					$image = get_field('panel_1_image');
					$img_size = 'ratio1-2';
					$img_url = 	wp_get_attachment_image_src( $image, $img_size );
				?>
				<div class="case">
					<a href="<?php echo $link; ?>">
						<div class="proportions ratio1_2">
							<div class="content background-image" style="background-image: url( <?php echo $img_url[0] ?> )">
								<div class="title">
									<?php echo get_responsive_title( $title ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php //end panel ?>

			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">
				<div class="case">
					<div class="proportions">
						<div class="content">
							<div class="text">
								<?php
									$intro_text_xl = get_field('intro_text_xl');
									$intro_text_l = get_field('intro_text_l');
									$intro_text_m = get_field('intro_text_m');
									$intro_text_s = get_field('intro_text_s');
								?>
								<div class="xl"><?php echo $intro_text_xl; ?></div>
								<div class="l"><?php echo $intro_text_l; ?></div>
								<div class="m"><?php echo $intro_text_m; ?></div>
								<div class="s"><?php echo $intro_text_s; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6">

				<?php
					//panel
					$title = get_field('panel_2_titel');
					$link = get_field('panel_2_link');
					$image = get_field('panel_2_image');
					$img_size = 'ratio2-1';
					$img_url = 	wp_get_attachment_image_src( $image, $img_size );
				?>
				<div class="case">
					<a href="<?php echo $link; ?>">
						<div class="proportions ratio2_1">
							<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
								<div class="title">
									<?php echo get_responsive_title( $title ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php //end panel ?>

			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">

				<?php
					//panel
					$title = get_field('panel_3_titel');
					$link = get_field('panel_3_link');
					$image = get_field('panel_3_image');
					$img_size = 'ratio1-1';
					$img_url = 	wp_get_attachment_image_src( $image, $img_size );
				?>
				<div class="case">
					<a href="<?php echo $link; ?>">
						<div class="proportions">
							<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
								<div class="title">
									<?php echo get_responsive_title( $title ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php //end panel ?>

			</div>
			<div class="col-xs-12 col-sm-3 col-md-3">

				<?php
					//panel
					$title = get_field('panel_4_titel');
					$link = get_field('panel_4_link');
					$image = get_field('panel_4_image');
					$img_size = 'ratio1-1';
					$img_url = 	wp_get_attachment_image_src( $image, $img_size );
				?>
				<div class="case">
					<a href="<?php echo $link; ?>">
						<div class="proportions">
							<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
								<div class="title">
									<?php echo get_responsive_title( $title ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php //end panel ?>

			</div>
			<div class="col-xs-12 col-sm-3">

				<?php
					//panel
					$title = get_field('panel_5_titel');
					$link = get_field('panel_5_link');
					$image = get_field('panel_5_image');
					$img_size = 'ratio1-1';
					$img_url = 	wp_get_attachment_image_src( $image, $img_size );
				?>
				<div class="case">
					<a href="<?php echo $link; ?>">
						<div class="proportions">
							<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
								<div class="title">
									<?php echo get_responsive_title( $title ); ?>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php //end panel ?>

			</div>
		</div>
	</div>
	<!-- end showcase -->

	<div class="container-fluid container-content">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="">

					<?php if (get_field('panel_6_titel')): ?>
						<div class="col-xs-12 col-sm-6">
							<?php
								//panel
								$title = get_field('panel_6_titel');
								$link = get_field('panel_6_link');
								$image = get_field('panel_6_image');
								$img_size = 'ratio1-1';
								$img_url = 	wp_get_attachment_image_src( $image, $img_size );
							?>
							<div class="case">
								<a href="<?php echo $link; ?>">
									<div class="proportions">
										<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
											<div class="title">
												<?php echo get_responsive_title( $title ); ?>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php //end panel ?>
						</div>
					<?php endif; ?>

					<?php if (get_field('panel_7_titel')): ?>
						<div class="col-xs-12 col-sm-6">
							<?php
								//panel
								$title = get_field('panel_7_titel');
								$link = get_field('panel_7_link');
								$image = get_field('panel_7_image');
								$img_size = 'ratio1-1';
								$img_url = 	wp_get_attachment_image_src( $image, $img_size );
							?>
							<div class="case">
								<a href="<?php echo $link; ?>">
									<div class="proportions">
										<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
											<div class="title">
												<?php echo get_responsive_title( $title ); ?>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php //end panel ?>
						</div>
					<?php endif; ?>

					<div class="col-xs-12 col-sm-12">
						<?php get_template_part( '/lib/parts/newsletter', '' ); ?>
					</div>

					<?php if (get_field('panel_8_titel')): ?>
						<div class="col-xs-12 col-sm-6">
							<?php
								//panel
								$title = get_field('panel_8_titel');
								$link = get_field('panel_8_link');
								$image = get_field('panel_8_image');
								$img_size = 'ratio1-1';
								$img_url = 	wp_get_attachment_image_src( $image, $img_size );
							?>
							<div class="case">
								<a href="<?php echo $link; ?>">
									<div class="proportions">
										<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
											<div class="title">
												<?php echo get_responsive_title( $title ); ?>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php //end panel ?>
						</div>
					<?php endif; ?>
					<?php if (get_field('panel_9_titel')): ?>
						<div class="col-xs-12 col-sm-6">
							<?php
								//panel
								$title = get_field('panel_9_titel');
								$link = get_field('panel_9_link');
								$image = get_field('panel_9_image');
								$img_size = 'ratio1-1';
								$img_url = 	wp_get_attachment_image_src( $image, $img_size );
							?>
							<div class="case">
								<a href="<?php echo $link; ?>">
									<div class="proportions">
										<div class="content background-image" style="background-image: url(' <?php echo $img_url[0] ?> ')">
											<div class="title">
												<?php echo get_responsive_title( $title ); ?>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php //end panel ?>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; // end of the loop. ?>
<?php //end main ?>

<?php get_template_part( '/lib/parts/navigation', '' ); ?>
<?php get_template_part( '/lib/parts/footer', '' ); ?>
<?php get_footer(); ?>