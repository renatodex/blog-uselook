<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php if ( has_post_thumbnail() ) : ?>
				<div class="featured-image">
					<?php nn_data_over(true, true, true, "80") ?>
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<?php the_post_thumbnail('n-squarew'); ?>
					</a>
				</div>
				<?php endif; ?>

				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header>

			<div class="entry-content">
				<p><?php wpe_excerpt('extrdph', 'extrmoredph'); ?></p>
				<div class="entry-meta">
					<time class="meta-date" datetime="<?php the_time( 'c' ); ?>"><?php the_time('F j, Y'); ?></time>
						<?php dph_comments_nb('meta-com'); ?>
				</div>

			</div>
			
		</article>
