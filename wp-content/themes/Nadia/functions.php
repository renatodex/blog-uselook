<?php
/**
 * nadia functions and definitions
 *
 * @package nadia
 * @since nadia 1.0
 */

/* Setup
=================================================================================================== */

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
    header( 'Location: '.admin_url().'themes.php?page=options-framework');
}

if ( ! isset( $content_width ) )
	$content_width = 848; /* pixels */

if ( ! function_exists( 'nadia_setup' ) ):
function nadia_setup() {

// Translation
load_theme_textdomain( 'nadia', get_template_directory() . '/inc/languages' );
$locale = get_locale();
$locale_file = get_template_directory() . "/inc/languages/$locale.php";
if ( is_readable( $locale_file ) )
require_once( $locale_file );

// Supported functions
add_theme_support( 'automatic-feed-links' ); 	// Add posts and comments RSS feed links to head
add_theme_support( 'post-thumbnails' ); 	   // Support for Post Thumbnails
add_theme_support('menus');
register_nav_menus( array( 'top-menu' => __( 'Header Menu', 'nadia' ), ) ); // Register Menu
register_nav_menus( array( 'footer-menu' => __( 'Footer Menu', 'nadia' ), ) ); // Register Menu

} endif; // nadia_setup
add_action( 'after_setup_theme', 'nadia_setup' );


// IMG Thumbnails
if ( function_exists( 'add_theme_support' ) ) { add_theme_support( 'post-thumbnails', array( 'post' , 'page'   ) ); }

add_image_size( 'n-blog', 848, 500, true );
add_image_size( 'n-slider', 650, 520, true );
add_image_size( 'n-sliderm', 300, 240, true );
add_image_size( 'n-squarew', 300, 274, true );



add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );

/* Register widgetized area
=================================================================================================== */
function nadia_widgets_init() {

register_sidebar( array(
'name' => __( 'Home Page Sidebar (Default)', 'nadia' ),
'id' => 'sidebar',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' =>  '</aside>',
'before_title' => '<h3 class="widget-title pretitle"><span>',
'after_title' => '</span></h3>',
));

register_sidebar( array(
'name' => __( 'Single Posts Sidebar', 'nadia' ),
'id' => 'single-post-sidebar',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' =>  '</aside>',
'before_title' => '<h3 class="widget-title pretitle"><span>',
'after_title' => '</span></h3>',
));

register_sidebar( array(
'name' => __( 'Pages Sidebar', 'nadia' ),
'id' => 'page-sidebar',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' =>  '</aside>',
'before_title' => '<h3 class="widget-title pretitle"><span>',
'after_title' => '</span></h3>',
));

register_sidebar( array(
'name' => __( 'Contact Page Sidebar', 'nadia' ),
'id' => 'contact-sidebar',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' =>  '</aside>',
'before_title' => '<h3 class="widget-title pretitle"><span>',
'after_title' => '</span></h3>',
));

register_sidebar( array(
'name' => __( 'Blog Template Sidebar', 'nadia' ),
'id' => 'blog-sidebar',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' =>  '</aside>',
'before_title' => '<h3 class="widget-title pretitle"><span>',
'after_title' => '</span></h3>',
));

register_sidebar( array(
'name' => __( 'Footer First-Column', 'nadia' ),
'id' => 'footer-1',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside><div class="clearfix"></div>',
'before_title' => '<h3 class="widget-title footer-news">',
'after_title' => '</h3>',
)); 

register_sidebar( array(
'name' => __( 'Footer Second-Column', 'nadia' ),
'id' => 'footer-2',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside><div class="clearfix"></div>',
'before_title' => '<h3 class="widget-title footer-news">',
'after_title' => '</h3>',
)); 

register_sidebar( array(
'name' => __( 'Footer Third-Column', 'nadia' ),
'id' => 'footer-3',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside><div class="clearfix"></div>',
'before_title' => '<h3 class="widget-title footer-news">',
'after_title' => '</h3>',
)); 

register_sidebar( array(
'name' => __( 'Footer Fourth-Column', 'nadia' ),
'id' => 'footer-4',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside><div class="clearfix"></div>',
'before_title' => '<h3 class="widget-title footer-news">',
'after_title' => '</h3>',
)); 
}

/* Add scripts and styles
=================================================================================================== */
function nadia_scripts() {
    global $wp_styles;
    $nn_colorcss = of_get_option('color_nn', null);
    
    /* * Load CSS */
    wp_enqueue_style( 'Bootstrap', get_template_directory_uri()  . '/css/bootstrap.css', array(), '3.0.3', 'all' );
    wp_enqueue_style( 'Lib', get_template_directory_uri()  . '/css/lib.css', array(), '1.4', 'all' );
    wp_enqueue_style( 'Style', get_template_directory_uri()  . '/css/main.css', array(), '1.4', 'all');
    wp_enqueue_style( 'Responsive', get_template_directory_uri()  . '/css/responsive.css', array(), '1.4', 'all' );

    if ($nn_colorcss && $nn_colorcss !== 'color_nadia' ) { wp_enqueue_style( 'Color', get_template_directory_uri() . '/css/color/' . $nn_colorcss . '.css', array('Style'), null ); }
    if ( of_get_option('set_boxed', false) && of_get_option('set_bg', false) ) {
    wp_enqueue_style( 'BoxedLayout', get_template_directory_uri()  . '/css/boxed.css', array('Style'), '1.4', 'all' );

    }
    /* * Load Javascript */
    wp_enqueue_script('jquery',false,null,null,true);
    wp_enqueue_script('Flex', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '2.3.0', true);
    wp_enqueue_script('Masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '3.1.3', true);
    wp_enqueue_script('Lib', get_template_directory_uri() . '/js/lib.js', array('jquery'), '1.1', true);
    wp_enqueue_script('Init', get_template_directory_uri() . '/js/init.js', array('jquery'), '1.1', true);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    $optauto = of_get_option('slider_auto', false);
    $pausemo = of_get_option('slider_hover', false);

    $params2 = array( //JS Vars
        'fx' => of_get_option('slider_fx'),
        'dphauto' => $optauto ? 'true' : 'false',
        'pausem' => $pausemo ? 'true' : 'false',
        'showsp' => of_get_option('show_sp', '6000'),
        'fxsp' => of_get_option('fx_sp', '600')
    );
    wp_localize_script('Init', 'dphvars', $params2 );
}


/* Comments Options
=================================================================================================== */
function nadia_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>

<li <?php comment_class(); ?>>
    <div id="comment-<?php comment_ID(); ?>">
        <span class="author-avatar"><?php echo get_avatar( $comment, '100' ); ?></span> 
    
        <div class="dph-comment">
            <?php comment_text() ?>
        </div>
        <div class="metacc"><span class="ccauthor"><?php comment_author_link(); ?></span> / <time class="date" datetime="<?php comment_time( 'c' ); ?>"><?php comment_date('F j, Y'); ?></time>

            <?php if ($comment->comment_parent != '0') : ?> <a href="<?php $commentparent = get_comment($comment->comment_parent); $commentparentpage = get_page_of_comment($commentparent) ; echo htmlspecialchars( get_comment_link( $commentparent, array('page' => $commentparentpage) ) ) ?>">(<?php _e('in reply to','nadia') ?> <?php echo $commentparent->comment_author; ?>)</a> <?php endif; ?>

            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>  
    </div>
<?php }


/* Excerpt custom
=================================================================================================== */
function extrdph($length) {
    return 19;
}

function extrmoredph($more) {
    return '...';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    echo $output;
}


/* Call Panels
=================================================================================================== */
if ( ! function_exists( 'nn_get_panels' ) ):

function nn_get_panels( $nn_panels_position ) {

    $scored_posts_nn = of_get_option('scored_posts_hm', false);
    $media_posts_nn = of_get_option('media_posts_hm', false);


    if ("home_top" == $nn_panels_position and is_home() and !is_paged() ) {

        if ( of_get_option('featured_bk', 'true') ) { 
            get_template_part( 'content', 'featured' ); 
        }

        if ( "home_top" == of_get_option('scored_position', false) and $scored_posts_nn ) { 
            get_template_part( 'content', 'reviews' ); 
        }

        if ( "home_top" == of_get_option('media_position', false) and $media_posts_nn ) { 
            get_template_part( 'content', 'media' );
        }
    }

    if ("home_bottom" == $nn_panels_position and is_home() and !is_paged() ) {

        if ( "home_bottom" == of_get_option('scored_position', false) and $scored_posts_nn ) { 
            get_template_part( 'content', 'reviews' ); 
        }

        if ( "home_bottom" == of_get_option('media_position', false) and $media_posts_nn ) { 
            get_template_part( 'content', 'media' );
        }
    }

    else{
        return false;
    }

}
endif; // nn_get_panels



/* Overlay Data
=================================================================================================== */
if ( ! function_exists( 'nn_data_over' ) ):

function nn_data_over($get_cat, $get_score, $get_format, $score_width) {
    global $post;

    $is_scored = get_post_meta($post->ID, 'meta_dph_review_score', true);

    if ($get_score and $is_scored) {
        $output = '<div class="ubscore"><input type="text" class="dial" data-width="'.$score_width.'" value="'. $is_scored .'"></div>';
        echo $output;
    }

    if (has_post_format( 'gallery' ) and !$is_scored  ) {
        $output = '<a href="'.get_permalink().'"><span class="ubgallery"></span></a>';
        echo $output;
    }

    elseif (has_post_format( 'video' ) and !$is_scored  ) {
        $output = '<a href="'.get_permalink().'"><span class="ubvideo"></span></a>';
        echo $output;
    }

    if ($get_cat) {
        $output = dph_category_style('single');
        echo $output;
    }


?>


<?php
}

endif; 




/* Number of comments with Facebook support
=================================================================================================== */
if ( ! function_exists( 'dph_comments_nb' ) ):

function dph_comments_nb( $dph_comments_class ) {
    global $post;

    $dph_comments = get_comments_number('0', '1', '%'); 
    $dph_postlink = get_permalink();

    if (get_post_meta($post->ID, 'meta_dph_fbcomms', true) == "on") { 
        echo '<a href="'.$dph_postlink.'#fb-comments"><div class="fb-comments-count '.$dph_comments_class.'" data-href="'.$dph_postlink.'">0</div> </a>';
    }
    else{
        echo '<a href="'.$dph_postlink.'#comments" class="'.$dph_comments_class.'">'.$dph_comments .' </a>';
    }

}
endif; // dph_comments_nb


/* Display Review Panel
=================================================================================================== */
if ( ! function_exists( 'nn_scored_panel' ) ):

function nn_scored_panel() {
    global $post;

    function nn_scored_bars($nn_metain_cr, $nn_metain_sc) {
        global $post;

        $nn_meta_cr = get_post_meta($post->ID, $nn_metain_cr, true);
        $nn_meta_sc = get_post_meta($post->ID, $nn_metain_sc, true);
        $output = '';

        if (get_post_meta($post->ID, $nn_metain_cr, true) and get_post_meta($post->ID, $nn_metain_sc, true) ) {
            $output = '<div class="progress">';
            $output .= '<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="'. $nn_meta_sc . '" aria-valuemin="0" aria-valuemax="100" style="width: '. $nn_meta_sc . '%">';
            $output .= '<span class="base-cr">'. $nn_meta_cr . '</span>';
            $output .= '<span class="base-sc">'. $nn_meta_sc . '</span>';
            $output .= '</div>';
            $output .= '</div>';
        }

        echo $output;

    }

?>
        <div class="score-panel">
            <div class="score-post">

                <div class="ubscore"><input type="text" class="dial" data-width="100" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_score', true); ?>"></div>

            </div>
            <div class="score-summ">
                 <span class="score-tag"><?php echo get_post_meta($post->ID, 'meta_dph_review_title', true); ?></span>
                <span class="summ"><?php echo get_post_meta($post->ID, 'meta_dph_review_summ', true); ?>
            </div> 

            

            <?php if (get_post_meta($post->ID, 'meta_dph_review_criterion_1', true) ) : ?>
            <div class="criter">
                <?php 
                nn_scored_bars('meta_dph_review_criterion_1', 'meta_dph_review_criterion_score_1');
                nn_scored_bars('meta_dph_review_criterion_2', 'meta_dph_review_criterion_score_2');
                nn_scored_bars('meta_dph_review_criterion_3', 'meta_dph_review_criterion_score_3');
                nn_scored_bars('meta_dph_review_criterion_4', 'meta_dph_review_criterion_score_4');
                ?>
            </div>
            <?php endif ?>
                  
        </div>

        <div class="wave"></div>

<?php
}

endif; // dph_comments_nb


/* Content Navi
=================================================================================================== */

if ( ! function_exists( 'nadia_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since nadia 1.0
 */
function nadia_content_nav( ) {
    global $wp_query, $post;

    // Don't print empty markup on single pages if there's nowhere to navigate.
    if ( is_single() ) {
        $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
        $next = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous )
            return;
    }

    // Don't print empty markup in archives if there's only one page.
    if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
        return;

    $nav_class = 'site-navigation paging-navigation';
    if ( is_single() )
        $nav_class = 'site-navigation post-navigation';

    ?>
    <nav role="navigation" id="nav-below" class="<?php echo $nav_class; ?>">

    <?php if ( is_single() ) : // navigation links for single posts ?>

        <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'nadia' ) . '</span> %title' ); ?>
        <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'nadia' ) . '</span>' ); ?>

    <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'nadia' ) ); ?></div>
        <?php endif; ?>

        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'nadia' ) ); ?></div>
        <?php endif; ?>

    <?php endif; ?>

    </nav>
    <?php
}
endif; // nadiacontent_nav



/* Content Nav
=================================================================================================== */

if ( ! function_exists( 'nadia_numbered_nav' ) ):

function nadia_numbered_nav() {
    global $wp_query, $post; $big = 999999999;

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'type'         => 'list',
        'prev_text'    => '&laquo;',
        'next_text'    => '&raquo;',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
        ) );
}


endif; // nadiacontent_nav


/* Get Styled Category
=================================================================================================== */

function dph_category_style($catlimit){
    global $post;
    $categories = get_the_category($post->ID);
    $output = '';

    if ($categories) {
        $output = '<div class="color-cats">';
        foreach($categories as $category) {
            $cat_link = get_category_link( $category->cat_ID );
            $cat_nm = $category->cat_name;
            $cat_ids = $category->term_id;
            $term_meta = get_option( "term_$cat_ids" );
            $dph_color_df = of_get_option('dph_'. $cat_ids .'_style', '#333');
            $term_meta['textcolor'] = ( !empty( $term_meta['textcolor'] ) ) ? $term_meta['textcolor'] : "#fff";
            $term_meta['bgcolor']   = ( !empty( $term_meta['bgcolor'] ) ) ? $term_meta['bgcolor'] : $dph_color_df;
            $output .= '<a style="color:'. $term_meta['textcolor'] . '; background:'. $term_meta['bgcolor'] . ';" class="featured-category" href="'.$cat_link.'">'.$cat_nm.'</a> ';
            if ( 'single' == $catlimit ) break;
        }

        $output .= '</div>';
    }

    echo $output;
}



/* Call custom-sized image thumbnail
=================================================================================================== */

function def_img(){
    $dir = get_template_directory_uri();
echo "<img src=\"$dir/img/def.png\" alt=\"\" />";
}

/* Custom logo call
/* ----------------------------------------------*/	
function custom_logo($location) {
if($location == 'header'){
$image_url = of_get_option('logo_uploader', 'no entry');
}
else{
$image_url = of_get_option('logo_uploader_footer', 'no entry');
}
$blognm = get_bloginfo( 'name' );

echo "<img src=\"$image_url\" alt=\"$blognm\" />";
}


/* Menu tweaks
=================================================================================================== */
add_filter( 'wp_nav_menu_items', 'add_home_link', 10, 2 );
function add_home_link($items, $args) {
  
        if (is_home()){
            $class = 'class="home-menu current current-menu-item"';
        }
        else{
            $class = 'class="home-menu"';
        }
        $homeMenuItem =
                "\n\t\t\t\t\t\t\t<li $class >" .
                $args->before .
                '<a href="' . home_url( '/' ) . '" title="Home">' .
                $args->link_before . 'Home' . $args->link_after .
                '</a>' .
                $args->after .
                "</li>";
        $items = $homeMenuItem . $items;
    return $items;
}



/* Post Views
=================================================================================================== */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

/* Social Icons
=================================================================================================== */
function dph_icons(){
    $twibtt = of_get_option('twitter_id', false);
    if($twibtt) echo "<a class=\"twitter\" href=\"$twibtt\"></a>\n";

    $fcbbtt = of_get_option('facebook_id', false);
    if($fcbbtt) echo "<a class=\"facebook\" href=\"$fcbbtt\"></a>\n";

    $gplbtt = of_get_option('gplus_id', false);
    if($gplbtt) echo "<a class=\"gplus\" href=\"$gplbtt\"></a>\n";

    $pintbtt = of_get_option('pinterest_id', false);
    if($pintbtt) echo "<a class=\"pint\" href=\"$pintbtt\"></a>\n";

    $instbtt = of_get_option('instagram_id', false);
    if($instbtt) echo "<a class=\"inst\" href=\"$instbtt\"></a>\n";

    $feedbtt = of_get_option('feed_id', false);
    if($feedbtt) echo "<a class=\"feed\" href=\"$feedbtt\"></a>";
}

/* Social Contact Methods
=================================================================================================== */
add_filter('user_contactmethods', 'dph_contactmethods');  
function dph_contactmethods($user_contactmethods){  
  unset($user_contactmethods['yim']);  
  unset($user_contactmethods['aim']);  
  unset($user_contactmethods['jabber']); 
  $user_contactmethods['twitter'] = 'Twitter Username';  
  $user_contactmethods['facebook'] = 'Facebook Username';
  $user_contactmethods['gplus'] = 'Google Plus ID';
  return $user_contactmethods;  
}  

/* Options Framework
=================================================================================================== */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
    $optionsframework_settings = get_option('optionsframework');
    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];
    
    if ( get_option($option_name) ) {
        $options = get_option($option_name);
    }
        
    if ( isset($options[$name]) ) {
        return $options[$name];
    } else {
        return $default;
    }
}
}

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/admin/' );
	require_once dirname( __FILE__ ) . '/inc/admin/options-framework.php';
}

// Launcher
add_action('wp_enqueue_scripts', 'nadia_scripts' );
add_action('widgets_init', 'nadia_widgets_init' );
add_filter('widget_text', 'do_shortcode');
add_action('init', 'register_shortcodes');

require_once(get_template_directory() . '/inc/widgets.php'); // Load Widgets
require_once(get_template_directory() . '/inc/category-color.php'); // Category Colors
require_once(get_template_directory() . '/inc/gallery.php'); // Custom Gallery
require_once(get_template_directory() . '/inc/stylevar.php'); // Style Var
include_once(get_template_directory() . '/inc/metabox.php'); // Meta
include_once(get_template_directory() . '/inc/shortcodes/shortcodes.php'); // Shortcodes