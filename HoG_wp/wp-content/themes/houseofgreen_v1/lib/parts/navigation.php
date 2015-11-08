<?php //hog-nav ?>
<div class="hog-nav">
	<div class="hog-navigation-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 ">
					<?php
						$arr = array(
							'container' => 'ul',
							'container_class' => 'menu-header',
							'theme_location' => 'primary'
						);
						wp_nav_menu( $arr );
					?>
					<br/><br/>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 contact">
					<?php
						$naw_info = get_field( 'naw_info', 'option' );
						if( $naw_info ) {
							echo $naw_info;
						}
					?>
					<br/>
					<div class="social">
						<?php
							$contact_page = get_field( 'contact_page', 'option' );
							if( $contact_page ) {
								echo '<a href="'. $contact_page .'" target="_self"><div class="button-contact"></div></a>';
							}
						?>
						<?php
							$instagramLink = get_field( 'instagramLink', 'option' );
							if( $instagramLink ) {
								echo '<a href="'. $instagramLink .'" target="_blank"><div class="icon instagram"></div></a>';
							}
						?>
						<?php
							$linkedinLink = get_field( 'linkedinLink', 'option' );
							if( $linkedinLink ) {
								echo '<a href="'. $linkedinLink .'" target="_blank"><div class="icon linkedin"></div></a>';
							}
						?>
						<?php
							$pintrestLink = get_field( 'pintrestLink', 'option' );
							if( $pintrestLink ) {
								echo '<a href="'. $pintrestLink .'" target="_blank"><div class="icon pintrest"></div></a>';
							}
						?>
						<?php
							$facebookLink = get_field( 'facebookLink', 'option' );
							if( $facebookLink ) {
								echo '<a href="'. $facebookLink .'" target="_blank"><div class="icon facebook"></div></a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php //end hog-nav ?>