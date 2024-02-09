<?php
if (!defined('ABSPATH'))
  exit;

function slider_theme_section($atts){
   		ob_start();
	    if(isset($atts['section'])){
	        if ( function_exists( $atts['section'] )){
				call_user_func($atts['section']);
	 		}
	 	}
		$output= ob_get_contents();
        ob_end_clean();
        return $output;
}

add_shortcode('themesection','slider_theme_section');
