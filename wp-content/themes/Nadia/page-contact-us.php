<?php
/*
Template Name: Contact
*/

  //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = __('Human verification incorrect', 'nadia');
  $missing_content = __('Please supply all information', 'nadia');
  $email_invalid   = __('Email Address Invalid', 'nadia');
  $message_unsent  = __('Message was not sent', 'nadia');
  $message_sent    = __('Thanks! Your message has been sent', 'nadia');

  //user posted variables
  $name = isset($_POST['message_name']) ? $_POST['message_name'] : null;
  $email = isset($_POST['message_email']) ? $_POST['message_email'] : null;
  $message = isset($_POST['message_text']) ? $_POST['message_text'] : null;
  $human = isset($_POST['message_human']) ? $_POST['message_human'] : null;

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }


  else if (isset($_POST['submitted']))my_contact_form_generate_response("error", $missing_content);

?>

<?php get_header(); ?>

<div class="container">
  <div class="row">

    <div id="content" class="col-md-8 col-lg-9 page-content">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="featured-media wg-video">
          <?php if ( has_post_thumbnail() && !has_post_format() ) {
              the_post_thumbnail('');
            } ?>
          </div>

          <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
          </header>


          <div class="entry-content"> 
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'nadia' ), 'after' => '</div>' ) ); ?>
            <?php edit_post_link( __( 'Edit', 'nadia' ), '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-content -->

          <div class="contact-form">
                  <?php echo $response; ?>
                  <form action="<?php the_permalink(); ?>" method="post">
                      <p class="contact_name inputcom">
                      <label for="name"><?php _e('Name', 'nadia'); ?>:</label> <span class="required">*</span>
                      <input type="text" name="message_name" value="<?php echo esc_attr($name); ?>">
                      </p>
                      <p class="contact_email inputcom">
                      <label for="message_email"><?php _e('Email', 'nadia'); ?>:</label> <span class="required">*</span>
                      <input type="text" name="message_email" value="<?php echo esc_attr($email); ?>">
                    </p>
                      <p class="textarea-p"><label for="message_text"><?php _e('Message', 'nadia'); ?>:</label> <span class="required">*</span> <textarea type="text" name="message_text"><?php echo esc_attr($message); ?></textarea>
                      </p>
                      <p><label for="message_human"><?php _e('Human Verification', 'nadia'); ?>:</label> <span class="required">*</span> <br />
                      <input class="human-verify" type="text" style="width: 60px;" name="message_human">
                      <span class="verify">+ 3 = 5</span>
                      </p>

                      <input type="hidden" name="submitted" value="1">
                      <p class="form-submit"><input id="submit" value="<?php _e('Submit', 'nadia'); ?>" type="submit"></p>
                  </form>
                  </div>
                  
        </article><!-- #post-<?php the_ID(); ?> -->
      <?php endwhile; endif; wp_reset_query(); ?> 
    
    </div>

    <?php get_sidebar(); ?>

  </div> <!-- /.row -->
</div> <!-- /#wrap -->
<?php get_footer(); ?>