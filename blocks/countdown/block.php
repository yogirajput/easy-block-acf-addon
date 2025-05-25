<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//acf block define
register_block_type( EGY_PLUGIN_PATH . "blocks/countdown/block.json" );

//assets loading
function egyacf_countdown_enqueue_block_assets() {
	wp_register_style( 'egyacf-countdown-style', EG_PLUGIN_URL . "/blocks/countdown/eg-countdown-style.css", "", time() );
	wp_enqueue_style( 'egyacf-countdown-style');

	wp_register_script( 'egyacf-countdown-script', EG_PLUGIN_URL . "/blocks/countdown/eg-countdown-script.js", [ 'jquery', 'acf' ],time(),true );
	wp_enqueue_script('egyacf-countdown-script');
}

function egyacf_countdown_assets( $block_content, $block ) {
	// Check if the specific block is being rendered
    if ( 'acf/eg-countdown' === $block['blockName']) {
		egyacf_countdown_enqueue_block_assets();
	}
	return $block_content;
}
add_filter( 'render_block', 'egyacf_countdown_assets', 10, 2 );

//loading assets for admin
add_action( 'admin_enqueue_scripts', 'egyacf_countdown_enqueue_block_assets' );


//acf backend field adding
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}
acf_add_local_field_group( array(
	'key' => 'group_67355308b6307',
	'title' => 'Easy Gutenberg – Countdown',
	'fields' => array(
		array(
			'key' => 'field_6735530885c01',
			'label' => 'Counter date',
			'name' => 'counter_date',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'Format: 30 October 2025 6:00:00',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '30 October 2025 6:00:00',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_673559f8179ae',
			'label' => 'Counter timezone',
			'name' => 'counter_timezone',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'Format: GMT+04:00',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => 'GMT+04:00',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_67355bb4c18a7',
			'label' => 'Days color',
			'name' => 'days_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_67355bcac18a8',
			'label' => 'Hours color',
			'name' => 'hours_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_67355bd9c18a9',
			'label' => 'Minutes color',
			'name' => 'minutes_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_67355bf8c18aa',
			'label' => 'Seconds color',
			'name' => 'seconds_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '25',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
			'allow_in_bindings' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/eg-countdown',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );