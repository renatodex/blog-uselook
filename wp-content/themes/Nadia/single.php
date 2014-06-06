 <?php
/**
 * @package nadia
 * @since nadia 1.0
 */
get_header(); ?>

<div class="container">
	<div class="row">

    	<div id="content" class="<?php $optsb = get_post_meta($post->ID, 'meta_dph_sidebar', true); if ($optsb == "on") { echo 'col-md-12 single-content'; } else{ echo 'col-md-8 col-lg-9 single-content'; } ?>">

				<?php if (have_posts()) : while (have_posts()) : the_post(); setPostViews(get_the_ID()); ?>
					<?php get_template_part( 'content', 'single' ); ?>
		

				<?php endwhile; endif; wp_reset_query(); ?> 
		
		</div>

		<?php if (get_post_meta($post->ID, 'meta_dph_sidebar', true) == "on") { } else { get_sidebar(); } ?>

	</div> <!-- /.row -->
</div> <!-- /#wrap -->
<?php get_footer(); ?>