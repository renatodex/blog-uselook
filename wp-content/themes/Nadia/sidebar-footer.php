<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>
<!-- ======= Footer Sidebar-->
<div class="col-md-3">

	<?php if(of_get_option('logo_uploader_footer', false)) : ?>

	<h2 class="logo-footer-img"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php custom_logo('footer'); ?></a></h2>

	<?php else: ?>

	<h2 class="logo-footer"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

	<?php endif; ?>

	<p class="site-description"><?php echo of_get_option('site_description'); ?></p>

	<?php dynamic_sidebar( 'footer-1' ); ?>

	<p class="copy"><?php echo of_get_option('footer_tag'); ?></p>

</div>

<div class="col-md-3">
	<?php dynamic_sidebar( 'footer-2' ); ?>
</div>

<div class="col-md-3">
	<?php dynamic_sidebar( 'footer-3' ); ?>
</div>

<div class="col-md-3">
	<?php dynamic_sidebar( 'footer-4' ); ?>
</div>


