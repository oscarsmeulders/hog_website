<?php //header ?>
<div class="container-fluid" id="header">
	<div class="row">
		<div class="col-xs-5 col-sm-3">


<!--
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="logo"></div>
			</a>
-->
			<div class="logo">
				<?php get_template_part( '/lib/parts/logo', '' ); ?>
			</div>

		</div>
		<div class="col-xs-3 col-sm-7">
			<!-- <div class="button button-header button-menu"><?php _e( 'header_menu', 'hog_lang' ); ?></div> -->
		</div>
		<div class="col-xs-4 col-sm-2">
			<?php
				$link_language = get_field( 'link_language', 'option' );
				if( $link_language ) {
					echo '<a href="'. $link_language  .'"><div class="button button-header button-language">'. __( 'header_language', 'hog_lang' ) .'</div></a>';
				}
			?>
			<div class="button button-header button-search"></div>
		</div>
	</div>
</div>
<div class="container-fluid" id="searchbar">
	<div class="row">
		<div class="col-xs-10 col-sm-10">

			<form action="<?php echo site_url(); ?>">
				<input class="input input-search" id="search" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'header_search_placeholder', 'hog_lang' ); ?>">
			</form>

		</div>
		<div class="col-xs-2 col-sm-2">
			<div class="button button-search-action"><?php _e( 'header_search', 'hog_lang' ); ?></div>
		</div>

	</div>
</div>
<?php //end header ?>
<?php //button ?>
<div class="menu-button">
	<div class="push">&nbsp;</div>
	<div class="button button-header button-menu"><?php _e( 'menu_bt_header_open', 'hog_lang' ) ; ?></div>
</div>
<?php //end button ?>