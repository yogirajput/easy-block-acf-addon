<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//acf block define
register_block_type( EG_PLUGIN_PATH . "blocks/auto-popup/block.json" );

//assets loading
function egacf_auto_pupup_enqueue_block_assets() {
	wp_register_style( 'egacf-auto-popup-style', EG_PLUGIN_URL . "/blocks/auto-popup/eg-auto-popup-style.css", "", time() );
	wp_enqueue_style( 'egacf-auto-popup-style');

	wp_register_script( 'egacf-auto-popup-script', EG_PLUGIN_URL . "/blocks/auto-popup/eg-auto-popup-script.js", [ 'jquery', 'acf' ],time(),true );
	wp_enqueue_script('egacf-auto-popup-script');

	if (is_admin()) {
		wp_register_style( 'egacf-auto-popup-admin-style', EG_PLUGIN_URL . "/blocks/auto-popup/eg-auto-popup-admin.css", "", time() );
		wp_enqueue_style( 'egacf-auto-popup-admin-style');
	}
}

function egacf_auto_pupup_assets( $block_content, $block ) {
	// Check if the specific block is being rendered
    if ( 'acf/eg-auto-popup' === $block['blockName']) {
		egacf_auto_pupup_enqueue_block_assets();
	}
	return $block_content;
}
add_filter( 'render_block', 'egacf_auto_pupup_assets', 10, 2 );

//loading assets for admin
add_action( 'admin_enqueue_scripts', 'egacf_auto_pupup_enqueue_block_assets' );


//acf backend field adding
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( array(
	'key' => 'group_636deeaa13d71',
	'title' => 'Easy Gutenberg - Auto Popup',
	'fields' => array(
		array(
			'key' => 'field_636deeaa80c0d',
			'label' => 'Popup Content',
			'name' => 'popup_content',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'pagination' => 0,
			'min' => 0,
			'max' => 2,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_636def1c3a2c3',
					'label' => 'Title',
					'name' => 'title',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_636deeaa80c0d',
				),
				array(
					'key' => 'field_636def243a2c4',
					'label' => 'Content',
					'name' => 'content',
					'aria-label' => '',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
					'parent_repeater' => 'field_636deeaa80c0d',
				),
			),
		),
		array(
			'key' => 'field_6721daa6bf9de',
			'label' => 'Popup load delay (in milliseconds)',
			'name' => 'popup_time_in_milliseconds',
			'aria-label' => '',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 1000,
			'min' => '',
			'max' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'step' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/eg-auto-popup',
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

