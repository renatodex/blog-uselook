<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>
    <!-- ============================= Media Posts Container -->
    <div id="media-panel" class="container slide-panel">

        <div class="row">
            <div class="col-md-12">

                <h3 class="pretitle"><span><?php _e('Gallery & Videos', 'nadia'); ?></span></h3>

        	<!-- ======= Slider -->
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        $args = array(
                            'posts_per_page' => 10,
                            'ignore_sticky_posts' => 1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'post_format',
                                    'field'    => 'slug',
                                    'terms' => array('post-format-gallery', 'post-format-video'),
                                    )
                                )
                            );
                        $wp_posts = new WP_Query( $args );
                        if ( $wp_posts->have_posts() ) :
                            while ( $wp_posts->have_posts() ) : $wp_posts->the_post(); $format = get_post_format();
                        ?>
                        <li>
                            <div class="img-inner">
                                <?php nn_data_over(false, true, true, "80") ?>
                                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('n-squarew'); } else { def_img(); } ?></a>
                            </div>


                            <div class="post-inner">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                <div class="entry-meta">
                                    <time class="meta-date" datetime="<?php the_time( 'c' ); ?>"><?php the_time('F j, Y'); ?></time>
                                    <?php dph_comments_nb('meta-com'); ?>
                                </div>
                            </div>
                        </li>

                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>
                </div>
        <!-- ======= /Slider -->

            </div>
        </div>
    </div>
    <!-- ============================= /Media Posts Container -->