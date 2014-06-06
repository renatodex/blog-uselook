<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
get_header(); 

if (function_exists('nn_get_panels')) {
 nn_get_panels('home_top');
}

?>


    <div class="container">
        <div class="row">

            <!-- ============================= Content -->
            <div class="col-md-8 col-lg-9 conts">
                <div class="row">

                    <div id="content" class="col-md-12 home-content">

                        <h3 class="pretitle"><span><?php _e('Latest News', 'nadia'); ?></span></h3>

                        <!-- ============================= Posts -->

                        <div class="row js-masonry">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="col-6 col-sm-6 col-lg-4 extract">
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

if (function_exists('nn_get_panels')) {
 nn_get_panels('home_bottom');
}

get_footer(); 

?>
