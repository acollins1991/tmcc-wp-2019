<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tmcc
 */

?>

<?php

// Check and show site footer if isn't contact us page
if( !is_page(45) ) {

  get_template_part( 'template-parts/site', 'footer' );

}

wp_footer();

?>

</body>
</html>
