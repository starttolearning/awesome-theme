<?php
/**
 * The About Me for my theme
 * Template Name: Page no title
 * @package awesometheme
 * @since 1.0
 * @version 1.0
 */

?>
<?php get_header(); ?>

	<?php if(  have_posts()): ?>
		<?php while( have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<hr>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
