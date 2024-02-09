<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mega Business
 */

/**
 *
 * @hooked mega_business_footer_start
 */
do_action( 'mega_business_action_before_footer' );

/**
 * Hooked - mega_business_footer_top_section -10
 * Hooked - mega_business_footer_section -20
 */
do_action( 'mega_business_action_footer' );

/**
 * Hooked - mega_business_footer_end. 
 */
do_action( 'mega_business_action_after_footer' );

wp_footer(); ?>

</body>  
</html>