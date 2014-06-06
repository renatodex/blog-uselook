<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h2 class="entry-title"><?php _e( 'Nothing Found', 'nadia' ); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() ) { ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nadia' ), admin_url( 'post-new.php' ) ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p class="alert"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nadia' ); ?></p>
			<form class="form-search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
  						<div class="input-append">
   						 <input type="text" name="s" id="s" class="field span3 search-query">
  						 <button type="submit" name="submit" id="searchsubmit" class="btn">Search</button>
  						</div>
					</form>

		<?php } else { ?>

			<p class="alert"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nadia' ); ?></p>
			<form class="form-search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
  						<div class="input-append">
   						 <input type="text" name="s" id="s" class="field span3 search-query">
  						 <button type="submit" name="submit" id="searchsubmit" class="btn">Search</button>
  						</div>
					</form>

		<?php } ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->
