<?php
/* Template Name: Service Template */
get_header();
?>

	<div class="uk-container uk-container-small uk-margin-large-top uk-margin-large-bottom">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.

    ?>

    <h2>Other Services</h2>

    <?php

    wp_nav_menu( array(
      'menu' => 'services_menu',
      'menu_class' => 'uk-list'
    ) );

		?>

	</div><!-- #primary -->

<?php get_footer(); ?>
