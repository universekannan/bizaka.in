<?php
add_action( 'admin_init', 'goldy_business_remove_menu_pages' );

function goldy_business_remove_menu_pages() {          
	remove_submenu_page( 'themes.php', 'goldy-mex-about' );                                          
}

function goldy_business_about_menu() {
	add_theme_page( esc_html__( 'About Theme', 'goldy-business' ), esc_html__( 'About Theme', 'goldy-business' ), 'edit_theme_options', 'goldy-business-about', 'goldy_business_about_display' );
}
add_action( 'admin_menu', 'goldy_business_about_menu' );

function goldy_business_about_display(){
	?>
	<div class="goldy_business_about_data">
		<div class="goldy_business_about_title">
			<h1><?php echo esc_html( 'Goldy Business', 'goldy-business' ); ?></h1>
			<div class="goldy_business_about_theme">
				<div class="goldy_business_about_description">
					<p>
					<?php echo esc_html( 'Goldy Business is a clean, modern, user friendly, responsive and highly customizable WordPress theme that is specifically designed for businesses and companies operating in the finance, business and all modern technology company. you’ll easily find the design of this theme impressive and suitable for your Website. This Goldy Business WordPress theme, carries an abundance of crucial features and functionalities. For instance, featured slider, featured Section, About Section, Our Portfolio, Book an Appointment, Our team Section, Testimonial Slider, Our Services, Our Sponsors, Pricing Plan, Sticky Header, Social Information, Sidebar, Excerpt Options, and many more. All of these highly customizable features and sections are completely responsive and absolutely easy to customize.', 'goldy-business' ); ?>
					</p>
					<div class="goldy_business_about_demo">
						<div class="feature-section">
							<div class="about_data_goldy_solar">
								<h3><?php echo esc_html( 'Free Theme Demo', 'goldy-business' ); ?></h3>
								<?php $theme_demo_url = 'https://inverstheme.com/themedemo/goldy-business/'; ?>
								<a href="<?php echo esc_url($theme_demo_url); ?>"><?php echo esc_html( 'Theme Demo ', 'goldy-business' ); ?></a>
							</div>
						</div>
						<div class="feature-section">
							<div class="about_data_goldy_solar">
								<h3><?php echo esc_html( 'Documentation', 'goldy-business' ); ?></h3>
								<?php $theme_doc_url = 'https://www.inverstheme.com/goldy-business-documentation/'; ?>
								<a href="<?php echo esc_url($theme_doc_url); ?>"><?php echo esc_html( 'Read Documentation', 'goldy-business' ); ?></a>
							</div>
						</div>
						<div class="feature-section">
							<div class="about_data_goldy_solar">
								<h3><?php echo esc_html( 'Free VS Pro', 'goldy-business' ); ?></h3>
								<?php $theme_compare_url = 'https://www.inverstheme.com/theme/goldy-business-pro/'; ?>
								<a href="<?php echo esc_url($theme_compare_url); ?>"><?php echo esc_html( 'Compare free Vs Pro ', 'goldy-business' ); ?></a>
							</div>
						</div>
					</div>
				</div>

				<div class="goldy_business_about_image">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
				</div>
			</div>
		</div>
		<ul class="tabs">
			<li class="tab-link current" data-tab="about"><?php echo esc_html( 'About', 'goldy-business' ); ?></li>
		</ul> 
		<div id="about" class="tab-content current">
			<div class="about_section">
				<div class="about_info_data theme_info">
					<div class="about_theme_title">
						<h2><?php echo esc_html( 'For Shortcode', 'goldy-business' ); ?></h2>
					</div>
					<div class="about_theme_data">
						<p><?php echo esc_html( "For Displaying Theme Sections in Page or Post Put the Shortcode Which Is Given Below.", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Featured Slider : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_featuredimage_slider']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Featured Section : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_featured_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Our Portfolio : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_our_portfolio_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "About Us : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_about_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Book an Appointment : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_appointment_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Our Team : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_our_team_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Our Testimonial : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_our_testimonial_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Pricing Plan : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_business_pricing_plan_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Our Sponsors : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_our_sponsors_section']", 'goldy-business' ); ?></p>
						<p><strong><?php echo esc_html( "Our Services : ", 'goldy-business' ); ?></strong><?php echo esc_html( "[themesection section='goldy_mex_services_section']", 'goldy-business' ); ?></p>
					</div>
				</div>
				<div class="about_info_data theme_info">
					<div class="about_theme_title">
						<h2><?php echo esc_html( 'Theme Customizer', 'goldy-business' ); ?></h2>
					</div>
					<div class="about_theme_data">
						<p><?php echo esc_html( 'All Theme Options are available via Customize screen.', 'goldy-business' ); ?></p>
					</div>
					<div class="about_theme_btn">
						<a class="customize_btn button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php echo esc_html( 'Customize', 'goldy-business' ); ?></a>
					</div>
				</div>
				<div class="theme_que theme_info">
					<div class="about_theme_que">
						<h2><?php echo esc_html( 'Got theme support question?', 'goldy-business' ); ?></h2>
					</div>
					<div class="about_que_data">
						<p><?php echo esc_html( 'Get genuine support from genuine people. Whether its customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'goldy-business' ); ?></p>
					</div>
					<div class="about_que_btn">
						<a class="support_forum button button-primary" href="https://www.inverstheme.com/contact-us/"><?php echo esc_html( 'Support Forum', 'goldy-business' ); ?></a>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<?php
}
?>