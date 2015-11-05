<?php
/**
 * The template for displaying any single page.
 *
 */

get_header(); ?>
<body <?php body_class(); ?> >
<?php get_template_part( '/lib/parts/header', '' ); ?>

<?php //main ?>
<div class="main">

</div>
<?php //end main ?>

<?php get_template_part( '/lib/parts/navigation', '' ); ?>
<?php get_template_part( '/lib/parts/footer', '' ); ?>
<?php get_footer(); ?>