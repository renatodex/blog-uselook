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

                        <h3 class="pretitle"><span><?php
                            if ( is_category() ) {
                                printf( __( 'Category Archives: %s', 'nadia' ), '<span>' . single_cat_title( '', false ) . '</span>' );

                            } elseif ( is_tag() ) {
                                printf( __( 'Tag Archives: %s', 'nadia' ), '<span>' . single_tag_title( '', false ) . '</span>' );

                            } elseif ( is_author() ) {
                                /* Queue the first post, that way we know
                                 * what author we're dealing with (if that is the case).
                                */
                                the_post();
                                printf( __( 'Author Archives: %s', 'nadia' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                                /* Since we called the_post() above, we need to
                                 * rewind the loop back to the beginning that way
                                 * we can run the loop properly, in full.
                                 */
                                rewind_posts();

                            } elseif ( is_day() ) {
                                printf( __( 'Daily Archives: %s', 'nadia' ), '<span>' . get_the_date() . '</span>' );

                            } elseif ( is_month() ) {
                                printf( __( 'Monthly Archives: %s', 'nadia' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

                            } elseif ( is_year() ) {
                                printf( __( 'Yearly Archives: %s', 'nadia' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

                            } else {
                                _e( 'Archives', 'nadia' );

                            }
                        ?></span></h3>

                        <!-- ============================= Posts -->

                        <div class="row js-masonry">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
