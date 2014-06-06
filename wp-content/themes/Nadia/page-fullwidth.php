 <?php
/**
 * @package nadia
 * @since nadia 1.0
 * Template Name: Full-Width
 */
get_header(); ?>	

<div class="container">
	<div class="row">

		<div id="content" class="col-md-12 page-content">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; endif; wp_reset_query(); ?> 
		
		</div>

	</div> <!-- /.row -->
</div> <!-- /#wrap -->
<?php get_footer(); ?>