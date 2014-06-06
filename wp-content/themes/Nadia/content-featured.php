<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>
    <!-- ============================= Featured Area Container -->
    <div id="featured-nn" class="container">
        <div class="row">

        	<!-- ======= Slider -->
            <div id="slider-nn" class="col-md-6">
                <ul class="slides loading">
<?php
$args = array(
    'posts_per_page' => of_get_option('numb_sld', '4'),
    'meta_key' => 'meta_dph_select',
    'meta_value' => 'slider',
    'ignore_sticky_posts' => 1,
    );
$wp_posts = new WP_Query( $args );
if ( $wp_posts->have_posts() ) :
    while ( $wp_posts->have_posts() ) : $wp_posts->the_post();
?>
                    <li>
                        <div class="title-box">
                            <div class="sub-info">
                                <span class="now"><?php _e('Featured Now', 'nadia'); ?></span><?php nn_data_over(true, true, true, '30') ?>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'daphne' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="overlay"></div> <?php if ( has_post_thumbnail() ) { the_post_thumbnail('n-slider'); } else { def_img(); } ?>
                    </li>

<?php endwhile; endif; wp_reset_postdata(); ?>
                </ul>
            </div>
            <!-- ======= Slider -->

            <!-- ======= Blocks-->
            <div id="blocks-nn" class="col-md-6 visible-lg visible-md">
                <div class="row">
<?php
    $args = array(
        'posts_per_page' => '4',
        'meta_key' => 'meta_dph_select',
        'meta_value' => 'static',
        'ignore_sticky_posts' => 1,
        );
    $wp_posts = new WP_Query( $args );
    if ( $wp_posts->have_posts() ) :
        while ( $wp_posts->have_posts() ) : $wp_posts->the_post();
?>

                    <div class="block-inner col-md-6">
                        <?php nn_data_over(true, true, true, "30") ?>
                        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'daphne' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                        <div class="title-box">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        
                        <div class="overlay"></div> <?php if ( has_post_thumbnail() ) { the_post_thumbnail('n-sliderm'); } else { def_img(); } ?>
                        </a>
                    </div>

<?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
            <!-- ======= Blocks-->

        </div>
    </div>