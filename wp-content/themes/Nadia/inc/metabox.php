<?php
/**
 * @package nadia
 * @since nadia 1.0
 */

add_action( 'add_meta_boxes', 'cd_meta_box_add' ); 
add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts'  );

function cd_meta_box_add(){  
    add_meta_box( 'metabx-dph', __('Post Options - (Nadia Theme)', 'nadia'), 'cd_meta_box_cb', 'post', 'normal', 'high' );
}  

function admin_enqueue_scripts() {
    wp_enqueue_script( 'meta_box', get_template_directory_uri() . '/js/metabox.js', array( 'jquery' ) );
    wp_enqueue_style( 'metabox', get_template_directory_uri() . '/css/metabox.css', array(), '1.1', 'all');
}

function cd_meta_box_cb(){  

global $post;  
    $values = get_post_custom( $post->ID );  
    $check = isset( $values['meta_dph_sidebar'] ) ? esc_attr( $values['meta_dph_sidebar'][0] ) : '';
    $checkfbcomms = isset( $values['meta_dph_fbcomms'] ) ? esc_attr( $values['meta_dph_fbcomms'][0] ) : '';
    $checkf = isset( $values['meta_dph_featured'] ) ? esc_attr( $values['meta_dph_featured'][0] ) : '';
    if ($checkf == 'yes') {
    $selected = isset( $values['meta_dph_select'] ) ? esc_attr( $values['meta_dph_select'][0] ) : '';  
    } 


    $checkreview = isset( $values['meta_dph_review'] ) ? esc_attr( $values['meta_dph_review'][0] ) : '';


    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' ); 
      ?> 
    <p> 
        <input type="checkbox" id="meta_dph_featured" name="meta_dph_featured" <?php checked( $checkf, 'yes' ); ?> />
        <label for="meta_dph_featured"><?php _e('Featured Post','nadia') ?></label>  
    </p>
    <p id="hidese" style="display:none;"> 
        <label for="meta_dph_select"><?php _e('Position','nadia') ?></label>
        <select name="meta_dph_select" id="meta_dph_select"> 
            <option value="slider" <?php if ($checkf == 'yes') selected( $selected, 'slider' ); ?>>Slider</option> 
            <option value="static" <?php if ($checkf == 'yes') selected( $selected, 'static' ); ?>>Featured Block</option> 
        </select> 
    </p>
    <p> 
        <input type="checkbox" id="meta_dph_sidebar" name="meta_dph_sidebar" <?php checked( $check, 'on' ); ?> />  
        <label for="meta_dph_sidebar"><?php _e('Disable Sidebar','nadia') ?></label>  
    </p>
     <p> 
        <input type="checkbox" id="meta_dph_fbcomms" name="meta_dph_fbcomms" <?php checked( $checkfbcomms, 'on' ); ?> />  
        <label for="meta_dph_fbcomms"><?php _e('Facebook Comments','nadia') ?></label>  
    </p>
        <p> 
        <input type="checkbox" id="meta_dph_review" name="meta_dph_review" <?php checked( $checkreview, 'yes' ); ?> />
        <label for="meta_dph_review"><?php _e('Review Post','nadia') ?></label>  
    </p>

    <div id="hidereview" style="display:none;">

    <h3 class='hndle review-title'><span>Review</span></h3>

            <p class="sec-rev"><label class="label-score" for="meta_dph_review_score"><?php _e('Overall Score','nadia') ?></label>
            <input type="number" name="meta_dph_review_score" id="meta_dph_review_score" min="0" max="100" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_score',true) ?>" /></p>

            <p class="sec-rev"><label class="label-tag" for="meta_dph_review_title"><?php _e('Header Title','nadia') ?></label>
            <input type="text" class="input-title" name="meta_dph_review_title" id="meta_dph_review_title" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_title',true) ?>" /></p>


<div class="clearfix"></div>


            <p class="inside"><label class="label-summ" for="meta_dph_review_summ"><?php _e('Review Summary','nadia') ?></label>
            <textarea name="meta_dph_review_summ" id="meta_dph_review_summ" rows="10" cols="40"><?php echo get_post_meta($post->ID, 'meta_dph_review_summ',true) ?></textarea></p>


            

            <h3 class='hndle review-title'><span>Criteria</span></h3>

            <p class="criter"><label class="screen-reader-texft" for="meta_dph_review_criterion_1"><?php _e('Criterion 1','nadia') ?></label>
            <input type="text" name="meta_dph_review_criterion_1" id="meta_dph_review_criterion_1" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_1',true) ?>" />

            <label class="screen-reader-text" for="meta_dph_review_criterion_score_1"><?php _e('Criterion Score 1','nadia') ?></label>
            <input class="input-sc" type="number" name="meta_dph_review_criterion_score_1" id="meta_dph_review_criterion_score_1" min="0" max="100" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_score_1',true) ?>" /></p>

            <p class="criter"><label class="screen-reader-texft" for="meta_dph_review_criterion_2"><?php _e('Criterion 2','nadia') ?></label>
            <input type="text" name="meta_dph_review_criterion_2" id="meta_dph_review_criterion_2" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_2',true) ?>" />

            <label class="screen-reader-text" for="meta_dph_review_criterion_score_1"><?php _e('Criterion Score 2','nadia') ?></label>
            <input class="input-sc" type="number" name="meta_dph_review_criterion_score_2" id="meta_dph_review_criterion_score_2" min="0" max="100" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_score_2',true) ?>" /></p>

            <p class="criter"><label class="screen-reader-texft" for="meta_dph_review_criterion_3"><?php _e('Criterion 3','nadia') ?></label>
            <input type="text" name="meta_dph_review_criterion_3" id="meta_dph_review_criterion_3" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_3',true) ?>" />

            <label class="screen-reader-text" for="meta_dph_review_criterion_score_1"><?php _e('Criterion Score 3','nadia') ?></label>
            <input class="input-sc" type="number" name="meta_dph_review_criterion_score_3" id="meta_dph_review_criterion_score_3" min="0" max="100" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_score_3',true) ?>" /></p>

            <p class="criter"><label class="screen-reader-texft" for="meta_dph_review_criterion_4"><?php _e('Criterion 4','nadia') ?></label>
            <input type="text" name="meta_dph_review_criterion_4" id="meta_dph_review_criterion_4" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_4',true) ?>" />

            <label class="screen-reader-text" for="meta_dph_review_criterion_score_4"><?php _e('Criterion Score 4','nadia') ?></label>
            <input class="input-sc" type="number" name="meta_dph_review_criterion_score_4" id="meta_dph_review_criterion_score_4" min="0" max="100" value="<?php echo get_post_meta($post->ID, 'meta_dph_review_criterion_score_4',true) ?>" /></p>
<div class="clearfix"></div>

    </div> 


    <?php  
} 

add_action( 'save_post', 'cd_meta_box_save' );  
function cd_meta_box_save( $post_id )  
{  
     global $post;  
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 
    if ( !current_user_can( 'edit_post', $post_id ) ) return;  
    $allowed = array(  
        'a' => array(
            'href' => array()
        )  
    );  



   $chk = ( isset( $_POST['meta_dph_sidebar'] ) && $_POST['meta_dph_sidebar'] ) ? 'on' : 'off';
update_post_meta( $post_id, 'meta_dph_sidebar', $chk );

$chkf = ( isset( $_POST['meta_dph_featured'] ) && $_POST['meta_dph_featured'] ) ? 'yes' : 'no';
update_post_meta( $post_id, 'meta_dph_featured', $chkf );

$chkrev = ( isset( $_POST['meta_dph_review'] ) && $_POST['meta_dph_review'] ) ? 'yes' : 'no';
update_post_meta( $post_id, 'meta_dph_review', $chkrev );

$chkfbc = ( isset( $_POST['meta_dph_fbcomms'] ) && $_POST['meta_dph_fbcomms'] ) ? 'on' : 'off';
update_post_meta( $post_id, 'meta_dph_fbcomms', $chkfbc );


    if($chkf == 'yes' and isset( $_POST['meta_dph_select'] ) ) {
        update_post_meta( $post_id, 'meta_dph_select', esc_attr( $_POST['meta_dph_select'] ) );  
   }
   else{
    delete_post_meta( $post_id, 'meta_dph_select', esc_attr( $_POST['meta_dph_select'] ) );  
   }




 $me_fields = array(

        'meta_dph_review_score',
        'meta_dph_review_title',
        'meta_dph_review_summ',
        'meta_dph_review_criterion_1',
        'meta_dph_review_criterion_score_1',
        'meta_dph_review_criterion_2',
        'meta_dph_review_criterion_score_2',
        'meta_dph_review_criterion_3',
        'meta_dph_review_criterion_score_3',
        'meta_dph_review_criterion_4',
        'meta_dph_review_criterion_score_4'

    );


 foreach ($me_fields as $me_item) {

        if ( isset($_POST[$me_item]) && !empty($_POST[$me_item]) ) {

            update_post_meta($post_id, $me_item, wp_kses( $_POST[$me_item], $allowed ) );

        }

    

   if('yes' == $chkrev) {
        update_post_meta( $post_id, $me_item, esc_attr( $_POST[$me_item] ) );
   }
   else{
    delete_post_meta( $post_id, $me_item, esc_attr( $_POST[$me_item] ) );
   }

}




} 