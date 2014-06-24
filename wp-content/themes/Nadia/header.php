 <?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php $favi = of_get_option('favicon_uploader', 'no entry'); if(of_get_option('favicon_uploader', false)) { echo "<link rel=\"shortcut icon\" href=\"$favi\" />"; } ?>
<title><?php global $page, $paged; wp_title( '-', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " - $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' - ' . sprintf( __( 'Page %s', 'nadia' ), max( $paged, $page ) ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 <!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="nn-wrap">

    <div id="topnav">
        <div class="container">
        <div class="inners">

            <div class="menu-bar">
                <div id="simple-menu" class="menu-icon hidden-md hidden-lg"></div>
                <nav class="main-nav navbar-section"> <!-- Navbar Section -->

            <?php if (has_nav_menu( 'top-menu' )) : ?>

                <?php wp_nav_menu(array('container' => false, 'menu_id' => 'header-menu', 'menu_class' => 'sf-menu', 'link_before' => '', 'theme_location' => 'top-menu')); ?>

            <?php else : ?>

                <ul id="header-menu" class="sf-menu">
                    <li class="home-menu <?php if (is_home()) echo "current current-menu-item"; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Home">Home</a></li>
                </ul>

            <?php endif; ?>

                </nav> <!-- /Navbar Section -->
            </div>

            <div class="search-bar">
                <div class="nav-search">
                    <form method="get" id="searchfr" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                        <label for="se" class="assistive-text"><?php _e('Search and hit', 'nadia'); ?></label>
                        <input type="text" class="field" name="s" id="se" placeholder="Search &hellip;" />
                    </form>
                    <div class="srch_btn"><?php _e('Go', 'nadia'); ?></div>
                </div>
            </div>

            <?php if(of_get_option('minicons_hd', true)) : ?>

            <div class="social-bar">
                <div class="minicons"><?php dph_icons(); ?></div>
            </div>

            <?php endif; ?>

        </div>
        </div>
    </div>

<div id="header">

    <!-- ============================= Top Container -->

    	<div class="container">
        <div class="row">

            <?php if(of_get_option('ad_banner_uploader', false)) : ?>
            <div class="col-md-12">
                <div class="banner-section"><a target="_blank" href="<?php echo of_get_option('ad_banner_link', 'no entry'); ?>"><img src="<?php echo of_get_option('ad_banner_uploader', 'no entry'); ?>" class="img-responsive" alt="Header Banner" /></a></div>
            </div>
            <?php endif; ?>

            <div class="col-md-12">
                <div class="logo-section">
					<?php if(of_get_option('logo_uploader', false)) : ?>
					<h1 class="logo-img"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php custom_logo('header'); ?></a></h1>
					<?php else: ?>
					<h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php endif; ?>
                </div>
                <hr class="sep-str" />
            </div>

        </div>
    	</div>

    <!-- ============================= /Top Container -->


</div>
