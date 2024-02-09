<?php
/**
 * goldy-business functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package goldy-business
 */

// include_once( 'inc/kirki/kirki.php' );

if ( ! defined( '_GOLDY_BUSINESS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_GOLDY_BUSINESS_VERSION', '1.0.0' );
}

function goldy_business_main_js() {
   wp_enqueue_script( 'business-main-js', get_theme_file_uri( '/assets/js/goldy-business-owl-slider.js' ), array(), '1.0', true );

    // Localize the script with new data and pass php variables to JS.
   $business_js_data = array(
      'goldy_mex_testimonial_autoplay' => esc_attr(get_theme_mod('goldy_mex_our_testimonial_slider_autoplay', 'true')),
      'goldy_mex_testimonial_autoplayspped' => esc_attr(get_theme_mod('goldy_mex_our_testimonial_slider_autoplay_speed','1000')),
      'goldy_mex_testimonial_autoplaytime' => esc_attr(get_theme_mod('goldy_mex_our_testimonial_autoplay_timeout','5000')),
   );
   wp_localize_script( 'business-main-js', 'business_main_vars', $business_js_data );
}
add_action( 'wp_enqueue_scripts', 'goldy_business_main_js' );

function goldy_business_wpdocs_setup_theme() {
   add_theme_support( 'title-tag' );
   add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'goldy_business_wpdocs_setup_theme' );

add_action( 'wp_head', 'goldy_business_customize_css');
function goldy_business_customize_css() {
	?>
	<style type="text/css">
		<?php
		if(get_theme_mod('goldy_business_pricing_plan_background_image')){ ?>
			.business_pricing_plan_section {			
	    		background:url(<?php echo  esc_attr(get_theme_mod('goldy_business_pricing_plan_background_image'));?>) rgb(0 0 0 / 0.75) !important;
	    		background-blend-mode: multiply;
			}
			<?php
	   }
	   if(get_theme_mod('goldy_business_class_schedule_background_image')){ ?>
			.business_class_schedule_section {			
	    		background:url(<?php echo  esc_attr(get_theme_mod('goldy_business_class_schedule_background_image'));?>) rgb(0 0 0 / 0.75) !important;
	    		background-blend-mode: multiply;
			}
			<?php
	   }
	   ?>
	</style>
	<?php
	if(get_theme_mod('goldy_mex_container_page_layout','content_boxed') == 'content_boxed'){
    	?>
		<style>	
    	.pricing_plan_section_info, .about_data, .appointment_fields_data, .goldy_business_widget_inner_data {
		    max-width: <?php echo esc_attr(get_theme_mod('goldy_mex_container_width','1100')); ?>px;
		    margin-left: auto;
		    margin-right: auto;
		}
		</style>
		<?php
   }
}

/**
 * Customizer additions.
 */

require get_stylesheet_directory() . '/inc/goldy-about.php';
require get_stylesheet_directory() . '/inc/goldy-business-pricing-plan.php';

if ( ! function_exists( 'goldy_mex_business_pricing_plan_section' ) ) :
	function goldy_mex_business_pricing_plan_section( $selector = 'header' ) {
		get_template_part( 'inc/theme_option/goldy_pricing_plan' );
	}
endif;

function goldy_business_customizer_css() {
   wp_enqueue_style( 'goldy-business-customize-controls-style', get_stylesheet_directory_uri() . '/assets/css/goldy-business-customizer-admin.css' );
}
add_action( 'admin_enqueue_scripts', 'goldy_business_customizer_css',0 );

add_action("init","goldy_business_theme_limit_set",11);
function goldy_business_theme_limit_set(){
	global $goldy_business_themetype, $goldy_mex_themetype;

	if (is_plugin_active('slivery-extender/slivery-extender.php')) {

		// Breadcrumb Section
		new \Kirki\Field\Color(
			[
				'settings'    => 'silvary_breadcrumb_content_bg_color',
				'label'       => __( 'Content Background Color', 'goldy-business' ),
				'section'     => 'breadcrumb_section',
				'default'     => 'rgba(255 255 255/16%)',
				'priority'	  => 30,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.breadcrumb-content',
						'property' => 'background-color',
					),
				),
			]
		);

		// social icon
		new \Kirki\Field\Color(
			[
				'settings' => 'goldy_contact_icon_color',
				'label'       => __( 'Icon Color', 'goldy-business' ),
	        	'section'     => 'contact_section',
	        	'default'     => '#ff6a3e',
	        	'priority' => 20,
	        	'choices'     => [
	            'alpha' => true,
	        	],
	        'output' => array(
	            array(
	               'element'  => '.opening_icon i, .header_top_bar i',
	               'property' => 'color',
	               'suffix'	  => '!important'
	            ),
		      ),
			]
		);

		new \Kirki\Field\Color(
			[
				'settings' => 'goldy_contact_icon_bg_color',
				'label'       => __( 'Icon Background Color', 'goldy-business' ),
	        	'section'     => 'contact_section',
	        	'default'     => '#ffffff',
	        	'priority' => 25,
	        	'choices'     => [
	            'alpha' => true,
	        	],
	        'output' => array(
	            array(
	               'element'  => '.header_top_bar i',
	               'property' => 'background',
	               'suffix'	  => '!important'
	            ),
		      ),
			]
		);

		new \Kirki\Field\Color(
			[
				'settings' => 'goldy_contact_mob_text_color',
				'label'       => __( 'Desktop Text Color', 'goldy-business' ),
	        	'section'     => 'contact_section',
	        	'default'     => '#ffffff',
	        	'priority' => 30,
	        	'choices'     => [
	            'alpha' => true,
	        	],
	        'output' => array(
	            array(
	               'element'  => '.opening_info p, .contact_info p, .email_info p',
	               'property' => 'color',
	               // 'suffix'	  => '!important'
	            ),
		      ),
			]
		);

		new \Kirki\Field\Color(
			[
				'settings' => 'goldy_contact_desc_text_color',
				'label'       => __( 'Mobile Text Color', 'goldy-business' ),
	        	'section'     => 'contact_section',
	        	'default'     => '#ffffff',
	        	'priority' => 35,
	        	'choices'     => [
	            'alpha' => true,
	        	],
	        'output' => array(
	            array(
	            	'media_query' => '@media only screen and (max-width: 768px)',
	               'element'  => '.opening_info p, .contact_info p, .email_info p',
	               'property' => 'color',
	               // 'suffix'	  => '!important'
	            ),
		      ),
			]
		);

		
		// our portfolio
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_content_bg_color',
				'label'       => __( 'Content Background Color', 'goldy-business' ),
				'section'     => 'our_portfolio_section',
				'default'     => '#ffffffcc',
				'priority'    => 55,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.our_port_containe',
						'property' => 'background-color',
					),
				),
			]
		);

		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_icon_hover_color',
				'label'       => __( 'Icon Hover Color', 'goldy-business' ),
				'section'     => 'our_portfolio_section',
				'default'     => '#ff0000',
				'priority'    => 80,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.our_portfolio_btn a:hover',
						'property' => 'color',
					),
				),
			]
		);

		// featured section 
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_bg_hover_text_color',
				'label'       => __( 'Contain Text Hover Color', 'goldy-business' ),
				'section'     => 'featured_section',
				'default'     => '#ffffff',
				'priority'    => 70,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.section-featured-wrep:hover',
						'property' => 'color',
						'suffix'	  => '!important',
					),
				),
			]
		);

		// About 
		new \Kirki\Field\Color(
			[
				'settings'    => 'about_section_image_border_color',
				'label'       => __( 'Image Border Color', 'goldy-business' ),
				'section'     => 'about_section',
				'default'     => '#f15344',
				'priority'    => 60,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.about_pic:after',
						'property' => 'background-color',
					),
				),
			]
		);

		// our team 
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_team_container_bg_color',
				'label'       => __( 'Contain Background Color', 'goldy-business' ),
				'section'     => 'our_team_section',
				'default'     => '#ffffff',
				'priority'    => 65,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.our_team_icon_contain:before',
						'property' => 'background-color',
						'suffix'	  => '!important',
					),
				),
			]
		);

		// Our Testimonial
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_img_border_color',
				'label'       => __( 'Image Border Color', 'goldy-business' ),
				'section'     => 'our_testimonial_section',
				'default'     => '#E0E0E0',
				'priority'    => 105,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.testimonials_image .image_testimonials img',
						'property' => 'border-color',
					),
				),
			]
		);

		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_quote_bg_color',
				'label'       => __( 'Quote Background Color', 'goldy-business' ),
				'section'     => 'our_testimonial_section',
				'default'     => '#eeeeee',
				'priority'    => 115,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.our_testimonial_icon i',
						'property' => 'background',
					),
				),
			]
		);

		// our services
		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_business_our_services_contain_text_color',
				'label'       => __( 'Contain Text Color', 'goldy-business' ),
				'section'     => 'our_services_section',
				'default'     => '#404040',
				'priority'    => 145,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.our_services_data',
						'property' => 'color',
					),
				),
			]
		);

		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_business_our_services_data_bg_color',
				'label'       => __( 'Container Background Color', 'goldy-business' ),
				'section'     => 'our_services_section',
				'default'     => '#ff6a3e',
				'priority'    => 150,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.services_inner_data',
						'property' => 'background',
					),
				),
			]
		);

		// Heading Design Section
		new \Kirki\Field\Color(
			[
				'settings'    => 'design_underline_bg_color',
				'label'       => __( 'Heding Background Color', 'goldy-business' ),
				'section'     => 'design_section',
				'default'     => 'rgb(255 106 62 / 13%)',
				// 'default'     => 'rgb(214 214 214 / 42%)',
				'priority'	=> 10,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.heading_main_title h2',
						'property' => 'background-color',
						'suffix' => ' !important',
					),
				),
			]
		);

		new \Kirki\Field\Color(
			[
				'settings'    => 'design_underline_border_color',
				'label'       => __( 'Heding Border Color', 'goldy-business' ),
				'section'     => 'design_section',
				'default'     => '#ff6a3e',
				'priority'	=> 15,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.heading_main_title h2',
						'property' => 'border-color',
						'suffix' => ' !important',
					),
				),
			]
		);
	}else{

		// featured section 
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_bg_hover_text_color',
				'label'       => __( 'Contain Text Hover Color', 'goldy-business' ),
				'section'     => 'featured_section',
				'default'     => '#ffffff',
				'priority'    => 165,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.section-featured-wrep:hover',
						'property' => 'color',
						'suffix'	  => '!important',
					),
				),
			]
		);

		// About 
		new \Kirki\Field\Color(
			[
				'settings'    => 'about_section_image_border_color',
				'label'       => __( 'Image Border Color', 'goldy-business' ),
				'section'     => 'about_section',
				'default'     => '#f15344',
				'priority'    => 60,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.about_pic:after',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	remove_action( 'goldy_header_topbar_loop','goldy_mex_header_topbar_loop',5); 
	remove_action( 'goldy_main_header_loop','goldy_mex_main_header_loop',5); 
	remove_action( 'goldy_our_portfolio_loop', 'goldy_mex_our_portfolio_loop',5 );
	remove_action( 'goldy_featured_section_loop', 'goldy_mex_featured_section_loop',5 );
	remove_action( 'goldy_our_testimonial_loop', 'goldy_mex_our_testimonial_loop',5 );
	remove_action( 'goldy_our_team_loop', 'goldy_mex_our_team_loop',5 );
	remove_action( 'goldy_featured_slider_loop', 'goldy_mex_featured_slider_loop',5 );
	remove_action( 'goldy_about_section_data', 'goldy_mex_about_section_data',5 );
	remove_action( 'goldy_book_an_appointment_section_data', 'goldy_mex_book_an_appointment_section_data',5 );
	remove_action( 'goldy_our_services_section_data', 'goldy_mex_our_services_section_data',5 );

	$goldy_business_themetype['themtypeis']='normal';
	if (is_plugin_active('slivery-extender/slivery-extender.php') ) {
		$goldy_business_themetype['pluginactive']="yes";
	}else{
		$goldy_business_themetype['pluginactive']="no";
	}

	$goldy_business_themetype['recommended_plugins_name'] = 'goldy_business';
	$goldy_business_themetype['goldy_documentation_Upsell_Section']= "https://www.inverstheme.com/goldy-business-documentation/";
	$goldy_business_themetype['pro_section_custom_control']= "https://www.inverstheme.com/theme/goldy-business/";
	$goldy_business_themetype['header_top_bar_bg_color']= "#ff6a3e";
	$goldy_business_themetype['header_top_bar_bg_color_element']= ".top_bar_info";
	$goldy_business_themetype['header_text_color']= "#000000";
	$goldy_business_themetype['header_text_color_element']= ".main_site_header, header#masthead p.site-description";
	$goldy_business_themetype['header_bg_color']= "#ffffff";
	$goldy_business_themetype['header_bg_color_element']= ".main_site_header";
	$goldy_business_themetype['mob_nav_menu_activ_color']= "#ff6a3e";
	$goldy_business_themetype['mob_nav_menu_activ_color_element']= "header#masthead.site-header .current-menu-ancestor > a, header#masthead.site-header .current-menu-item > a, header#masthead.site-header .current_page_item > a";
	$goldy_business_themetype['mob_menu_link_color']= "#ffffff";
	$goldy_business_themetype['mob_menu_link_color_element']= ".mobile_menu #primary-menu li a";
	$goldy_business_themetype['container_bg_color']= "#f9f3f2";
	$goldy_business_themetype['container_text_color']= "#000000";
	$goldy_business_themetype['_boxed_layout_bg_color']= "#ffffff";
	$goldy_business_themetype['_content_boxed_bg_color']= "#ffffff";
	$goldy_business_themetype['_sidebar_heading_bg_color']= "#393939";
	$goldy_business_themetype['_sidebar_heading_text_color']= "#ffffff";
	$goldy_business_themetype['mob_sub_menu_bg_color']= "#ff6a3e";
	$goldy_business_themetype['mob_sub_menu_bg_color_element']= ".main-navigation .sub-menu li, .main-navigation ul ul ul.toggled-on li";
	$goldy_business_themetype['link_color']= "#214462";
	$goldy_business_themetype['link_color_element']= ".main_site_header a";
	$goldy_business_themetype['link_hover_color']= "#ff6a3e";
	$goldy_business_themetype['link_hover_color_element']= "#masthead .main_site_header a:hover";
	$goldy_business_themetype['_menu_active_color']= "#ff6a3e";
	$goldy_business_themetype['_menu_active_color_element']= "header#masthead.site-header .current-menu-ancestor > a, header#masthead.site-header .current-menu-item > a, header#masthead.site-header .current_page_item > a, footer#colophon .current-menu-item > a, .current_page_item > a";
	$goldy_business_themetype['desk_submenu_bg_color']= "#ffffff";
	$goldy_business_themetype['desk_submenu_bg_color_element']= ".main-navigation .nav-menu ul.sub-menu, .main-navigation .nav-menu ul.children";
	$goldy_business_themetype['mob_nav_menu_bg_color']= "#214462";
	$goldy_business_themetype['mob_nav_menu_bg_color_element']= ".mobile_menu";
	$goldy_business_themetype['silvery_social_icon_color']= "#ffffff";
	$goldy_business_themetype['silvery_social_icon_color_element']= "header#masthead a.social_icon";
	$goldy_business_themetype['silvery_social_icon_bg_color']= "#ff6a3e";
	$goldy_business_themetype['silvery_social_icon_bg_color_element']= ".social_icon i";
	$goldy_business_themetype['silvery_social_icon_hover_color']= "#c76a1a";
	$goldy_business_themetype['silvery_social_icon_hover_color_element']= "header#masthead a.social_icon:hover";
	$goldy_business_themetype['silvery_social_icon_hover_bg_color']= "#ffffff";
	$goldy_business_themetype['silvery_social_icon_hover_bg_color_element']= ".social_icon i:hover:after";
	$goldy_business_themetype['button_bg_color']= "#ff6a3e";
	$goldy_business_themetype['button_bg_color_element']= 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled';
	$goldy_business_themetype['_button_bg_hover_color']= "#214462";
	$goldy_business_themetype['_button_bg_hover_color_element']= 'button::before, input[type="button"]::before, input[type="reset"]::before, input[type="submit"]::before, input[type="submit"]::after, .wp-block-search .wp-block-search__button::before, .wp-block-search .wp-block-search__button::after, .nav-previous a::before, .nav-previous a::after, .nav-next a::before, .nav-next a::after, .buttons::before, .buttons::after ,.woocommerce a.button::before, .woocommerce button::before, .woocommerce .single-product button::before, .woocommerce button.button.alt::before, .woocommerce a.button.alt::before,.woocommerce button.button.alt.disabled::before';
	$goldy_business_themetype['_button_text_color']= "#ffffff";
	$goldy_business_themetype['_button_text_color_element']= 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled';
	$goldy_business_themetype['_button_texthover_color']= "#ffffff";
	$goldy_business_themetype['_button_texthover_color_element']= 'button:hover, input[type="button"]:hover , input[type="reset"]:hover , input[type="submit"]:hover , .wp-block-search .wp-block-search__button:hover, .nav-previous a:hover, .buttons:hover, .nav-next a:hover, .woocommerce a.button:hover, .woocommerce button:hover, .woocommerce .single-product button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt.disabled:hover';
	$goldy_business_themetype['_button_border_radius']= "5px";
	$goldy_business_themetype['_button_border_color']= "#ff6a3e";
	$goldy_business_themetype['_button_border_color_element']= 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled';
	$goldy_business_themetype['_scroll_button_bg_color']= "#ff6a3e";
	$goldy_business_themetype['_scroll_button_color']= "#ffffff";
	$goldy_business_themetype['_scroll_button_bg_hover_color']= "#214462";
	$goldy_business_themetype['_scroll_button_text_hover_color']= "#ffffff";
	$goldy_business_themetype['silvery_featured_slider_text_color']= "#ffffff";
	$goldy_business_themetype['silvery_featured_slider_arrow_text_color']= "#ffffff";
	$goldy_business_themetype['silvery_featured_slider_arrow_bg_color']= "#214462";
	$goldy_business_themetype['silvery_featured_slider_arrow_text_hover_color']= "#ffffff";
	$goldy_business_themetype['silvery_featured_slider_arrow_bg_hover_color']= "#ff6a3e";
	$goldy_business_themetype['featured_section_bg_color']= "#ffffff";
	$goldy_business_themetype['featured_section_text_color']= "#333333";
	$goldy_business_themetype['featured_section_contain_bg_color']= "#ffffff";
	$goldy_business_themetype['featured_section_contain_bg_color_element']= ".section-featured-wrep";
	$goldy_business_themetype['featured_section_bg_hover_color']= "#214462";
	$goldy_business_themetype['featured_section_bg_hover_color_element']= ".section-featured-wrep:hover";
	$goldy_business_themetype['featured_section_contain_text_color']= "#273641";
	$goldy_business_themetype['featured_section_contain_text_color_element']= ".section-featured-wrep";
	$goldy_business_themetype['featured_section_icon_color']= "#ff6a3e";
	$goldy_business_themetype['featured_section_icon_color_element']= ".featured-section_data .featured_content .featured-icon";
	$goldy_business_themetype['featured_section_icon_hover_color']= "#ffffff";
	$goldy_business_themetype['featured_section_icon_hover_color_element']= ".featured-section_data .section-featured-wrep:hover .featured-icon";
	$goldy_business_themetype['featured_section_icon_bg_color']= "#ffffff";
	$goldy_business_themetype['featured_section_icon_bg_color_element']= ".featured-section_data .featured_content .featured-icon";
	$goldy_business_themetype['featured_section_icon_bg_hover_color']= "#214462";
	$goldy_business_themetype['featured_section_icon_bg_hover_color_element']= ".featured-section_data .section-featured-wrep:hover .featured-icon";
	$goldy_business_themetype['featured_section_border_color']= "#14141429";
	$goldy_business_themetype['featured_section_border_color_background_element']= ".featured-section_data .featured_content .featured-thumbnail:after";
	$goldy_business_themetype['featured_section_border_color_border_element']= ".section-featured-wrep";
	$goldy_business_themetype['featured_section_icon_size']= "55px";
	$goldy_business_themetype['_book_an_appointment_bg_color']= "#f6f6f6";
	$goldy_business_themetype['_book_an_appointment_title_color']= "#ffffff";
	$goldy_business_themetype['about_section_bg_color']= "#f6f6f6";
	$goldy_business_themetype['about_section_bg_color_element']= ".about_section_info";
	$goldy_business_themetype['about_section_title_text_color']= "#333333";
	$goldy_business_themetype['our_portfolio_bg_color']= "#f9f9f9";
	$goldy_business_themetype['our_portfolio_bg_color_element']= ".our_portfolio_info";
	$goldy_business_themetype['our_portfolio_title_color']= "#333333";
	$goldy_business_themetype['our_portfolio_text_color']= "#333333";
	$goldy_business_themetype['our_portfolio_text_color_element']= ".our_portfolio_info";
	$goldy_business_themetype['our_portfolio_icon_bg_color']= "#ffffff";
	$goldy_business_themetype['our_portfolio_icon_bg_color_element']= ".our_portfolio_btn a";
	$goldy_business_themetype['our_portfolio_icon_color']= "#ff0000";
	$goldy_business_themetype['our_portfolio_icon_color_element']= ".our_portfolio_btn a";
	$goldy_business_themetype['our_portfolio_border_color']= "#ed8a63";
	$goldy_business_themetype['our_portfolio_border_color_background_element']= ".our_port_containe .our_portfolio_title i";
	$goldy_business_themetype['our_portfolio_border_color_color_element']= ".our_port_containe .our_portfolio_title i";
	$goldy_business_themetype['our_portfolio_border_hover_color']= "#fd6047";
	$goldy_business_themetype['our_portfolio_border_hover_color_background_element']= ".our_portfolio_info .our_portfolio_caption .our_portfolio_container:hover .our_portfolio_title i";
	$goldy_business_themetype['our_portfolio_border_hover_color_color_element']= ".our_portfolio_info .our_portfolio_caption .our_portfolio_container:hover .our_portfolio_title i";
	$goldy_business_themetype['our_portfolio_container_text_color']= "#000000";
	$goldy_business_themetype['our_portfolio_container_text_color_element']= ".our_portfolio_info .our_portfolio_container";
	$goldy_business_themetype['our_team_bg_color']= "#f6f6f6";
	$goldy_business_themetype['our_team_bg_color_element']= ".our_team_section";
	$goldy_business_themetype['our_team_text_color']= "#333333";
	$goldy_business_themetype['our_team_text_color_element']= ".our_team_section .our_team_main_title";
	$goldy_business_themetype['our_team_container_text_hover_color']= "#000000";
	$goldy_business_themetype['our_team_container_text_hover_color_element']= ".our_team_container:hover .our_team_title a, .our_team_container:hover .our_team_headline p";
	$goldy_business_themetype['our_team_link_color']= "#ff6a3e";
	$goldy_business_themetype['our_team_link_color_element']= ".our_team_icon_contain a";
	$goldy_business_themetype['our_team_link_hover_color']= "#ff6a3e";
	$goldy_business_themetype['our_team_link_hover_color_element']= ".our_team_icon_contain .our_team_title a:hover";
	$goldy_business_themetype['our_testimonial_bg_color']= "#f6f6f6";
	$goldy_business_themetype['our_testimonial_bg_color_element']= ".our_testimonial_section";
	$goldy_business_themetype['our_testimonial_text_color']= "#333333";
	$goldy_business_themetype['our_testimonial_text_color_element']= ".our_testimonial_section .testimonial_title h2, .our_testimonial_section .our_testimonial_main_disc p";
	$goldy_business_themetype['our_testimonial_quote_color']= "#ff6a3e";
	$goldy_business_themetype['our_testimonial_quote_color_element']= ".our_testimonial_icon i";
	$goldy_business_themetype['our_testimonial_quote_hover_color']= "#ff6a3e";
	$goldy_business_themetype['our_testimonial_quote_hover_color_element']= ".testimonials_data:hover i.fa.fa-quote-right";
	$goldy_business_themetype['our_testimonial_img_hover_border_color']= "#ff6a3e";
	$goldy_business_themetype['our_testimonial_img_hover_border_color_element']= ".image_testimonials img:hover";
	$goldy_business_themetype['our_testimonial_contain_bg_color']= "#ffffff";
	$goldy_business_themetype['our_testimonial_contain_bg_color_element']= ".testimonials_data";
	$goldy_business_themetype['our_testimonial_contain_bg_color_border_element']= ".testimonials_data .testinomial_description p:before";
	$goldy_business_themetype['our_testimonial_contain_description_bg_color']= "rgba(255, 255, 255, 0.01)";
	$goldy_business_themetype['our_testimonial_contain_description_bg_color_element']= ".testinomial_description";
	$goldy_business_themetype['our_testimonial_container_description_color']= "#000000";
	$goldy_business_themetype['our_testimonial_container_description_color_element']= ".testinomial_description p";
	$goldy_business_themetype['our_testimonial_headline_text_color']= "#000000";
	$goldy_business_themetype['our_testimonial_headline_text_color_element']= ".our_testimonial_section .testinomial_owl_slider .testimonials_title h3";
	$goldy_business_themetype['our_testimonial_subheadline_text_color']= "#ff6a3e";
	$goldy_business_themetype['our_testimonial_subheadline_text_color_element']= ".our_testimonial_section .testinomial_owl_slider .testimonials_title h4";
	$goldy_business_themetype['our_testimonial_arrow_bg_color']= "#ff6a3e";
	$goldy_business_themetype['our_testimonial_arrow_bg_color_element']= ".our_testimonial_section .testinomial_owl_slider .owl-nav button";
	$goldy_business_themetype['our_testimonial_arrow_text_color']= "#ffffff";
	$goldy_business_themetype['our_testimonial_arrow_text_color_element']= ".our_testimonial_section .testinomial_owl_slider .owl-nav button";
	$goldy_business_themetype['our_testimonial_arrow_text_hover_color']= "#ffffff";
	$goldy_business_themetype['our_testimonial_arrow_text_hover_color_element']= ".our_testimonial_section button.owl-prev:hover, .our_testimonial_section button.owl-next:hover";
	$goldy_business_themetype['our_testimonial_arrow_bg_hover_color']= "#214462";
	$goldy_business_themetype['our_testimonial_arrow_bg_hover_color_element']= ".our_testimonial_section button.owl-prev:hover, .our_testimonial_section button.owl-next:hover";
	$goldy_business_themetype['our_sponsors_text_color']= "#000000";
	$goldy_business_themetype['our_sponsors_text_color_element']= ".our_sponsors_section";
	$goldy_business_themetype['our_sponsors_bg_color']= "#f0f9fb";
	$goldy_business_themetype['our_sponsors_bg_color_element']= ".our_sponsors_section";
	$goldy_business_themetype['our_sponsors_arrow_color']= "#ffffff";
	$goldy_business_themetype['our_sponsors_arrow_color_element']= ".our_sponsors_section .our_sponsors_contain .owl-nav button";
	$goldy_business_themetype['our_sponsors_arrow_bg_color']= "#273641";
	$goldy_business_themetype['our_sponsors_arrow_bg_color_element']= ".our_sponsors_section .our_sponsors_contain .owl-nav button";
	$goldy_business_themetype['our_sponsors_arrow_text_hover_color']= "#ffffff";
	$goldy_business_themetype['our_sponsors_arrow_text_hover_color_element']= ".our_sponsors_section .our_sponsors_contain button.owl-prev:hover, .our_sponsors_section .our_sponsors_contain button.owl-next:hover";
	$goldy_business_themetype['our_sponsors_arrow_bghover_color']= "#4f2d4f";
	$goldy_business_themetype['our_sponsors_arrow_bghover_color_element']= ".our_sponsors_section .our_sponsors_contain button.owl-prev:hover, .our_sponsors_section .our_sponsors_contain button.owl-next:hover";
	$goldy_business_themetype['our_services_bg_color']= "#ffffff";
	$goldy_business_themetype['our_services_bg_color_element']= ".services_section";
	$goldy_business_themetype['our_services_first_widget_bg_color']= "#214462";
	$goldy_business_themetype['our_services_first_widget_bg_color_element']= ".widget_section_one";
	$goldy_business_themetype['our_services_first_widget_text_color']= "#ffffff";
	$goldy_business_themetype['our_services_first_widget_text_color_element']= ".widget_section_one";
	$goldy_business_themetype['our_services_second_widget_bg_color']= "#ff6a3e";
	$goldy_business_themetype['our_services_second_widget_bg_color_element']= ".widget_section_two";
	$goldy_business_themetype['our_services_second_widget_text_color']= "#ffffff";
	$goldy_business_themetype['our_services_second_widget_text_color_element']= ".widget_section_two";
	$goldy_business_themetype['our_services_third_widget_bg_color']= "#214462";
	$goldy_business_themetype['our_services_third_widget_bg_color_element']= ".widget_section_three";
	$goldy_business_themetype['our_services_third_widget_text_color']= "#ffffff";
	$goldy_business_themetype['our_services_third_widget_text_color_element']= ".widget_section_three";
	$goldy_business_themetype['_footer_bg_color']= "#202020";
	$goldy_business_themetype['_footer_bg_color_element']= "footer#colophon";
	$goldy_business_themetype['_footer_text_color']= "#ffffff";
	$goldy_business_themetype['_footer_text_color_element']= "footer#colophon";
	$goldy_business_themetype['footer_link_color']= "#6E777D";
	$goldy_business_themetype['footer_link_color_element']= "footer#colophon a";
	$goldy_business_themetype['_footer_link_hover_color']= "#ff6a3e";
	$goldy_business_themetype['_footer_link_hover_color_element']= "footer#colophon a:hover";
	$goldy_business_themetype['design_underline_color']= "#c76a1a";
	$goldy_business_themetype['silvary_breadcrumb_bg_color']= "#070707cc";
	$goldy_business_themetype['silvary_breadcrumb_bg_color_element']= ".breadcrumb_info";
	$goldy_business_themetype['silvary_breadcrumb_text_color']= "#ffffff";
	$goldy_business_themetype['silvary_breadcrumb_text_color_element']= ".breadcrumb_info";
	$goldy_business_themetype['silvary_breadcrumb_link_color']= "#ff6a3e";
	$goldy_business_themetype['silvary_breadcrumb_link_color_element']= "section#breadcrumb-section a";
	$goldy_business_themetype['goldy_loader_image']= get_theme_file_uri('assets/images/loader.gif');
	$goldy_business_themetype['goldy_loader_bg_color']= "#ffffff";
	if (is_plugin_active('slivery-extender/slivery-extender.php')) {
		$goldy_business_themetype['global_ordering_default'] = array(
			'goldy_mex_featuredimage_slider',
			'goldy_mex_featured_section',
			'goldy_mex_our_portfolio_section',
			'goldy_mex_about_section',
			'goldy_mex_appointment_section',
			'goldy_mex_our_team_section',
			'goldy_mex_our_testimonial_section',
			'goldy_mex_business_pricing_plan_section',
			'goldy_mex_our_sponsors_section',
			'goldy_mex_services_section',
			'goldy_mex_widget_section',
		);
	}else{
		$goldy_business_themetype['global_ordering_default'] = array(
			'goldy_mex_featuredimage_slider',
			'goldy_mex_featured_section',
			'goldy_mex_business_pricing_plan_section',
			'goldy_mex_our_sponsors_section',
		);
	}
	$goldy_mex_themetype = $goldy_business_themetype;
}

add_filter('goldy_mex_global_ordering_action','goldy_ordering_callback');
function goldy_ordering_callback($choicarraly){
	$choicarraly['goldy_mex_business_pricing_plan_section'] = 'Pricing Plan';
	return $choicarraly;
}

/* enqueue script for parent theme stylesheeet */        
function goldy_business_childtheme_parent_styles() {
 
 // enqueue style
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'goldy-business' ) );
}
add_action( 'wp_enqueue_scripts', 'goldy_business_childtheme_parent_styles');


/**
 * Callback sections.
 */

add_action("goldy_header_topbar_loop",'goldy_fitness_header_topbar_loop',5);
function goldy_fitness_header_topbar_loop($goldy_mex_default){
?>
	<div class="header_top_bar">
		<?php if(get_theme_mod( 'goldy_mex_opening_time',$goldy_mex_default['options']['goldy_mex_opening_time'])){ ?>
			<?php if(!empty(get_theme_mod( 'goldy_mex_opening_time',$goldy_mex_default['options']['goldy_mex_opening_time']))){ ?>
				<div class="opening_time_data">
					<div class="opening_icon">
						<i class="fa fa-clock-o"></i>
					</div>
					<div class="opening_info">
						<p><?php echo esc_html(get_theme_mod( 'goldy_mex_opening_time',$goldy_mex_default['options']['goldy_mex_opening_time'] )); ?></p>
					</div>
				</div>
		<?php } } ?>
		<?php if(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number'])){ ?>
		<?php if(!empty(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number']))){ ?>
				<div class="contact_data">
					<div class="contact_icon">
						<i class="fa fa-phone"></i>
					</div>
					<div class="contact_info">
						<a href="tel:<?php echo esc_html(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number'] )); ?>"><p><?php echo esc_html(get_theme_mod( 'goldy_mex_contact_info_number',$goldy_mex_default['options']['goldy_mex_contact_info_number'] )); ?></p></a>
					</div>
				</div>
				
		<?php } } 
		if(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] )){
			if(!empty(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] ))){ ?>
			<div class="email_data">
				<div class="email_icon">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="email_info">
					<a href="mailto:<?php echo esc_html(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] )); ?>"><p><?php echo esc_html(get_theme_mod( 'goldy_mex_email_info_number',$goldy_mex_default['options']['goldy_mex_email_info_number'] )); ?></p></a>
				</div>
			</div>
		<?php } } ?>
	</div>
	<div class="header_social_icon">
		<?php 
		if(get_theme_mod( 'goldy_mex_display_social_icon',$goldy_mex_default['options']['goldy_mex_display_social_icon']) != ''){ ?>
			<div class="social_icon_info">
				<div class="social_data">
					<?php 
					$social_icon_section_content  = get_theme_mod( 'goldy_mex_social_icon_section_content',$goldy_mex_default['options']['goldy_mex_social_icon_section_content']);
					if ( ! empty( $social_icon_section_content ) ) {
						// $social_icon_section_content = json_decode( $social_icon_section_content );
						foreach ( $social_icon_section_content as $info_item ) {
							if(get_theme_mod( 'goldy_mex_social_icon_section_content',$goldy_mex_default['options']['goldy_mex_social_icon_section_content']) != ''){
								if(!empty($info_item['link_url'])){
								?>
								<a class="social_icon" href="<?php echo esc_attr($info_item['link_url']);?>" target="_blank">
									<i class="fa <?php echo esc_attr($info_item['icon_value']);?>"></i>
								</a>
								<?php
								}
							}
						}
					} ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php
}

add_action('goldy_main_header_loop','goldy_fitness_main_header_loop',5); 
function goldy_fitness_main_header_loop($goldy_mex_default){
?>
	<div class="header_info">
		<div class="site-branding">
			<?php
				the_custom_logo();
			?>
			<div class="header_logo">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				endif;
				$sharp_tian_description = get_bloginfo( 'description', 'display' );
				if ( $sharp_tian_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo esc_html($sharp_tian_description); ?></p>
				<?php endif; ?>
			</div>
		</div><!-- .site-branding -->
		<div class="menu_call_button">
			<div class="call_button_info">
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" id="navbar-toggle" aria-controls="primary-menu" aria-expanded="false">
						<i class="fa fa-bars"></i>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>							
				</nav>
				<div class="mobile_menu main-navigation" id="mobile_primary">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
					<button class="menu-toggle" id="mobilepop"  aria-expanded="false">
						<i class="fa fa-close"></i>
					</button>
					<div class="header_topbar_info">
						<?php
						if ( is_plugin_active('slivery-extender/slivery-extender.php') ) {?>
							<?php  
								do_action("goldy_header_topbar_loop",$goldy_mex_default);
							?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
}

add_action('goldy_our_portfolio_loop','goldy_business_our_portfolio_loop',5);
function goldy_business_our_portfolio_loop($info_item){
?>
	<?php if(!empty( $info_item['image'])){ ?>
		<img src="<?php echo esc_url($info_item['image']); ?>" alt="The Last of us" loading="lazy">
	<?php }else{
		?>
		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
		<?php
	} 
	?>
<div class="our_port_containe">
	<div class="our_portfolio_inner_data">
		<div class="our_portfolio_title" >
			<h3><?php echo $info_item['title'];?></h3>
			<p><?php //echo $info_item->subtitle; ?></p>
			<p class="our_portfolio_desc"><?php echo wp_kses_post($info_item['text']); ?></p>
		</div>	
		<div class="our_portfolio_btn">
		<?php if(!empty($info_item['link_url'])){ ?>
			<a href="<?php echo esc_attr($info_item['link_url']); ?>"><?php echo esc_html('Read More','goldy-business'); ?>
			</a>
		<?php } ?>
		</div>
	</div>
</div>
<?php
}

add_action('goldy_featured_section_loop','goldy_business_featured_section_loop',5);
function goldy_business_featured_section_loop($info_item){
?>
<div class="featured_content_inner">
	<?php if(!empty($info_item['icon_value'])){ ?>
		<div class="featured-icon">
			<i class="fa <?php echo esc_attr($info_item['icon_value'])?>"></i>
		</div>
	<?php } ?>
	<div class="featured-title wow animate__fadeInLeft" data-wow-duration="1s">  
		<h4>
			<?php echo esc_attr($info_item['title']); ?>
		</h4>
	</div>
	<div class="featured-description wow animate__fadeInLeft" data-wow-duration="2s">
		<p><?php echo wp_kses_post($info_item['text']); ?></p>
	</div>
</div>
<?php
}

add_action('goldy_our_testimonial_loop','goldy_grocery_market_our_testimonial_loop',5);
function goldy_grocery_market_our_testimonial_loop($info_item){ 
?>
<div class="our_testimonial_data_info">
	<div class="our_testimonial">
		<div class="testimonials_data">
			<div class="our_testimonia_multiple">
			   <div class="testimonials_image">
			      <div class="image_testimonials">
			         <?php
							if(!empty($info_item['image'])){
								?>
								<img src="<?php echo esc_url($info_item['image']);  ?>" alt="" loading="lazy">
								<?php
							}else{
								?>
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="">	
								<?php
							}
						?>
			      </div>
			   </div>
			   <div class="our_testimonial_icon">
			   	<i class="fa fa-quote-right"></i>
			   </div>
			</div>
			<div class="testmonials_inner_data">
			   <div class="testinomial_description">
					<p><?php echo wp_kses_post($info_item['text']) ?></p>
				</div>
			</div>
		   <div class="testimonials_content">
		    	<div class="our_testimonials_container">
		      	<div class="testimonials_title">
		         	<h3><?php echo esc_html($info_item['title']) ?></h3>
						<h4><?php echo  esc_attr($info_item['subtitle']) ?></h4>
		      	</div>
		      </div>
		   </div>
		</div>
	</div>
</div>
<?php 
}

add_action('goldy_our_team_loop','goldy_grocery_market_our_team_loop',5);
function goldy_grocery_market_our_team_loop($info_item){ 
?>
<div class="our_team_container_data">
	<div class="out_team_pic">
		<?php
			if(!empty( $info_item['image'])){
				?>
				<img class="our_team_main_image" src="<?php echo esc_url($info_item['image']); ?>" loading="lazy">
				<?php
			}else{
				?>
				<img class="our_team_main_image" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
				<?php
			}
		?>
	</div>
	<div class="our_team_icon_contain">
		<div class="our_teams_contain">
			<div class="our_team_title">
				<a href="<?php echo esc_html($info_item['link_url']); ?>">
					<h3><?php echo esc_html($info_item['title']); ?></h3>
				</a>
			</div>
			<div class="our_team_headline">
				<p><?php echo esc_html($info_item['subtitle']);?></p>
			</div>
		</div>
	</div>	
</div>
<?php 
}

add_action('goldy_featured_slider_loop','goldy_grocery_market_featured_slider_loop',5);
function goldy_grocery_market_featured_slider_loop($goldy_mex_default){
?>
	<?php
		if(current_user_can('edit_theme_options')){
		
		if(is_plugin_active('slivery-extender/slivery-extender.php')){
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider',$goldy_mex_default['options']['goldy_mex_featuredimage_slider']);
		}else{
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider');
		}
	}else{
		if(is_plugin_active('slivery-extender/slivery-extender.php')){
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider',$goldy_mex_default['options']['goldy_mex_featuredimage_slider']);
		}else{
			$featuredimage_slider  = get_theme_mod( 'goldy_mex_featuredimage_slider');
		}
	}

	if(empty($featuredimage_slider) && current_user_can('edit_theme_options') ){?>
		<div class="block_data_info wow animate__zoomIn">
			<div class="block_section">
				<div class="block_contant">
					<h3><?php echo __( 'Step 1 - Theme Options', 'goldy-business' ); ?></h3>
					<p><?php echo __( 'To begin customizing your site go to <strong>Appearance → Customizer</strong> and select <strong>Theme Option</strong>. Use the options to build your site.', 'goldy-business' ); ?></p>
				</div>
			</div>
			<div class="block_section">
				<div class="block_contant">
					<h3><?php echo __( 'Step 2 - Setup Slider', 'goldy-business' ); ?></h3>
					<p><?php echo __( 'Go to <strong>Theme Option → Featured Slider</strong>. Simply add an image, title and text to create stunning slides.', 'goldy-business' ); ?></p>
				</div>
			</div>
			<div class="block_section">
				<div class="block_contant">
					<h3><?php echo __( 'Step 3 - Setup Style', 'goldy-business' ); ?></h3>
					<p><?php echo __( 'Go to <strong>Theme Option → Featured Slider</strong>. Simply add Text, Arrow Text and Arrow Background Color.', 'goldy-business' ); ?>'</p>
				</div>
			</div>
		</div>
	<?php
	}else{
	
	if ( ! empty( $featuredimage_slider ) ) {
	// $featuredimage_slider = json_decode( $featuredimage_slider );
	?>
		<div class="featured_slider_image wow animate__zoomIn">
			<div id="owl-demo" class="owl-carousel owl-theme featuredimage_slider">
				<?php	
					foreach ( $featuredimage_slider as $info_item ) {
						?>								
						<div class="item">
							<div class="hentry-inner">
								<div class="post-thumbnail">
									<?php if(!empty($info_item['image'])){ ?>
										<img src="<?php echo esc_url($info_item['image']); ?>" alt="The Last of us" loading="lazy">

									<?php }else{
										?>
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
										<?php
									} ?> 
								</div>				
							  	<div class="entry-container wow bounceInDown">
							  		<?php if($info_item['title']){
							  			?>
							  			<header class=" featured_slider_title entry-header">					
										<h1 class="entry-title">
									  		<?php echo esc_attr($info_item['title']); ?>
									  	</h1>
									</header>
							  			<?php
							  		} ?>						
								  	<div class="featured_slider_disc entry-summary"><?php echo wp_kses_post($info_item['text']); ?></div>
								  	<?php if($info_item['link_text'] != ''){ 
								  			if(!empty($info_item['link_url'])) {
								  				if(!empty($info_item['link_text'])) {?>
									  	<div class="image_btn button">
											<a href="<?php echo esc_attr($info_item['link_url']); ?>" class="buttons"><?php echo esc_html($info_item['link_text']); ?></a>
										</div>
									<?php } } }?>
								</div>
							</div>								
						</div>	
						<?php							
					}
				?>
			</div>
		</div>
		<?php
		}
	}
}

add_action('goldy_about_section_data','goldy_business_about_section_data',5);
function goldy_business_about_section_data($goldy_mex_default){
?>
	<div class="about_section_container wow animate__fadeInUpBig">
		<!-- Layout1 -->
		<div class="about_featured_image">
			<div class="about_pic">
				<?php if(get_theme_mod( 'about_section_image')){ ?>
					<img src="<?php echo esc_url(get_theme_mod( 'about_section_image')); ?>" alt="The Last of us" loading="lazy">
				<?php }else{
					?>
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
					<?php
				} ?>
			</div>
		</div>
		<!-- Layout2 -->
		<div class="about_container_data">
			<?php
			if(!empty(get_theme_mod( 'goldy_mex_about_main_title',$goldy_mex_default['options']['goldy_mex_about_main_title']))){
				?>
				<div class="goldy_mex_about_main_title heading_main_title">
					<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_about_main_title',$goldy_mex_default['options']['goldy_mex_about_main_title'] )); ?></h2>
					<span class="separator"></span>
				</div>
				<?php
			} 
			?>	
			<div class="entry-header">
				<div class="about_title">
					<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_about_section_layout_title',$goldy_mex_default['options']['goldy_mex_about_section_layout_title'])); ?></h2>
				</div>
				<div class="about_sub_heading">
					<p><?php echo esc_html(get_theme_mod( 'goldy_mex_about_section_layout_subheading',$goldy_mex_default['options']['goldy_mex_about_section_layout_subheading'])); ?></p>
				</div>
				<div class="about_description">
					<p><?php echo wp_kses_post(get_theme_mod( 'goldy_mex_about_section_layout_desc',$goldy_mex_default['options']['goldy_mex_about_section_layout_desc'])); ?></p>
				</div>
				<?php if(!empty(get_theme_mod( 'goldy_mex_about_section_layout_btn_link',$goldy_mex_default['options']['goldy_mex_about_section_layout_btn_link']))){ ?>
				<div class="about_btn">
					<a class="buttons" href="<?php echo esc_attr(get_theme_mod( 'goldy_mex_about_section_layout_btn_link',$goldy_mex_default['options']['goldy_mex_about_section_layout_btn_link'])); ?>"><?php echo esc_html(get_theme_mod( 'goldy_mex_about_section_layout_btn',$goldy_mex_default['options']['goldy_mex_about_section_layout_btn'] )); ?></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php 
}

add_action('goldy_book_an_appointment_section_data','goldy_business_book_an_appointment_section_data',5);
function goldy_business_book_an_appointment_section_data($goldy_mex_default){
?>
	<div class="appointment_data wow animate__zoomIn">
		<?php if(get_theme_mod( 'goldy_mex_book_an_appointment_section_image')){ ?>
		<div class="appointment_featured_image" style="background: url(<?php echo esc_attr(get_theme_mod( 'goldy_mex_book_an_appointment_section_image')); ?>) rgba(0,0,0,0.55);" loading="lazy">
		</div>
		<?php }else{ ?>
			<div class="appointment_featured_image" style="background-image: url(<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg);"></div>
		<?php } ?>
		<div class="appointment_fields_data">
			<div class="appoinment_form_overlay"></div>
			<div class="appointment_main_title">
				<div class="appointment_title heading_main_title">
					<h2><?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_main_title',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_main_title'] )); ?></h2>
					<span class="separator"></span>
				</div>
			</div>
			<div class="appointment_field">
				<div class="af_table_data">
					<form method="post" class="appoinment_reset" id="bookan_appoinment">
						<div class="appoinment_data">
							<div class="af_input_fields">
								<input type="text" name="appointment_name" id="appointment_name" size="70" class="appointment_name" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_name_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_name_ph'] )); ?>">
							</div>
							<div class="af_input_fields">
								<input type="email" name="appointment_email" id="appointment_email" size="70" class="appointment_email" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_email_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_email_ph'] )); ?>">
							</div>
						</div>
						<div class="af_input_fields">
							<input type="number" name="appointment_monumber" id="appointment_monumber" size="70" class="appointment_monumber" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_number_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_number_ph'] )); ?>">
						</div>
						<div class="af_input_fields">
							<textarea rows="5" cols="72" name="appointment_query" id="appointment_query" class="appointment_query" placeholder="<?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_query_ph',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_query_ph'] )); ?>"></textarea>
						</div>
						<div class="bookan_appoinment_button">
							<a class="buttons" href="" name="submit" id="appoinment_book" class="make_appointment_btn"><?php echo esc_html(get_theme_mod( 'goldy_mex_book_an_appoinment_btn_text',$goldy_mex_default['options']['goldy_mex_book_an_appoinment_btn_text'] )); ?></a>
						</div>
						<div class="oc_axaxa">
							<div class="validation_error"></div>
							<div class="email_success"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php 
}

add_action('goldy_our_services_section_data', 'goldy_business_our_services_section_data');
function goldy_business_our_services_section_data($goldy_mex_default){
	?>
	<div class="our_services_data">
  		<div class="service_data wow fadeInUp">
         <div class="our_services_title heading_main_title">
            <h2><?php echo esc_html(get_theme_mod( 'goldy_mex_our_services_main_title',$goldy_mex_default['options']['goldy_mex_our_services_main_title'] )); ?></h2>
         </div>
      </div>
  	</div>
	<div class="services_main_content wow animate__zoomIn" data-wow-duration="2s">
		<div class="services_inner_data">
			<div class="our_services_widget">
		      <div class="widget_section_one">
		         <div class="widget_inner_data">
		            <div class="sercice_innerdata">
		               <div class="first_widget_heading">
		                  <h3><?php echo esc_html(get_theme_mod( 'goldy_mex_our_services_first_widget_title',$goldy_mex_default['options']['goldy_mex_our_services_first_widget_title'] )); ?></h3>
		                 </div>
		                 	<div class="first_widget_desc">
		                     <p><?php echo wp_kses_post(get_theme_mod('goldy_mex_our_services_first_widget_desc',$goldy_mex_default['options']['goldy_mex_our_services_first_widget_desc'])); ?></p>
		                 	</div>
		             	</div>
		      	</div>
		     	</div>
		      <div class="widget_section_two">
		         <div class="widget_inner_data">
		               <div class="service_hours_data">
		                 	<div class="two_widget_heading">
		                     <h3><?php echo esc_html(get_theme_mod('goldy_mex_our_services_second_widget_title',$goldy_mex_default['options']['goldy_mex_our_services_second_widget_title'])); ?></h3>
		                 	</div>
		                 	<div class="two_widget_desc">
		                     <p><?php echo wp_kses_post(get_theme_mod('goldy_mex_our_services_second_widget_desc',$goldy_mex_default['options']['goldy_mex_our_services_second_widget_desc'])); ?></p>
		                 	</div>
		             	</div>
		         </div>
		     </div>
		     <div class="widget_section_three">
		         <div class="widget_inner_td_data">
		            <div class="timetable_opening">
		              	<div class="tdt_heading">
		                  <h3><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_title',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_title'])); ?></h3>
		              	</div>
		              	<div class="inner_table_data">
		                  <div class="timedate_data">
		                     <p><strong><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc1',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc1'])); ?></strong></p>
		                     <p><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc2',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc2'])); ?></p>
		                  </div>
		                  <div class="timedate_data">
		                     <p><strong><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc3',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc3'])); ?></strong></p>
		                     <p><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc4',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc4'])); ?></p>
		                  </div>
		                  <div class="timedate_data">
		                     <p><strong><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc5',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc5'])); ?></strong></p>
		                     <p><?php echo esc_html(get_theme_mod('goldy_mex_our_services_third_widget_desc6',$goldy_mex_default['options']['goldy_mex_our_services_third_widget_desc6'])); ?></p>
		                  </div>
		              	</div>
		          	</div>
		         </div>
		     	</div>
	     	</div>
	 	</div>
	</div>
	<?php
}