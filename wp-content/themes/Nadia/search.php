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

                        <h3 class="pretitle"><span><?php printf( __( 'Search Results for: %s', 'nadia' ), '<span>' . get_search_query() . '</span>' ); ?></span></h3>

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
