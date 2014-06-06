<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'nadia'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'nadia'),
		'twos' => __('Two', 'nadia'),
		'three' => __('Three', 'nadia'),
		'four' => __('Four', 'nadia'),
		'five' => __('Five', 'nadia')
	);

	// Effect
	$effect_array = array(
		'slide' => __('Slide', 'nadia'),
		'fade' => __('Fade', 'nadia')
	);

	// Panel Position
	$position_array = array(
		'home_top' => __('Top', 'nadia'),
		'home_bottom' => __('Bottom', 'nadia')
	);

	// Multicheck Array
	$multicheck_array = array(
		'0' => __('Default (Red)', 'nadia'),
		'blue' => __('Blue', 'nadia'),
		'orange' => __('Orange', 'nadia'),
		'green' => __('Green', 'nadia'),
		'purple' => __('Purple', 'nadia'),
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '14px',
		'faces' => 'Palatino',
		'style' => 'normal');

	$typography_defaults2 = array(
		'size' => '28px',
		'face' => 'Oswald, sans-serif',
		'style' => 'bold');

	$sidebar_defaults = array(
		'size' => '14px',
		'faces' => 'Verdana',
		'style' => 'normal');

	$sep_defaults = array(
		'size' => '16px',
		'faces' => 'Oswald',
		'style' => 'normal');
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/img/';

	$options = array();

	$options[] = array(
		'name' => __('General', 'nadia'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Site description', 'nadia'),
		'desc' => __('Add a brief description about your site. It will be displayed under the footer logo section.', 'nadia'),
		'id' => 'site_description',
		'std' => '',
		'class' => 'desc',
		'type' => 'textarea');

		$options[] = array(
		'name' => __('Header Logo', 'nadia'),
		'desc' => __('Add a URL or upload an image for your logo (header section).', 'nadia'),
		'id' => 'logo_uploader',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Footer Logo', 'nadia'),
		'desc' => __('Add a URL or upload an image for your logo (footer section).', 'nadia'),
		'id' => 'logo_uploader_footer',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Favicon', 'nadia'),
		'desc' => __('Add a URL or upload an icon for your favicon. (recommended size: 16px*16px)', 'nadia'),
		'id' => 'favicon_uploader',
		'type' => 'upload');

		$options[] = array(
		'name' => __('Google Analytics', 'options_framework_theme'),
		'desc' => __('Paste here your Google Analytics code.', 'options_framework_theme'),
		'id' => 'ga_code',
		'std' => '',
		'class' => 'big',
		'type' => 'textarea');

		$options[] = array(
		'name' => __('Footer Tagline', 'options_framework_theme'),
		'desc' => __('Add a text to display on the footer.', 'options_framework_theme'),
		'id' => 'footer_tag',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Style', 'nadia'),
		'type' => 'heading');


	$options[] = array(
	'name' => "Color Scheme",
	'desc' => "Color scheme for your style.",
	'id' => "color_nn",
	'std' => "color_nadia",
	'type' => "images",
	'options' => array(
		'color_nadia' => $imagepath . 'color_nadia.png',
		'color_aqua' => $imagepath . 'color_aqua.png',
		'color_volta' => $imagepath . 'color_volta.png',
		'color_pulp' => $imagepath . 'color_pulp.png',
		'color_pastel' => $imagepath . 'color_pastel.png',
		'color_green' => $imagepath . 'color_green.png',
		'color_coffee' => $imagepath . 'color_coffee.png',
		'color_blues' => $imagepath . 'color_blues.png'),

	);


		$options[] = array(
	'name' => "Layout Structure",
	'desc' => "2 Columns Right Sidebar / 2 Columns Left Sidebar.",
	'id' => "layout_dph",
	'std' => "2c-r-fixed",
	'type' => "images",
	'options' => array(
		'2c-r-fixed' => $imagepath . '2cr.png',
		'2c-l-fixed' => $imagepath . '2cl.png'),
	);

	$options[] = array(
		'name' => __('Numbered Pagination', 'nadia'),
		'desc' => __('Enable the numbered page pagination', 'nadia'),
		'id' => 'numbered_pag',
		'std' => '0',
		'options' => 'Enable',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Custom Background', 'options_framework_theme'),
		'desc' => __('Enable this option if you want to set a custom background', 'options_framework_theme'),
		'id' => 'set_bg',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Boxed Layout', 'options_framework_theme'),
		'id' => 'set_boxed',
		'class' => 'hidden',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Change the background color or add an image.', 'nadia'),
		'id' => 'bg_opt',
		'class' => 'hidden',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'desc' => __('Responsive background image', 'nadia'),
		'id' => 'bg_responsive',
		'class' => 'hidden',
		'std' => '0',
		'options' => 'Enable',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Pattern overlay on background', 'nadia'),
		'id' => 'bg_overlay',
		'class' => 'hidden',
		'std' => '0',
		'options' => 'Enable',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Custom CSS', 'options_framework_theme'),
		'desc' => __('Add your custom CSS code in this area.', 'options_framework_theme'),
		'id' => 'custom_css',
		'std' => '',
		'class' => 'big',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Featured Area', 'nadia'),
		'type' => 'heading');

		$options[] = array(
		'name' => __('Reviewed Posts Section', 'nadia'),
		'desc' => __('Display Reviewed Posts section', 'nadia'),
		'id' => 'scored_posts_hm',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Position', 'nadia'),
		'id' => 'scored_position',
		'type' => 'select',
		'class' => 'mini hide',
		'options' => $position_array);


	$options[] = array(
		'name' => __('Media Format Posts Section', 'nadia'),
		'desc' => __('Display Video/Gallery Posts section', 'nadia'),
		'id' => 'media_posts_hm',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Position', 'nadia'),
		'id' => 'media_position',
		'type' => 'select',
		'class' => 'mini hide',
		'options' => $position_array);

	$options[] = array(
		'name' => __('Slider and Blocks', 'nadia'),
		'desc' => __('Enable Featured Posts (slider and featured blocks)', 'nadia'),
		'id' => 'featured_bk',
		'std' => '1',
		'options' => 'Enable',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Slider Posts', 'options_framework_theme'),
		'desc' => __('Set the number of posts to display in slider (1 = static block)', 'options_framework_theme'),
		'id' => 'numb_sld',
		'std' => '4',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Slider Options', 'nadia'),
		'desc' => __('Set the animation effect', 'nadia'),
		'id' => 'slider_fx',
		'type' => 'select',
		'class' => 'mini',
		'options' => $effect_array);

	$options[] = array(
		'desc' => __('Auto Play', 'nadia'),
		'id' => 'slider_auto',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Pause on mouse hover', 'nadia'),
		'id' => 'slider_hover',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'desc' => __('Set the speed of the slideshow cycling, in milliseconds', 'options_framework_theme'),
		'id' => 'show_sp',
		'std' => '6000',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Set the speed of animations, in milliseconds', 'options_framework_theme'),
		'id' => 'fx_sp',
		'std' => '600',
		'class' => 'mini',
		'type' => 'text');

		$options[] = array(
		'name' => __('Social', 'nadia'),
		'type' => 'heading');

		$options[] = array(
		'desc' => __('Display social icons on Header', 'nadia'),
		'id' => 'minicons_hd',
		'std' => '1',
		'type' => 'checkbox');

		$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('Add your Twitter URL.', 'options_framework_theme'),
		'id' => 'twitter_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

		$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('Add your Facebook URL.', 'options_framework_theme'),
		'id' => 'facebook_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

		$options[] = array(
		'name' => __('Google Plus', 'options_framework_theme'),
		'desc' => __('Add your Google+ URL.', 'options_framework_theme'),
		'id' => 'gplus_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

		$options[] = array(
		'name' => __('Pinterest', 'options_framework_theme'),
		'desc' => __('Add your Pinterest URL.', 'options_framework_theme'),
		'id' => 'pinterest_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

		$options[] = array(
		'name' => __('Instagram', 'options_framework_theme'),
		'desc' => __('Add your Instagram URL.', 'options_framework_theme'),
		'id' => 'instagram_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

		$options[] = array(
		'name' => __('Feed', 'options_framework_theme'),
		'desc' => __('Add your Feed URL.', 'options_framework_theme'),
		'id' => 'feed_id',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');

		$options[] = array(
		'name' => __('Advertising', 'nadia'),
		'type' => 'heading');

		$options[] = array(
		'name' => __('Header Banner', 'nadia'),
		'desc' => __('Ad Image Location (max width: 638px)', 'nadia'),
		'class' => 'adupload',
		'id' => 'ad_banner_uploader',
		'type' => 'upload');

		$options[] = array(
		'desc' => __('Ad Link Destination', 'nadia'),
		'id' => 'ad_banner_link',
		'std' => '',
		'class' => 'adsfield noborder',
		'type' => 'text');

		$options[] = array(
		'name' => __('Widget Single Ad', 'nadia'),
		'desc' => __('Ad Image Location (max width: 350px)', 'nadia'),
		'id' => 'ad_medium_uploader',
		'class' => 'adupload',
		'type' => 'upload');

		$options[] = array(
		'desc' => __('Ad Link Destination', 'nadia'),
		'id' => 'ad_medium_link',
		'std' => '',
		'class' => 'adsfield noborder',
		'type' => 'text');

		$options[] = array(
		'name' => __('Widget Ads (125x125)', 'nadia'),
		'desc' => __('Ad #1 Image Location', 'nadia'),
		'id' => 'ad_square_uploader_1',
		'class' => 'adupload',
		'type' => 'upload');

		$options[] = array(
		'desc' => __('Ad #1 Link Destination', 'nadia'),
		'id' => 'ad_square_link_1',
		'std' => '',
		'class' => 'adsfield',
		'type' => 'text');

		$options[] = array(
		'desc' => __('Ad #2 Image Location', 'nadia'),
		'id' => 'ad_square_uploader_2',
		'class' => '',
		'type' => 'upload');

		$options[] = array(
		'desc' => __('Ad #2 Link Destination', 'nadia'),
		'id' => 'ad_square_link_2',
		'std' => '',
		'class' => 'adsfield',
		'type' => 'text');

		$options[] = array(
		'desc' => __('Ad #3 Image Location', 'nadia'),
		'id' => 'ad_square_uploader_3',
		'class' => '',
		'type' => 'upload');

		$options[] = array(
		'desc' => __('Ad #3 Link Destination', 'nadia'),
		'id' => 'ad_square_link_3',
		'std' => '',
		'class' => 'adsfield',
		'type' => 'text');

		$options[] = array(
		'desc' => __('Ad #4 Image Location', 'nadia'),
		'id' => 'ad_square_uploader_4',
		'class' => '',
		'type' => 'upload');

		$options[] = array(
		'desc' => __('Ad #4 Link Destination', 'nadia'),
		'id' => 'ad_square_link_4',
		'std' => '',
		'class' => 'adsfield',
		'type' => 'text');



	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
