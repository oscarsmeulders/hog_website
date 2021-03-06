<?php  filters ?>
<div class="col-xs-12 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9 buttons-gallery">
	<div class="button button-filters closed">Filters</div>
</div>
<div class="closed hidden filters-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9  filters-list">
			<div id="options">
				<?php
					if (isset($_GET['filter'])) {
						$filter = $_GET['filter'];
					}
				?>
				<?php // set filters 1 ?>
				<div class="full option-set" data-group="soort">
					<h5><?php _e( 'filter_branch_kind_category', 'hog_lang' ) ?></h5>
					<ul>
						<?php
							$args = array(
								'hide_empty' => 1,
								'orderby' => 'slug',
								'posts_per_page' => 999,
								'order' => 'ASC',
								'post_status' => 'publish',
							);
							$taxonomies = get_terms('branch_kind_category', $args);
							if  ($taxonomies) :
								foreach ($taxonomies  as $taxonomy ) :
									echo '<li><input type="checkbox" value=".'. $taxonomy->slug .'" id="'. $taxonomy->slug .'" class="hog-checkbox" '. check_filterVar_with_filter_slug($filter, $taxonomy->slug).'/><label for="'. $taxonomy->slug .'" class="hog-label">'. $taxonomy->name .'</label></li>';
								endforeach;
							endif;
							wp_reset_query();
						?>
					</ul>
				</div>
				<?php // end set filters 1 ?>
			</div>

		</div>
	</div>
</div>
<?php // end filters ?>