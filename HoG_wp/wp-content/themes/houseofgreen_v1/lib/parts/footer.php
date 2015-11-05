<?php //footer ?>
<div class="footer">
	<div class="container-fluid container-title">
		<div class="row">
			<div class="col-xs-12 col-sm-12 vormentaal">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/footer_vormentaal_1.jpg" alt="" width="795" height="100" />
			</div>
		</div>
		<div class="row tekst">
			<div class="col-xs-12 col-sm-6 col-md-8">
				<p><strong><a href="#">House of Green</a></strong></p>
				<?php
					$footer_adres = get_field( 'footer_adres', 'option' );
					if( $footer_adres ) {
						echo $footer_adres;
					}
				?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<a href="#"><div class="button topper"></div></a>
				<div style="float:right;">
					<p>&nbsp;</p>
					<p><a href="#">Algemene voorwaarden</a>&nbsp;&nbsp;&nbsp;<a href="#">Disclaimer</a>&nbsp;&nbsp;&nbsp;</p>
				</div>

			</div>
		</div>
	</div>
</div>
<?php //end footer ?>