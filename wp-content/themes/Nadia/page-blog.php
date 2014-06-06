<?php
/**
 * @package nadia
 * @since nadia 1.0
 * Template Name: Blog
 */
get_header();

?>

    <div class="container">
        <div class="row">

            <!-- ============================= Content -->
            <div class="col-md-8 col-lg-9">
                <div class="row">

                    <div id="content" class="col-md-12">

                        <!-- ============================= Posts -->

                        <div class="row blog-content">

                            <?php 
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array('posts_per_page' => 0, 'paged' => $paged); 

                            query_posts($args); if (have_posts()) : while (have_posts()) : the_post(); ?>

                                <div class="col-12 col-lg-12 extract">

                                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                        <div class="featured-media">
                                            <?php if ( has_post_thumbnail() ) {
                                            dph_category_style('single'); the_post_thumbnail('n-blog');
                                            } ?>
                                        </div>

                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'nadia' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <?php echo wp_trim_words( get_the_excerpt(), 53); ?>
                                            <div class="entry-meta">
                                                <time class="meta-date" datetime="<?php the_time( 'c' ); ?>"><?php the_time('F j, Y'); ?></time>
                                                <?php dph_comments_nb('meta-com'); ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; endif; ?>
                        </div>

                        <!-- ============================= /Posts -->

                         <?php if( of_get_option('numbered_pag', false) ) { nadia_numbered_nav(); } else{ nadia_content_nav(); } wp_reset_query(); ?>

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
