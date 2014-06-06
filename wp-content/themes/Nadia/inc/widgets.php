<?php
/**
 * nadia widgets
 *
 * @package nadia
 * @since nadia 1.0
 */

/* Custom Tags Widget
=================================================================================================== */
class dph_tagcl_wg extends WP_Widget { function dph_tagcl_wg(){

$widget_ops = array('classname' => 'dph_tagcl_wg', 'description' => __( "Display a cloud list of tags. Exclude and Include options.",'nadia') ); $this->WP_Widget('dph_tagcl_wg', __('Tag Cloud w/Options - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$tags_include = apply_filters('tags_include', $instance['tags_include']);
$tags_exclude = apply_filters('tags_exclude', $instance['tags_exclude']);
$tags_number = apply_filters('tags_number', $instance['tags_number']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

  <?php $args = array(
    'smallest'                  => 8, 
    'largest'                   => 12,
    'unit'                      => 'pt', 
    'number'                    => ''.$tags_number.'',  
    'format'                    => 'list',
    'orderby'                   => 'name', 
    'order'                     => 'ASC',
    'exclude'                   => ''.$tags_exclude.'', 
    'include'                   => ''.$tags_include.'', 
    'link'                      => 'view', 
    'taxonomy'                  => 'post_tag', 
    'echo'                      => true
);

  wp_tag_cloud( $args ); ?> 

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['tags_include'] = strip_tags($new_instance['tags_include']);
$instance['tags_exclude'] = strip_tags($new_instance['tags_exclude']);
$instance['tags_number'] = strip_tags($new_instance['tags_number']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$tags_include = isset( $instance['tags_include'] ) ? $instance['tags_include'] : '';
$tags_exclude = isset( $instance['tags_exclude'] ) ? $instance['tags_exclude'] : '';
$tags_number = isset( $instance['tags_number'] ) ? absint( $instance['tags_number'] ) : '18';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
  <label style="display:block;" for="<?php echo $this->get_field_id('tags_include'); ?>"><strong>Include (Optional)</strong></label>
  <small>Comma separated list of tags IDs to only show those (Eg: 8,16,21).</small>
  <input class="widefat" id="<?php echo $this->get_field_id('tags_include' , 'nadia'); ?>" name="<?php echo $this->get_field_name('tags_include' , 'nadia'); ?>" type="text" value="<?php echo esc_attr( $tags_include ); ?>" />
</p>

<p>
  <label style="display:block;" for="<?php echo $this->get_field_id('tags_exclude'); ?>"><strong>Exclude (Optional)</strong></label>  <small>Comma separated list of tags IDs to exclude. (Eg: 12,33). (Include must be empty).</small>
  <input class="widefat" id="<?php echo $this->get_field_id('tags_exclude' , 'nadia'); ?>" name="<?php echo $this->get_field_name('tags_exclude' , 'nadia'); ?>" type="text" value="<?php echo esc_attr( $tags_exclude ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('tags_number'); ?>">How many tags to show (0 = Display all tags)</label> 
  <input id="<?php echo $this->get_field_id('tags_number' , 'nadia'); ?>" name="<?php echo $this->get_field_name('tags_number' , 'nadia'); ?>" type="number" min="0" max="50" value="<?php echo esc_attr( $tags_number ); ?>" />
</p>

<?php } }

function dph_tagcl_wgInit() { register_widget('dph_tagcl_wg'); }  
add_action('widgets_init', 'dph_tagcl_wgInit');


/* Custom Categories Widget
=================================================================================================== */
class dph_categories_wg extends WP_Widget { function dph_categories_wg(){

$widget_ops = array('classname' => 'dph_categories_wg', 'description' => __( "Display a list of categories. Exclude and Include options.",'nadia') ); $this->WP_Widget('dph_categories_wg', __('List Categories w/Options - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$cats_include = apply_filters('cats_include', $instance['cats_include']);
$cats_exclude = apply_filters('cats_exclude', $instance['cats_exclude']);
$cats_number = apply_filters('cats_number', $instance['cats_number']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

  <?php $args = array(
  'exclude'            => ''.$cats_exclude.'',
  'include'            => ''.$cats_include.'',
  'hierarchical'       => 1,
  'title_li'           => '',
  'show_option_none'   => 'Null',
  'number'             => ''.$cats_number.'',
  'echo'               => 1,
  'depth'              => 0,
  'current_category'   => 0,
  'pad_counts'         => 0,
  'taxonomy'           => 'category',
  'walker'             => null
);

  wp_list_categories( $args ); ?> 

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['cats_include'] = strip_tags($new_instance['cats_include']);
$instance['cats_exclude'] = strip_tags($new_instance['cats_exclude']);
$instance['cats_number'] = strip_tags($new_instance['cats_number']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$cats_include = isset( $instance['cats_include'] ) ? $instance['cats_include'] : '';
$cats_exclude = isset( $instance['cats_exclude'] ) ? $instance['cats_exclude'] : '';
$cats_number = isset( $instance['cats_number'] ) ? absint( $instance['cats_number'] ) : '0';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
  <label style="display:block;" for="<?php echo $this->get_field_id('cats_include'); ?>"><strong>Include (Optional)</strong></label>
  <small>Comma separated list of category IDs to only show those (Eg: 8,16,21).</small>
  <input class="widefat" id="<?php echo $this->get_field_id('cats_include' , 'nadia'); ?>" name="<?php echo $this->get_field_name('cats_include' , 'nadia'); ?>" type="text" value="<?php echo esc_attr( $cats_include ); ?>" />
</p>

<p>
  <label style="display:block;" for="<?php echo $this->get_field_id('cats_exclude'); ?>"><strong>Exclude (Optional)</strong></label>  <small>Comma separated list of category IDs to exclude. (Eg: 12,33). (Include must be empty).</small>
  <input class="widefat" id="<?php echo $this->get_field_id('cats_exclude' , 'nadia'); ?>" name="<?php echo $this->get_field_name('cats_exclude' , 'nadia'); ?>" type="text" value="<?php echo esc_attr( $cats_exclude ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('cats_number'); ?>">How many categories to show (0 = Display all categories)</label> 
  <input id="<?php echo $this->get_field_id('cats_number' , 'nadia'); ?>" name="<?php echo $this->get_field_name('cats_number' , 'nadia'); ?>" type="number" min="0" max="50" value="<?php echo esc_attr( $cats_number ); ?>" />
</p>

<?php } }

function dph_categories_wgInit() { register_widget('dph_categories_wg'); }  
add_action('widgets_init', 'dph_categories_wgInit');


/* Custom Tag Cloud Widget
=================================================================================================== */	

 add_filter('widget_tag_cloud_args', 'wp_tag_cloud_custom');
 function wp_tag_cloud_custom($args) {
 	  $args = array( 'smallest' => 8, 'largest' => 12, 'format' => 'list' );
 	  return $args; }


/* Social Icons Widget
=================================================================================================== */
class social_icons_wg extends WP_Widget { function social_icons_wg(){

$widget_ops = array('classname' => 'widget_social_icons', 'description' => __( "Display Social Icons",'nadia') ); $this->WP_Widget('social_icons_wg', __('Social Icons - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>


  <?php dph_icons(); ?>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<?php } }

function social_icons_wgInit() { register_widget('social_icons_wg'); }  
add_action('widgets_init', 'social_icons_wgInit');

/* List Authors Widgets
=================================================================================================== */
class list_authors_wg extends WP_Widget { function list_authors_wg(){

$widget_ops = array('classname' => 'widget_list_authors_dph', 'description' => __( "List Blog Editors with Avatar",'nadia') ); $this->WP_Widget('list_authors_wg', __('List Authors - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

<?php function contributors() {
global $wpdb;
$authors = array();
$levels = array('administrator', 'editor', 'author');
foreach ($levels as $level) :
  $users_query = new WP_User_Query( array( 
    'fields' => 'all_with_meta', 
    'role' => $level, 
    'orderby' => 'display_name'
    ) );
  $list = $users_query->get_results();
  if ($list) $authors = array_merge($authors, $list);
endforeach;
foreach($authors as $author) {
echo "<li class=\"tooltip_init\"><a data-toggle=\"tooltip\" data-placement=\"top\" title=\"". get_the_author_meta('display_name', $author->ID)
 ."\" href=\"".get_bloginfo('url')."/?author=". $author->ID ."\">". get_avatar($author->ID, 90) ."</a></li>";
}
} ;?>

  <ul class="list-editors"><?php contributors(); ?></ul>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<?php } }

function list_authors_wgInit() { register_widget('list_authors_wg'); }  
add_action('widgets_init', 'list_authors_wgInit');

/* Post from Category
=================================================================================================== */
class CatPostsnn extends WP_Widget { function CatPostsnn(){

$widget_ops = array('classname' => 'widget_category_postsnn', 'description' => __( "Display recent posts from category", 'nadia') ); $this->WP_Widget('CatPostsnn', __('Category Posts - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$postnumb = apply_filters('widget_postnumb', $instance['postnumb']);
$nn_cat = apply_filters('widget_nn_cat', $instance['nn_cat']);

$args = array(
  'ignore_sticky_posts' => 1,
  'posts_per_page' => $postnumb,
  'cat' => $nn_cat
  ); 
?>
        
<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>
<div class="flexslider flexi">
  <ul class="slides">

<?php $wp_posts = new WP_Query($args); 
  if ($wp_posts->have_posts()): while ($wp_posts->have_posts()): $wp_posts->the_post();
?>
<li>

    <div class="ami">
      <?php nn_data_over(false, true, true, "30") ?>
      <?php if ( has_post_thumbnail() ) { the_post_thumbnail('n-squarew'); } else { def_img(); } ?>
      <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'daphne' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    </div>

</li>
  <?php endwhile; endif; wp_reset_postdata(); ?>
 </ul>
 </div>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['postnumb'] = strip_tags($new_instance['postnumb']);
$instance['nn_cat'] = strip_tags($new_instance['nn_cat']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$postnumb = isset( $instance['postnumb'] ) ? $instance['postnumb'] : '3';
$nn_cat = isset( $instance['nn_cat'] ) ? $instance['nn_cat'] : false;
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e("Category:", 'nadia'); ?></label> 
<br />
      <?php 
          $category_args = array(
            'show_count' => 1,
            'hide_empty' => 0,
            'id' => $this->get_field_id('nn_cat'),
            'class' => 'widefat',
            'name' => $this->get_field_name('nn_cat'),
            'selected' => $nn_cat ? $nn_cat : false,
          );
          wp_dropdown_categories($category_args);
        ?>
</p>
<p>
<label for="<?php echo $this->get_field_id('postnumb'); ?>"><?php _e("Number of posts:", 'nadia'); ?></label> 
<input width="20" style="width:20%;" id="<?php echo $this->get_field_id('postnumb'); ?>" name="<?php echo $this->get_field_name('postnumb'); ?>" type="number" min="0" max="10" value="<?php echo esc_attr( $postnumb ); ?>" />
</p>
<p>

<input type="hidden" id="sideFeature-Submit" name="sideFeature-Submit" value="1" />

</p>

<?php } }

function CatPostsnnInit() { register_widget('CatPostsnn'); }  
add_action('widgets_init', 'CatPostsnnInit');



/* Single Widget Ad (300x300)
=================================================================================================== */
class ad_medium_wg extends WP_Widget { function ad_medium_wg(){

$widget_ops = array('classname' => 'ad_medium_wg', 'description' => __( "Display your Ads.",'nadia') ); $this->WP_Widget('ad_medium_wg', __('Widget Single Ad - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

  <a href="<?php echo of_get_option('ad_medium_link', 'no entry'); ?>"><img src="<?php echo of_get_option('ad_medium_uploader', 'no entry'); ?>" class="img-responsive" alt="Header Banner" /></a>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<?php } }

function ad_medium_wgInit() { register_widget('ad_medium_wg'); }  
add_action('widgets_init', 'ad_medium_wgInit');


/* Widget Ads (150x150)
=================================================================================================== */
class ad_square_wg extends WP_Widget { function ad_square_wg(){

$widget_ops = array('classname' => 'ad_square_wg', 'description' => __( "Display your Ads.",'nadia') ); $this->WP_Widget('ad_square_wg', __('Widget Ads (125x125) - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

  <ul class="ad_square">

  <li><a href="<?php echo of_get_option('ad_square_link_1', 'no entry'); ?>"><img src="<?php echo of_get_option('ad_square_uploader_1', 'no entry'); ?>" alt="Square Ad" /></a>
  </li>

  <li><a href="<?php echo of_get_option('ad_square_link_2', 'no entry'); ?>"><img src="<?php echo of_get_option('ad_square_uploader_2', 'no entry'); ?>" alt="Square Ad" /></a>
  </li>

  <li><a href="<?php echo of_get_option('ad_square_link_3', 'no entry'); ?>"><img src="<?php echo of_get_option('ad_square_uploader_3', 'no entry'); ?>" alt="Square Ad" /></a>
  </li>

  <li><a href="<?php echo of_get_option('ad_square_link_4', 'no entry'); ?>"><img src="<?php echo of_get_option('ad_square_uploader_4', 'no entry'); ?>" alt="Square Ad" /></a>
  </li>

  </ul>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<?php } }

function ad_square_wgInit() { register_widget('ad_square_wg'); }  
add_action('widgets_init', 'ad_square_wgInit');


/* Facebook Like Box widget
=================================================================================================== */
class FacebookWG extends WP_Widget { function FacebookWG(){

$widget_ops = array('classname' => 'widget_facebook_wg', 'description' => __( "Add a Facebook Like Box",'nadia') ); $this->WP_Widget('FacebookWG', __('Facebook Like Box - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$fburl = apply_filters('fburl', $instance['fburl']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="<?php echo esc_url( $fburl ); ?>" data-width="292" data-height="350" data-show-faces="true" data-stream="true" data-show-border="true" data-header="true"></div>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['fburl'] = strip_tags($new_instance['fburl']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$fburl = isset( $instance['fburl'] ) ? $instance['fburl'] : '';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('fburl'); ?>">Facebook Page URL</label> 
  <input class="widefat" id="<?php echo $this->get_field_id('fburl' , 'nadia'); ?>" name="<?php echo $this->get_field_name('fburl' , 'nadia'); ?>" type="text" value="<?php echo esc_attr( $fburl ); ?>" />
</p>

<?php } }

function FacebookWGInit() { register_widget('FacebookWG'); }  
add_action('widgets_init', 'FacebookWGInit');


/* Recent Comments Widget 
=================================================================================================== */
class RecentComm extends WP_Widget { function RecentComm(){

$widget_ops = array('classname' => 'widget_recent_comm', 'description' => __( "Display recent comments with author gravatar", 'nadia') ); $this->WP_Widget('RecentComm', __('Recent Comments w/Gravatar - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']); 
$commnumb = apply_filters('widget_commnumb', $instance['commnumb']);
?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

              <ul>
<?php $comments = get_comments('status=approve&number='. $commnumb . ''); ?>
<?php foreach ($comments as $comment) { ?>
                <li><a class="author-av" href="<?php echo get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID ?>"><?php echo get_avatar( $comment, '100' ); ?></a>

                  <p class="comment-text"><strong><?php echo strip_tags($comment->comment_author); ?>:</strong> <a href="<?php echo get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID ?>"><?php echo wp_html_excerpt( $comment->comment_content, 65 ); ?>...</a></p>
                </li> 
<?php }  ?>
              </ul>
<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['commnumb'] = strip_tags($new_instance['commnumb']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$commnumb = isset( $instance['commnumb'] ) ? $instance['commnumb'] : '5';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('commnumb'); ?>"><?php _e("Number of comments:", 'nadia'); ?></label> 
<input width="20" style="width:20%;" id="<?php echo $this->get_field_id('commnumb'); ?>" name="<?php echo $this->get_field_name('commnumb'); ?>" type="text" value="<?php echo esc_attr( $commnumb ); ?>" />
</p>
<?php } }

function RecentCommInit() { register_widget('RecentComm'); }  
add_action('widgets_init', 'RecentCommInit');


/* Most Popular Widget 
=================================================================================================== */
class MostPop extends WP_Widget { function MostPop(){

$widget_ops = array('classname' => 'widget_popular_posts', 'description' => __( "Display most popular posts based on comments or views", 'nadia') ); $this->WP_Widget('MostPop', __('Popular Posts - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$postbase = apply_filters('widget_postbase', $instance['postbase']);
$postnumb = apply_filters('widget_postnumb', $instance['postnumb']);

$args = array(
  'ignore_sticky_posts' => 1,
  'posts_per_page' => $postnumb,
  'meta_key' => ('Post Views' == $postbase) ? 'post_views_count' : false,
  'orderby' => ('Post Views' == $postbase) ? 'meta_value_num' : 'comment_count',
  ); 
?>
        
<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

<?php $count = 0;
$wp_posts = new WP_Query($args);
if ($wp_posts->have_posts()): while ($wp_posts->have_posts()): $wp_posts->the_post();
$count++
?>

  	<?php if (1 == $count) : ?>
  	<div class="header-wg hidden-sm hidden-xs <?php if ( 1 == $count ) { echo 'top-post'; } ?>">
  		<?php nn_data_over(true, true, true, "80") ?>
  		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('n-squarew'); } else { def_img(); } ?>
  	</div>
  	<?php endif; ?>

  	<div class="pie-wg">
  		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

  		<div class="entry-meta">
  			<time class="meta-date" datetime="<?php the_time( 'c' ); ?>"><?php the_time('F j, Y'); ?></time>
  			
  			<?php if($postbase == __('Post Comments', 'daphne')) { dph_comments_nb('meta-com'); } 
  				else { 
  					echo '<a class="meta-views" href=" '. get_permalink() .'  "> '. getPostViews(get_the_ID()) .'</a>';
  				} ?>
  				
  		</div>
  	</div>


  <?php endwhile; endif; wp_reset_postdata(); ?>



<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['postbase'] = strip_tags($new_instance['postbase']);
$instance['postnumb'] = strip_tags($new_instance['postnumb']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$postbase= isset( $instance['postbase'] ) ? $instance['postbase'] : '';
$postnumb = isset( $instance['postnumb'] ) ? $instance['postnumb'] : '3';
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('postnumb'); ?>"><?php _e("Number of posts:", 'nadia'); ?></label> 
<input width="20" style="width:20%;" id="<?php echo $this->get_field_id('postnumb'); ?>" name="<?php echo $this->get_field_name('postnumb'); ?>" type="number" min="0" max="10" value="<?php echo esc_attr( $postnumb ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('postbase'); ?>"><?php _e("Based on:", 'nadia'); ?></label> 
<select name="<?php echo $this->get_field_name('postbase'); ?>" id="<?php echo $this->get_field_id('postbase'); ?>" class="widefat">
<?php
$options = array( __('Post Comments', 'nadia'), __('Post Views', 'nadia'));
foreach ($options as $option) {
echo '<option value="' . $option . '" id="ffff"', $postbase == $option ? ' selected="selected"' : '', '>', $option, '</option>';
}
?>

</select>

</p>

<?php } }

function MostPopInit() { register_widget('MostPop'); }  
add_action('widgets_init', 'MostPopInit');



/* Latest Posts Widget 
=================================================================================================== */
class LatestPs extends WP_Widget { function LatestPs(){

$widget_ops = array('classname' => 'widget_latest_ps', 'description' => __( "Display recent posts with thumbnail", 'nadia') ); $this->WP_Widget('LatestPs', __('Latest Posts - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']); 
$postnumb = apply_filters('widget_postnumb', $instance['postnumb']);
$args = array(
    'posts_per_page' => $postnumb,
    'ignore_sticky_posts' => 1,
    );
?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

	<ul>
<?php
$wp_posts = new WP_Query( $args );
if ( $wp_posts->have_posts() ) :
    while ( $wp_posts->have_posts() ) : $wp_posts->the_post();
?>

	<li><?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } else { def_img(); } ?> 
    <div class="li-content"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a> 
      <div class="meta-wg"><time class="time-meta" datetime="<?php the_time( 'c' ); ?>"><?php the_time('F j, Y'); ?></time> <?php dph_comments_nb('comments-meta'); ?></div>
    </div></li> 
	<?php endwhile; endif; wp_reset_postdata(); ?>
</ul>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['postnumb'] = strip_tags($new_instance['postnumb']);
return $new_instance; }
 
function form( $instance ) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$postnumb = isset( $instance['postnumb'] ) ? $instance['postnumb'] : '3';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('postnumb'); ?>"><?php _e("Number of posts:", 'nadia'); ?></label> 
<input width="20" style="width:20%;" id="<?php echo $this->get_field_id('postnumb'); ?>" name="<?php echo $this->get_field_name('postnumb'); ?>" type="text" value="<?php echo esc_attr( $postnumb ); ?>" />
</p>
<?php } }

function LatestPsInit() { register_widget('LatestPs'); }	
add_action('widgets_init', 'LatestPsInit');


/* Video Posts Widget 
=================================================================================================== */
class VideoWG extends WP_Widget { function VideoWG(){

$widget_ops = array('classname' => 'widget_video_wg', 'description' => __( "Add a video widget",'nadia') ); $this->WP_Widget('VideoWG', __('Video - Nadia','nadia'), $widget_ops); }
    
/** Widget Content */
function widget($args, $instance) {
extract( $args );
$title = apply_filters('widget_title', $instance['title']);
$embed = apply_filters('embed', $instance['embed']);
 ?>

<?php echo $before_widget; ?><?php if ($title) { echo $before_title . $title . $after_title;} ?>

	<div class="inside wg-video"><?php echo $embed; ?></div>

<?php echo $after_widget; ?> <?php }

/** WP_Widget Update */
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['embed'] = preg_replace("#<(?!/?iframe[ >])#i","&lt;",$new_instance['embed']);
return $new_instance; }
 
function form($instance) {
$title = isset( $instance['title'] ) ? $instance['title'] : '';
$embed = isset( $instance['embed'] ) ? $instance['embed'] : '';
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','nadia'); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('embed'); ?>">Video Embed Code</label> 
  <input class="widefat" id="<?php echo $this->get_field_id('embed' , 'nadia'); ?>" name="<?php echo $this->get_field_name('embed' , 'nadia'); ?>" type="text" value="<?php echo esc_attr( $embed ); ?>" />
</p>

<?php } }

function VideoWGInit() { register_widget('VideoWG'); }	
add_action('widgets_init', 'VideoWGInit');

// Load Widgets
include_once(get_template_directory() . '/inc/quick-flickr-widget.php');
