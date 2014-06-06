<?php

function options_bg_dph($option, $selectors) {
    if (of_get_option('set_bg', false)) {
        $output = $selectors . '{';

        if ($option['color']) {
            $output .= ' background-color: ' . $option['color'] .';';
            if (!$option['image']) { $output .= ' background-image: none;'; }
        }


        if (of_get_option('bg_overlay', false)) { 
            $overlaybg = 'url(' . get_template_directory_uri() .'/img/overlay_a.png) fixed,';
            $overlayauto = 'auto,';
        }
        else{
            $overlaybg = '';
            $overlayauto = '';
        }

        if ($option['image']) {
            $output .= ' background: ' . $overlaybg .'url(' . $option['image'] .') 50% 50% fixed no-repeat;';
            $output .= ' background-repeat: ' . $option['repeat'] .';';
            $output .= ' background-position: ' . $option['position'] .';';
            $output .= ' background-attachment: ' . $option['attachment'] .';';
        
        if (of_get_option('bg_responsive', false)) {
            $output .= ' -moz-background-size:' . $overlayauto .' cover;';
            $output .= ' -webkit-background-size:' . $overlayauto .' cover;';
            $output .= ' -o-background-size:' . $overlayauto .' cover;';
            $output .= ' background-size:' . $overlayauto .' cover;';
        }

        }

        $output .= '}';
        $output .= "\n";
        return $output;
    }

    else{
        return null;
    }
}



function options_custom_styles() {
    $output = '';
    $input = '';
    
    $output .= options_bg_dph( of_get_option( 'bg_opt' ) , 'body'); //Custom BG
    if ("2c-r-fixed" != of_get_option('layout_dph')) { //Layout Style
        $output .= "#content, .conts {float:right;} #secondary {float:left;}";
        $output .= "\n";
    }
    if (of_get_option('custom_css', false)) {
        $output .= of_get_option('custom_css');
        $output .= "\n";
    }
    if (!empty($output)) {
        $output = "\n<style type=\"text/css\">\n" . $output . "</style>\n";
    }
     echo $output; 
}

add_action('wp_head', 'options_custom_styles');