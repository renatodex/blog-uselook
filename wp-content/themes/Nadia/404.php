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
            <div class="col-md-12">

                    <div id="content" class="archive-content">

                        <h3 class="pretitle"><span><?php _e( 'Oops! That page can&rsquo;t be found.', 'nadia' ); ?></span></h3>

                        <!-- ============================= Posts -->

                        <p class="alert alert-warning"><?php _e( 'It looks like nothing was found at this location. Maybe try with a search?', 'nadia' ); ?></p>

                        <div class="wave"></div>
                        <form class="form-search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                        <div class="input-append">
                         <input type="text" name="s" id="s" class="field span3 search-query">
                         <button type="submit" name="submit" id="searchsubmit" class="btn btn-danger">Search</button>
                        </div>
                        </form>
                        <div class="wave"></div>

                        <!-- ============================= /Posts -->

                    </div>

            </div> 
            <!-- ============================= /Content -->


        </div>
    </div>


<?php
get_footer(); 
?>