<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="featured-media wg-video">
			<?php if ( has_post_thumbnail() && !has_post_format('') ) {
			dph_category_style('multiple'); the_post_thumbnail('');
			} ?>
	</div>

	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<div class="single-entry-meta"><!-- .entry-meta-->
			<?php _e('By', 'nadia'); ?> <a class="author-meta" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" title="<?php the_author_meta('display_name'); ?>"><?php the_author_meta('display_name'); ?></a> //
			<time class="time-meta" datetime="<?php the_time( 'c' ); ?>"><?php the_time('F j, Y'); ?></time>
			<div class="info-share"><a class="share-tw" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><?php _e('Tweet', 'nadia'); ?></a><a class="share-fb" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>"><?php _e('Share', 'nadia'); ?></a></div>
		</div> <!-- /.entry-meta-->
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php $args = array(
			'before'           => '<p class="dphpost-pages">' . __('<span class="pgopen">Pages:</span>'),
			'after'            => '</p>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'pagelink'         => '<span>%</span>',
			'echo'             => 1
						); wp_link_pages( $args ); ?>
	</div>

   	<?php if(get_post_meta($post->ID, 'meta_dph_review', true) == "yes") : ?>
    	<?php if (function_exists('nn_scored_panel') and get_post_meta($post->ID, 'meta_dph_review', true) == "yes") { nn_scored_panel(); } ?>
    <?php endif; ?>
<hr class="sep-str" />
    <?php if ( get_the_tags() ) { the_tags('<ul class="entry-tags hidden-xs"><li>','</li><li>','</li></ul>'); } ?>
</article> <!-- .post-single -->

<footer class="footer-meta author-cc">
		<div class="profpic">
			<?php echo get_avatar( get_the_author_meta('ID'), 70 ); ?>
		</div>
		<h4><?php _e('About','nadia') ?> <?php the_author(); ?></h4>
		<a class="mini-author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php _e('view all posts', 'nadia'); ?></a>

		<div class="minicons hidden-xs">
			<?php $user_id = get_the_author_meta('ID');
			$twitter = get_user_meta ($user_id, 'twitter', true); if ($twitter) { echo "<a class=\"twitter\" href=\"http://twitter.com/$twitter\"></a>"; } ?>
			<?php $facebook = get_user_meta ($user_id, 'facebook', true); if ($facebook) { echo "<a class=\"facebook\" href=\"http://facebook.com/$facebook\"></a>"; } ?>
			<?php $gplus = get_user_meta ($user_id, 'gplus', true); if ($gplus) { echo "<a class=\"gplus\" href=\"http://plus.google.com/$gplus\"></a>"; } ?>
		</div>

		<p class="author-bio"><?php the_author_meta('description'); ?></p>
</footer>

<div class="clearfix"></div>


<?php if (get_post_meta($post->ID, 'meta_dph_fbcomms', true) == "on") { 
	echo '<div id="fb-comments" class="fb-comments" data-href="'. get_permalink() .'" data-num-posts="10"></div>';
	} 

elseif ( comments_open() || '0' != get_comments_number() ) { 
	comments_template( '', true );
	} 

?>
