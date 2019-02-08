<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tmcc
 */

get_header();
?>

	<div class="uk-container">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="uk-text-center uk-margin-large-bottom uk-margin-top">Our Blog</h1>
				</header>
				<?php
			endif;

			?>

			<div class="uk-child-width-1-3" uk-grid>

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

			?>

			<a href="<?php the_permalink; ?>" class="uk-link-reset">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<img src="https://via.placeholder.com/400x250">

					<?php the_title( '<h1 class="uk-h3 uk-margin-top">', '</h1>' ); ?>
					<div class="entry-content">
						<?php	the_content(); ?>
					<div>
					<div class="entry-meta">
						<p class="uk-text-meta"><?php echo get_the_date(); ?></p> 
					</div>
				</article>
			</a>

			<?php

			endwhile;

			?>

			</div>

			<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</div>

<?php
get_footer();
