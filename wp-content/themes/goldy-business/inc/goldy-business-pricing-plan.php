<?php
add_action("init","goldy_business_pricing_plan_customizer",12);
function goldy_business_pricing_plan_customizer(){
// Restaurant Menu
	new \Kirki\Section(
		'goldy_business_pricing_plan_section',
		[
			'title'       => esc_html__( 'Pricing Plan', 'goldy-business' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 150,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'goldy_business_pricing_plan_main_title',
			'label'    => esc_html__( 'Pricing Plan Title', 'goldy-business' ),
			'section'  => 'goldy_business_pricing_plan_section',
			'default'  => esc_html__( 'Pricing Plan', 'goldy-business' ),
			'priority' => 5,
			'partial_refresh'    => [
				'goldy_business_pricing_plan_main_title' => [
					'selector'        => '.pricing_plan_title',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => 'goldy_business_pricing_plan_content',
			'label'    => esc_html__( 'Pricing Plan Content', 'goldy-business' ),
			'row_label' => array( 'value' => 'Info item' ),
			'section'  => 'goldy_business_pricing_plan_section',
			'priority' => 10,
			'default'  => [
				[
					'image'    => '',
					'price_value'    => esc_html__('$120', 'goldy-business' ),
					'plan_time'    => esc_html__('Per Month', 'goldy-business' ),
					'plan_type'    => esc_html__('Basic', 'goldy-business' ),
					'plan_description'    => esc_html__('Lorem ipsum dolor sit amet, consectetur aditpisicing elit, sed do eiusmod tempor incididunt ut labore.', 'goldy-business' ),	
					'link_text'    => esc_html__('Select Plan', 'goldy-business' ),	
					'link_url'    => '#',	
				],
				[
					'image'    => '',
					'price_value'    => esc_html__('$160', 'goldy-business' ),
					'plan_time'    => esc_html__('Per Month', 'goldy-business' ),
					'plan_type'    => esc_html__('Standard', 'goldy-business' ),
					'plan_description'    => esc_html__('Lorem ipsum dolor sit amet, consectetur aditpisicing elit, sed do eiusmod tempor incididunt ut labore.', 'goldy-business' ),	
					'link_text'    => esc_html__('Select Plan', 'goldy-business' ),	
					'link_url'    => '#',
				],
				[
					'image'    => '',
					'price_value'    => esc_html__('$190', 'goldy-business' ),
					'plan_time'    => esc_html__('Per Month', 'goldy-business' ),
					'plan_type'    => esc_html__('Premium', 'goldy-business' ),
					'plan_description'    => esc_html__('Lorem ipsum dolor sit amet, consectetur aditpisicing elit, sed do eiusmod tempor incididunt ut labore.', 'goldy-business' ),	
					'link_text'    => esc_html__('Select Plan', 'goldy-business' ),	
					'link_url'    => '#',
				],
			],
			'fields'   => [
				'image'    => [
					'type'		  => 'image',
					'label'       => esc_html__( 'Image:', 'goldy-business' ),
				],
				'price_value'    => [
					'type'		  => 'text',
					'label'       => esc_html__( 'Plan Price:', 'goldy-business' ),
				],
				'plan_time'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Time', 'goldy-business' ),
				],
				'plan_type'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Plan Type', 'goldy-business' ),
				],
				'plan_description'    => [
					'type'        => 'textarea',
					'label'       => esc_html__( 'About Plan', 'goldy-business' ),
				],
				'link_text'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Link Text:', 'goldy-business' ),
				],
				'link_url'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Link URL:', 'goldy-business' ),
				],
			],
			'choices' => [
				'limit' => 3,
			]
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'goldy_business_pricing_plan_background_image',
			'label'       => esc_html__( 'Backgroung Image', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '',
			'priority'    => 15,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'goldy_business_pricing_plan_background_position',
			'label'       => esc_html__( 'Background Position', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => 'center center',
			'priority'    => 20,
			'placeholder' => esc_html__( 'Choose an option', 'goldy-business' ),
			'choices'     => [
				'left top' => esc_html__( 'Left Top', 'goldy-business' ),
				'left center' => esc_html__( 'Left Center', 'goldy-business' ),
				'left bottom' => esc_html__( 'Left Bottom', 'goldy-business' ),
				'right top' => esc_html__( 'Right Top', 'goldy-business' ),
				'right center' => esc_html__( 'Right Center', 'goldy-business' ),
				'right bottom' => esc_html__( 'Right Bottom', 'goldy-business' ),
				'center top' => esc_html__( 'Center Top', 'goldy-business' ),
				'center center' => esc_html__( 'Center Center', 'goldy-business' ),
				'center bottom' => esc_html__( 'Center Bottom', 'goldy-business' ),
			],
			'output' => array(
				array(
					'element'  => '.business_pricing_plan_section',
					'property' => 'background-position',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'goldy_business_pricing_plan_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => 'scroll',
			'priority'    => 25,
			'placeholder' => esc_html__( 'Choose an option', 'goldy-business' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'goldy-business' ),
				'fixed' => esc_html__( 'Fixed', 'goldy-business' ),
			],
			'output' => array(
				array(
					'element'  => '.business_pricing_plan_section',
					'property' => 'background-attachment',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'goldy_business_pricing_plan_background_size',
			'label'       => esc_html__( 'Background Size', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => 'cover',
			'priority'    => 30,
			'placeholder' => esc_html__( 'Choose an option', 'goldy-business' ),
			'choices'     => [
				'auto' => esc_html__( 'Auto', 'goldy-business' ),
				'cover' => esc_html__( 'Cover', 'goldy-business' ),
				'contain' => esc_html__( 'Contain', 'goldy-business' ),
			],
			'output' => array(
				array(
					'element'  => '.business_pricing_plan_section',
					'property' => 'background-size',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_bg_color',
			'label'       => __( 'Background Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ffffff',
			'priority'    => 35,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.business_pricing_plan_section',
					'property' => 'background-color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_text_color',
			'label'       => __( 'Title Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#333',
			'priority'    => 40,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pricing_plan_title h2',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_content_bg_color',
			'label'       => __( 'Contain Background Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ffffff',
			'priority'    => 45,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pricing-plan-inner-wrapper',
					'property' => 'background-color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_content_price_color',
			'label'       => __( 'Contain Price Title Text Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ffffff',
			'priority'    => 50,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_first_content h2, .pp_first_content p',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_content_hover_price_color',
			'label'       => __( 'Contain Price Title Hover Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ffffff',
			'priority'    => 55,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pricing-plan-inner-wrapper:hover .pp_first_content h2, .pricing-plan-inner-wrapper:hover .pp_first_content p',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_content_text_color',
			'label'       => __( 'Contain Text Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#000000',
			'priority'    => 60,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_second_content',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_content_hover_text_color',
			'label'       => __( 'Contain Hover Text Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#000000',
			'priority'    => 65,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pricing-plan-inner-wrapper:hover .pp_second_content',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_button_bg_color',
			'label'       => __( 'Button Background Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ff6a3e',
			'priority'    => 70,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_btn.pp_btn .buttons',
					'property' => 'background-color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_button_bg_hover_color',
			'label'       => __( 'Background Hover Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#214462',
			'priority'    => 75,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_btn.pp_btn .buttons::before',
					'property' => 'background-color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_button_text_color',
			'label'       => __( 'Button Text Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ffffff',
			'priority'    => 80,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_btn.pp_btn .buttons',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_button_texthover_color',
			'label'       => __( 'Button Text Hover Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ffffff',
			'priority'    => 85,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_btn.pp_btn .buttons:hover',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_button_border_color',
			'label'       => __( 'Button Border Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ff6a3e',
			'priority'    => 90,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_btn.pp_btn .buttons',
					'property' => 'border-color',
					'suffix' => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_price_title_bg_color',
			'label'       => __( 'Price Title Background Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ff6a3e',
			'priority'    => 95,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_first_content',
					'property' => 'background-color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_price_text_color',
			'label'       => __( 'Price Text Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#404040',
			'priority'    => 100,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_amount',
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_business_pricing_plan_price_bg_color',
			'label'       => __( 'Price Background Color', 'goldy-business' ),
			'section'     => 'goldy_business_pricing_plan_section',
			'default'     => '#ffffff',
			'priority'    => 105,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.pp_amount',
					'property' => 'background-color',
				),
			),
		]
	);
}

?>