<?php
/**
 * The index for my theme
 *
 * @package awesometheme
 * @since 1.0
 * @version 1.0
 */

?>
<?php get_header(); ?>
<div class="header-image" style="background-image: url('<?php header_image(); ?>');">
<!-- 			<h1 class="text-center">在线简历，再也不求人！</h1> -->
</div>
<div id="content">
    <?php if(  have_posts()): ?>
        <?php while( have_posts()) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', 'front' ); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>