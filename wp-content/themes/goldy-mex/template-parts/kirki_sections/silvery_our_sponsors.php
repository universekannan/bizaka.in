<?php
global $goldy_mex_themetype;
// Our Sponsors Section
	new \Kirki\Section(
		'our_sponsors_section',
		[
			'title'       => esc_html__( 'Our Sponsors', 'goldy-mex' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'goldy_mex_our_sponsors_main_title',
			'label'    => esc_html__( 'Our Sponsors Title', 'goldy-mex' ),
			'section'  => 'our_sponsors_section',
			'default'  => esc_html__( 'Our Sponsors', 'goldy-mex' ),
			'priority' => 5,
			'partial_refresh'    => [
				'goldy_mex_our_sponsors_main_title' => [
					'selector'        => '.our_sponsors_section',
				],
			],
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => 'goldy_mex_our_sponsors_section_content',
			'label'    => esc_html__( 'Our Sponsors Items Content', 'goldy-mex' ),
			'row_label' => array( 'value' => 'Sponsors item' ),
			'section'  => 'our_sponsors_section',
			'priority' => 10,
			'default'  => [
				[
					'image'    => '',
				],
				[
					'image'    => '',
				],
				[
					'image'    => '',
				],
			],
			'fields'   => [
				'image'    => [
					'type'		  => 'image',
					'label'       => esc_html__( 'Image:', 'goldy-mex' ),
				],
			],
			'choices' => [
				'limit' => ($goldy_mex_themetype['themtypeis']=='normal') ? 5 : 100,
			],
			'partial_refresh'    => [
				'goldy_mex_our_sponsors_main_title' => [
					'selector'        => '.our_sponsors_section',
					'render_callback' => function() {
					    return get_theme_mod('goldy_mex_our_sponsors_section_content');
					}
				],
			],
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'goldy_mex_our_sponsors_background_image',
			'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => '',
			'priority'    => 15,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'goldy_mex_our_sponsors_background_position',
			'label'       => esc_html__( 'Background Position', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => 'center center',
			'priority'    => 20,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'left top' => esc_html__( 'Left Top', 'kirki' ),
				'left center' => esc_html__( 'Left Center', 'kirki' ),
				'left bottom' => esc_html__( 'Left Bottom', 'kirki' ),
				'right top' => esc_html__( 'Right Top', 'kirki' ),
				'right center' => esc_html__( 'Right Center', 'kirki' ),
				'right bottom' => esc_html__( 'Right Bottom', 'kirki' ),
				'center top' => esc_html__( 'Center Top', 'kirki' ),
				'center center' => esc_html__( 'Center Center', 'kirki' ),
				'center bottom' => esc_html__( 'Center Bottom', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_sponsors_section',
					'property' => 'background-position',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'goldy_mex_our_sponsors_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => 'scroll',
			'priority'    => 25,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'kirki' ),
				'fixed' => esc_html__( 'Fixed', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_sponsors_section',
					'property' => 'background-attachment',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'goldy_mex_our_sponsors_background_size',
			'label'       => esc_html__( 'Background Size', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => 'cover',
			'priority'    => 30,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'auto' => esc_html__( 'Auto', 'kirki' ),
				'cover' => esc_html__( 'Cover', 'kirki' ),
				'contain' => esc_html__( 'Contain', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_sponsors_section',
					'property' => 'background-size',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'our_sponsors_text_color',
			'label'       => __( 'Text Color', 'goldy-mex' ),
			'section'     => 'our_sponsors_section',
			'default'     => $goldy_mex_themetype['our_sponsors_text_color'],
			'priority'    => 35,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['our_sponsors_text_color_element'],
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'our_sponsors_bg_color',
			'label'       => __( 'Background Color', 'goldy-mex' ),
			'section'     => 'our_sponsors_section',
			'default'     => $goldy_mex_themetype['our_sponsors_bg_color'],
			'priority'    => 40,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['our_sponsors_bg_color_element'],
					'property' => 'background',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'our_sponsors_arrow_color',
			'label'       => __( 'Arrow Color', 'goldy-mex' ),
			'section'     => 'our_sponsors_section',
			'default'     => $goldy_mex_themetype['our_sponsors_arrow_color'],
			'priority'    => 45,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['our_sponsors_arrow_color_element'],
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'our_sponsors_arrow_bg_color',
			'label'       => __( 'Arrow Background Color', 'goldy-mex' ),
			'section'     => 'our_sponsors_section',
			'default'     => $goldy_mex_themetype['our_sponsors_arrow_bg_color'],
			'priority'    => 50,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['our_sponsors_arrow_bg_color_element'],
					'property' => 'background-color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'our_sponsors_arrow_text_hover_color',
			'label'       => __( 'Arrow Text Hover Color', 'goldy-mex' ),
			'section'     => 'our_sponsors_section',
			'default'     => $goldy_mex_themetype['our_sponsors_arrow_text_hover_color'],
			'priority'    => 55,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['our_sponsors_arrow_text_hover_color_element'],
					'property' => 'color',
				),
			),
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'our_sponsors_arrow_bghover_color',
			'label'       => __( 'Arrow Background Hover Color', 'goldy-mex' ),
			'section'     => 'our_sponsors_section',
			'default'     => $goldy_mex_themetype['our_sponsors_arrow_bghover_color'],
			'priority'    => 60,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['our_sponsors_arrow_bghover_color_element'],
					'property' => 'background-color',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'goldy_mex_our_sponsors_slider_autoplay',
			'label'       => esc_html__( 'Autoplay', 'goldy-mex' ),
			'section'     => 'our_sponsors_section',
			'priority' 	  => 65,
			'default'     => 'true',
			'placeholder' => esc_html__( 'Choose an option', 'goldy-mex' ),
			'choices'     => [
				'true' => esc_html__( 'True', 'goldy-mex' ),
				'false' => esc_html__( 'False', 'goldy-mex' ),
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'goldy_mex_our_sponsors_slider_autoplay_speed',
			'label'    => esc_html__( 'AutoplaySpeed', 'goldy-mex' ),
			'section'  => 'our_sponsors_section',
			'default'  => esc_html__( '1000', 'goldy-mex' ),
			'priority' => 70,
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'goldy_mex_our_sponsors_autoplay_timeout',
			'label'    => esc_html__( 'AutoplayTimeout', 'goldy-mex' ),
			'section'  => 'our_sponsors_section',
			'default'  => esc_html__( '5000', 'goldy-mex' ),
			'priority' => 75,
		]
	);
?>