<?php
/**
 * @package nadia
 * @since nadia 1.0
 */
?>

    <!-- ============================= Footer Container -->
    <div class="container-full">
    <div id="footer">

        <div class="container">
            <div class="row nav-lines">
                <div class="col-md-12">
                <nav class="btm-nav"> 
                    <?php wp_nav_menu( array('container' => false, 'theme_location' => 'footer-menu', 'menu_class' => 'sf-menu',  'after' => ' ', ) ); ?>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php get_template_part( 'sidebar-footer' ); ?>
            </div>
        </div>



    </div>
    </div>
    <!-- ============================= /Footer Container -->

</div>

 <!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/excanvas.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<?php if(of_get_option('ga_code', false)); echo of_get_option('ga_code', false); ?>

<?php wp_footer(); ?>
</body> 
</html>