<?php //header ?>
<div class="container-fluid" id="header">
	<div class="row">
		<div class="col-xs-5 col-sm-3">
			<a href="/">
				<div class="logo"></div>
			</a>
		</div>
		<div class="col-xs-3 col-sm-7">
			<div class="button button-header button-menu"><?php _e( 'header_menu', 'hog_lang' ); ?></div>
		</div>
		<div class="col-xs-4 col-sm-2">
			<div class="button button-header button-language"><?php _e( 'header_language', 'hog_lang' ); ?></div>
			<div class="button button-header button-search"></div>
		</div>
	</div>
</div>
<div class="container-fluid" id="searchbar">
	<div class="row">
		<div class="col-xs-10 col-sm-10">

			<form action="/">
				<input class="input input-search" id="search" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'header_search_placeholder', 'hog_lang' ); ?>">
			</form>

		</div>
		<div class="col-xs-2 col-sm-2">
			<div class="button button-search-action"><?php _e( 'header_search', 'hog_lang' ); ?></div>
		</div>

	</div>
</div>
<?php //end header ?>