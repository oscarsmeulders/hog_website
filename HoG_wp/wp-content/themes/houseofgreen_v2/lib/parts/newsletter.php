<div class="newsletter">
	<form action="">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h4><?php _e( 'newsletter_title', 'hog_lang' ); ?></h4>
			</div>
		</div>
		<div class="row row-eq-height">
			<div class="col-xs-7 col-sm-7 col-md-8">
				<!-- legenda -->
				<div class="row">
					<div class="col-md-4 hidden-xs hidden-sm input-legenda">
						<?php _e( 'newsLetter_firstname', 'hog_lang' ); ?>
					</div>
					<div class="col-xs-12 col-md-8">
						<input class="input input-name" type="text" name="name" placeholder="<?php _e( 'newsLetter_firstname_placeholder', 'hog_lang' ); ?>">
					</div>
				</div>
				<!-- /legenda -->
				<!-- legenda -->
				<div class="row">
					<div class="col-md-4 hidden-xs hidden-sm input-legenda">
						<?php _e( 'newsLetter_lastname', 'hog_lang' ); ?>
					</div>
					<div class="col-xs-12 col-md-8">
						<input class="input input-surname" type="text" name="surname" placeholder="<?php _e( 'newsLetter_lastname_placeholder', 'hog_lang' ); ?>">
					</div>
				</div>
				<!-- /legenda -->
				<!-- legenda -->
				<div class="row">
					<div class="col-md-4 hidden-xs hidden-sm input-legenda">
						<?php _e( 'newsLetter_email', 'hog_lang' ); ?>
					</div>
					<div class="col-xs-12 col-md-8">
						<input class="input input-email" type="text" name="name" placeholder="<?php _e( 'newsLetter_email_placeholder', 'hog_lang' ); ?>">
					</div>
				</div>
				<!-- /legenda -->
			</div>
			<div class="col-xs-5 col-sm-5 col-md-4">
				<div class="contact-item">
					<?php
						$contact_page = get_field( 'contact_page', 'option' );
						if( $contact_page ) {
							echo '<a href="'. $contact_page .'" target="_self"><div class="button-newsletter"></div></a>';
						}
					?>
				</div>
			</div>
		</div>
	</form>
</div>