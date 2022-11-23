<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<h2 class="post-title"><?php the_title(); ?></h2>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php else: ?>
	<h1><?php esc_html_e( 'Sorry, nothing to display.', 'mkoneprojects' ); ?></h1>
<?php endif; ?>
<?php get_footer(); ?>