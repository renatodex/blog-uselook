<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-media wg-video">
			<?php if ( has_post_thumbnail() && !has_post_format() ) {
							the_post_thumbnail('');
						} ?>
	</div>

	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header>


	<div class="entry-content">	
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'nadia' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'nadia' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->

	<hr class="sep-str" />
</article><!-- #post-<?php the_ID(); ?> -->
