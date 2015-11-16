
<?php while ( have_posts() ) : the_post(); ?>

	<?php
		$title = 				get_the_title();
		$site_name = 			get_bloginfo('name');
		$description = 			substr(strip_tags($post->post_content), 0, 50);
		$description_long =		substr(strip_tags($post->post_content), 0, 350);
		$link = 				get_the_permalink();

		$image = get_field('featured_image');
		$img_size = 'facebook';
		$img_url = 	wp_get_attachment_image_src( $image, $img_size );
	?>
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:site_name" content="<?php echo $site_name; ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $img_url[0]; ?>" />
	<meta property="og:picture" content="<?php echo $img_url[0]; ?>" />
	<meta property="og:url" content="<?php echo $link; ?>" />
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="fb:app_id" content="1513250345654273" />


</head>
<body <?php body_class('detail'); ?> >
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1513250345654273',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
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
							echo '<a href="'. $projectCookie .'"><h2>'. __( 'title_projecten', 'hog_lang' ) .'</h2></a>';
						endif;
						wp_reset_postdata();
					?>
					<h1><?php echo the_title(); ?></h1>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 buttons-gallery">
					<a href="#next"><div class="button button-next-gallery"></div></a>
					<a href="#previous"><div class="button button-previous-gallery"></div></a>
					<a href="mailto:?&subject=<?php echo $site_name; ?>%20-%20<?php echo $title; ?>&body=<?php echo $site_name; ?>%20-%20<?php echo $title; ?>%0D%0A<?php echo $description_long; ?>%0D%0A%0D%0A<?php echo $link; ?>"><div class="button email diap"></div></a>
					<!-- <a href="#"><div class="button instagram diap"></div></a> -->
					<a href="https://www.facebook.com/dialog/feed?app_id=1513250345654273&display=popup&caption=<?php echo $title; ?>&description=<?php echo $description; ?>&picture=<?php echo $img_url[0]; ?>&link=<?php echo $link; ?>&redirect_uri=<?php echo $link; ?>" target="social"><div class="button facebook diap"></div></a>
					<a href="https://pinterest.com/pin/create/button/?url=<?php echo $link; ?>&media=<?php echo $img_url[0]; ?>&description=<?php echo $site_name; ?>%20-%20<?php echo $title; ?>%20-%20<?php echo $description; ?>" target="social"><div class="button pintrest diap"></div></a>
				</div>
			</div>
		</div>
	</div>
	<?php // end title + button ?>


	<?php
		$slideshow = get_field('select_gallery');
		$output = '';
		if( $slideshow ):
			// override $post
			$post = $slideshow;
			setup_postdata( $post );
			$images_slideshow = array();
			if(have_rows('gallery_photo')):
				while( have_rows('gallery_photo') ): the_row();
					$description = 		get_sub_field('description');
					$img = 				get_sub_field('gallery_image');

					$size = 			get_sub_field('ratio');
					$size_small = 		get_sub_field('ratio').'-half';

					$img_url =		 	wp_get_attachment_image_src( $img, $size );
					$img_url_small = 	wp_get_attachment_image_src( $img, $size_small );

					$output_img =		'<img data-src="<960:'. $img_url_small[0] .', >960:'. $img_url[0] .'" />';
					$output .= 			'<div class="gallery-cell '. $size .'" data-text="'. $description .' ">'. $output_img .'</div>';

				endwhile;
			endif;
			echo '
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<div class="gallery">
							'. $output .'
							</div>
						</div>
					</div>
				</div>';
		?>
		<?php wp_reset_postdata(); ?>
	<?php else: // no slideshow is selected ?>

	<?php endif; ?>

	<?php // meta ?>
	<?php if ($slideshow) : ?>
		<div class="container-fluid container-gallery">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2">
					<div class="title col-xs-12 col-sm-6">&nbsp;</div>
					<div class="metas col-xs-12 col-sm-6">
						<?php echo custom_taxonomies_detail_page(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php // end meta ?>

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

	<?php get_template_part( '/lib/parts/related_projects', '' ); ?>

</div>

<?php //end main ?>

<?php get_template_part( '/lib/parts/navigation', '' ); ?>
<?php get_template_part( '/lib/parts/footer', '' ); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/responsive-img.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/min/detail-min.js"></script>
<?php endWhile; ?>