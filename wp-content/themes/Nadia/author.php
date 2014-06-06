<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
get_header();
?>

    <div class="container">
        <div class="row">

            <!-- ============================= Content -->
            <div class="col-md-8 col-lg-9">
                <div class="row">

                    <div id="content" class="col-md-12 archive-content">
                        <?php the_post(); ?>
                        <div class="author-cc">
                            <div class="profpic">
                                <?php echo get_avatar( get_the_author_meta('ID'), 70 ); ?>
                            </div>

                            <div class="celfl">
                                <h4><?php the_author(); ?></h4>
                                <span class="mini-author"><?php _e('has published', 'nadia'); ?> <?php the_author_posts(); ?> <?php _e('posts', 'nadia'); ?></span>
                                <div class="minicons">
                                    <?php $user_id = get_the_author_meta('ID');
                                    $twitter = get_user_meta ($user_id, 'twitter', true); if ($twitter) { echo "<a class=\"twitter\" href=\"http://twitter.com/$twitter\"></a>"; } ?>
                                    <?php $facebook = get_user_meta ($user_id, 'facebook', true); if ($facebook) { echo "<a class=\"facebook\" href=\"http://facebook.com/$facebook\"></a>"; } ?>
                                    <?php $gplus = get_user_meta ($user_id, 'gplus', true); if ($gplus) { echo "<a class=\"gplus\" href=\"http://plus.google.com/$gplus\"></a>"; } ?>
                                </div>
                                <p><?php the_author_meta('description'); ?></p>
                            </div>
                        </div>

                        <h3 class="pretitle"><span><?php printf( __( 'Author Archives: %s', 'nadia' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></span></h3>

                        <!-- ============================= Posts -->

                        <div class="row js-masonry">
                            <?php rewind_posts(); if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="col-6 col-sm-6 col-lg-6 extract">
                                    <?php get_template_part( 'content' ); ?>
                                </div>
                            <?php endwhile; endif; wp_reset_query(); ?>
                        </div>

                        <!-- ============================= /Posts -->

                        <?php if( of_get_option('numbered_pag', false) ) { nadia_numbered_nav(); } else{ nadia_content_nav(); } ?>

                    </div>

                </div>
            </div> 
            <!-- ============================= /Content -->


            <?php get_sidebar(); ?> 


        </div>
    </div>


<?php
get_footer(); 
?>