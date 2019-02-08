<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tmcc
 */

get_header();
?>

<div class="uk-container uk-margin-large-top uk-margin-large-bottom">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><?php the_title() ;?></h1>
	<div class="uk-flex" uk-grid>
		<main class="uk-width-1-2">
			<?php the_content(); ?>
		</main>
		<aside class="uk-width-1-4 uk-flex-first">
			<h2 class="uk-h4">Share</h2>
			<div>
		    <!-- Facebook -->
		    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" uk-icon="icon: facebook"></a>
			</div>
			<div>
		    <!-- Twitter -->
		    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php echo urlencode(get_the_title()); ?>" target="_blank" uk-icon="icon: twitter"></a>
			</div>
			<div>
				<!-- Email -->
				<a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com" uk-icon="icon: mail"></a>
			</div>
		</aside>
	</div>
	<?php endwhile; endif; ?>
</div>

<?php
get_footer();
