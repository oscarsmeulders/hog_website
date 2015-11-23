<?php //footer ?>
<div class="footer">
	<div class="container-fluid container-title">
		<div class="row">
			<div class="col-xs-12 col-sm-12 vormentaal">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/footer/footer_vormentaal_<?php echo rand(1, 4); ?>.jpg" alt="" height="100" />
			</div>
		</div>
		<div class="row tekst">
			<div class="col-xs-12 col-sm-6 col-md-8">
				<p><strong><a href="<?php get_home_url(); ?>">House of Green</a></strong></p>
				<?php
					$footer_adres = get_field( 'footer_adres', 'option' );
					if( $footer_adres ) {
						echo $footer_adres;
					}
				?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<a href="#"><div class="button topper transparant"></div></a>
				<div style="float:right;">
					<p>&nbsp;</p>
					<?php
						$general_conditions =	get_field( 'general_conditions', 'option' );
						$disclaimer = 			get_field( 'disclaimer', 'option' );

					?>
					<p>
						<?php
							if ($general_conditions) :
								echo '<a href="'. $general_conditions .'">'. __( 'footer_general_conditions', 'hog_lang' ) .'</a>&nbsp;&nbsp;&nbsp;';
							endif;
							if ($disclaimer) :
								echo '<a href="'. $disclaimer .'">'. __( 'footer_disclaimer', 'hog_lang' ) .'&nbsp;&nbsp;&nbsp;</a>';
							endif;
						?>
					</p>
				</div>

			</div>
		</div>
	</div>
</div>
<?php //end footer ?>