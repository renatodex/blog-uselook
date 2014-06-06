<?php
/**
 * The template for comments.
 * @package nadia
 * @since nadia 1.0
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="pretitle"><span><?php comments_number('0', '1', '%'); ?> <?php _e('Comments on this post', 'nadia'); ?></span></h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'nadia' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'nadia' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'nadia' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use nadia_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define nadia_comment() and that will be used instead.
				 * See nadia_comment() in functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'nadia_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'nadia' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'nadia' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'nadia' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'nadia' ); ?></p>
	<?php endif; ?>

	
	<?php $commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

	$comment_args = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
	    'author' => '<p class="comment-form-author inputcom">' .
	                '<label for="author">' . __( 'Name', 'nadia' ) . '</label> ' .
	                ( $req ? '<span class="required">*</span>' : '' ) .
	                '<input id="author" name="author" type="text" value="' .
	                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
	                '</p>',
	                
	    'email'  => '<p class="comment-form-email inputcom">' .
	                '<label for="email">' . __( 'E-Mail', 'nadia' ) . '</label> ' .
	                ( $req ? '<span class="required">*</span>' : '' ) .
	                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' .
			'</p>',
			
	    'url'    => '<p class="comment-form-url inputcom">'. 
	    			'<label for="url">' . __( 'Web', 'nadia' ) . '</label> ' .
	    			        '<input id="url" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ) .
	    			        '" size="30"  tabindex="3" /></p>', ) ),
	    'comment_field' => '<p class="comment-form-comment">' .
	                '<label for="comment">' . __( 'Comment', 'nadia') . '</label>' .
	                '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
	                '</p>',
	    'comment_notes_after' => '',
	);

	comment_form($comment_args); ?>

</div><!-- #comments .comments-area -->
