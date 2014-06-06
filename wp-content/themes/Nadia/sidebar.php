<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>
<!-- ======= Sidebar-->

<div class="col-md-4 col-lg-3 nomo">
	<div id="secondary" class="widget-area" role="complementary">
		<div class="row">
			<div class="col-md-12">
    <?php

	if (is_single() && is_active_sidebar('single-post-sidebar') ) {
		dynamic_sidebar( 'single-post-sidebar' );
	}

	elseif (is_page() && is_page_template('page-contact-us.php') && is_active_sidebar('contact-sidebar') ) {
		dynamic_sidebar( 'contact-sidebar' );
	}

	elseif (is_page() && is_page_template('page-blog.php') && is_active_sidebar('blog-sidebar') ) {
		dynamic_sidebar( 'blog-sidebar' );
	}

	elseif (is_page() && is_active_sidebar('page-sidebar') ) {
		dynamic_sidebar( 'page-sidebar' );
	}

	else{
		dynamic_sidebar( 'sidebar' );
	}
?>
			</div>
		</div>
	</div>
</div> 
<!-- ======= /Sidebar-->