<?php 

add_action('init',"wpb_load_file",100);
function wpb_load_file(){
    if (! function_exists( 'Kirki' )) {
        return;
    }
    global $themetype;
    $theme = wp_get_theme(); // gets the current theme
    if ( 'Goldy Silver' == $theme->name || 'Goldy Silver Pro' == $theme->name) {
        global $goldy_silver_themetype;
        $themetype = $goldy_silver_themetype;
        $themetype['plugiformname']='goldy_silver';
    }
    if ( 'Goldy Mex' == $theme->name || 'Goldy Mex Pro' == $theme->name) {
        global $goldy_mex_themetype;
        $themetype = $goldy_mex_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Fly' == $theme->name || 'Goldy Fly Pro' == $theme->name) {
        global $goldy_fly_themetype;
        $themetype = $goldy_fly_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Grocery Market' == $theme->name || 'Goldy Grocery Market Pro' == $theme->name) {
        global $goldy_grocery_market_themetype;
        $themetype = $goldy_grocery_market_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Restaurant' == $theme->name || 'Goldy Restaurant Pro' == $theme->name) {
        global $goldy_restaurant_themetype;
        $themetype = $goldy_restaurant_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Fitness' == $theme->name || 'Goldy Fitness Pro' == $theme->name) {
        global $goldy_fitness_themetype;
        $themetype = $goldy_fitness_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Construction' == $theme->name || 'Goldy Construction Pro' == $theme->name) {
        global $goldy_construction_themetype;
        $themetype = $goldy_construction_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Corporate' == $theme->name || 'Goldy Corporate Pro' == $theme->name) {
        global $goldy_corporate_themetype;
        $themetype = $goldy_corporate_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Business' == $theme->name || 'Goldy Business Pro' == $theme->name) {
        global $goldy_business_themetype;
        $themetype = $goldy_business_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Ekart' == $theme->name || 'Goldy Ekart Pro' == $theme->name) {
        global $goldy_ekart_themetype;
        $themetype = $goldy_ekart_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    include_once( 'customize_option/social_sections.php' );
    include_once( 'customize_option/header.php' );
    include_once( 'customize_option/footer.php' );
    include_once( 'customize_option/global.php' );
    include_once( 'customize_option/sidebar_section.php' );
    include_once( 'customize_option/breadcrumb_section.php' );
    include_once( 'customize_option/featured_slider.php' );
    include_once( 'customize_option/featured_section.php' );
    include_once( 'customize_option/about_section.php' );
    include_once( 'customize_option/our_portfolio.php' );
    include_once( 'customize_option/our_team.php' );
    include_once( 'customize_option/our_testmonial.php' );
    include_once( 'customize_option/our_sponsors.php' );
    include_once( 'customize_option/our_services.php' );
    include_once( 'customize_option/book_an_appoinment.php' );
    include_once( 'customize_option/home_page_ordering.php' );
    include_once( 'customize_option/design.php' );
    include_once( 'customize_option/extras.php' );
}

include_once( 'customize_option/SFT_admin_side.php' );

?>