<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mega Business
 */
/**
* Hook - mega_business_action_doctype.
*
* @hooked mega_business_doctype -  10
*/
do_action( 'mega_business_action_doctype' );
?>
<head>
<?php
/**
* Hook - mega_business_action_head.
*
* @hooked mega_business_head -  10
*/
do_action( 'mega_business_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - mega_business_action_before.
*
* @hooked mega_business_page_start - 10
*/
do_action( 'mega_business_action_before' );

/**
*
* @hooked mega_business_header_start - 10
*/
do_action( 'mega_business_action_before_header' );

/**
*
*@hooked mega_business_site_branding - 10
*@hooked mega_business_header_end - 15 
*/
do_action('mega_business_action_header');

/**
*
* @hooked mega_business_content_start - 10
*/
do_action( 'mega_business_action_before_content' );

/**
 * Banner start
 * 
 * @hooked mega_business_banner_header - 10
*/
do_action( 'mega_business_banner_header' );  
