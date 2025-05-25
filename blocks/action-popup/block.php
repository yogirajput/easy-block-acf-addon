<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//acf block define
register_block_type( EG_PLUGIN_PATH . "blocks/action-popup/block.json" );

//assets loading
function egacf_action_popup_enqueue_block_assets() {
	wp_register_style( 'egacf-action-popup-style', EG_PLUGIN_URL . "/blocks/action-popup/eg-action-popup-style.css", "", time() );
	wp_enqueue_style( 'egacf-action-popup-style');

	wp_register_script( 'egacf-action-popup-script', EG_PLUGIN_URL . "/blocks/action-popup/eg-action-popup-script.js", [ 'jquery', 'acf' ],time(),true );
	wp_enqueue_script('egacf-action-popup-script');

	if (is_admin()) {
		wp_register_style( 'egacf-action-popup-admin-style', EG_PLUGIN_URL . "/blocks/action-popup/eg-action-popup-admin.css", "", time() );
		wp_enqueue_style( 'egacf-action-popup-admin-style');
	}
}

function egacf_action_popup_assets( $block_content, $block ) {
	// Check if the specific block is being rendered
    if ( 'acf/eg-action-popup' === $block['blockName']) {
		egacf_action_popup_enqueue_block_assets();
	}
	return $block_content;
}
add_filter( 'render_block', 'egacf_action_popup_assets', 10, 2 );

//loading assets for admin
add_action( 'admin_enqueue_scripts', 'egacf_action_popup_enqueue_block_assets' );


//acf backend field adding
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}
acf_add_local_field_group( array(
	'key' => 'group_63747549efb7a',
	'title' => 'Easy Gutenberg – Action Popup',
	'fields' => array(
		array(
			'key' => 'field_6374756d47e0b',
			'label' => 'Popup class',
			'name' => 'popup_class',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'Popup class name, apply it to your action button.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6554af66b8bd7',
			'label' => 'Background color',
			'name' => 'background_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
			'allow_in_bindings' => 1,
		),
		array(
			'key' => 'field_6791e621c1f91',
			'label' => 'Text color',
			'name' => 'text_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'enable_opacity' => 0,
			'return_format' => 'string',
			'allow_in_bindings' => 1,
		),
		array(
			'key' => 'field_6374754a47e09',
			'label' => 'Popup title',
			'name' => 'popup_title',
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
			'allow_in_bindings' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6374755d47e0a',
			'label' => 'Popup content',
			'name' => 'popup_content',
			'aria-label' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'allow_in_bindings' => 1,
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
		array(
			'key' => 'field_6554aa0745209',
			'label' => 'Popup images',
			'name' => 'popup_images',
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
			'layout' => 'table',
			'pagination' => 0,
			'min' => 0,
			'max' => 2,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_6554aa1e4520a',
					'label' => 'Image',
					'name' => 'popup_image',
					'aria-label' => '',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
					'preview_size' => 'medium',
					'parent_repeater' => 'field_6554aa0745209',
				),
			),
		),
		array(
			'key' => 'field_6791e965cc7e4',
			'label' => 'Popup height',
			'name' => 'popup_height',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'Eg: 400px',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '400px',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '400px',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_679224962c298',
			'label' => 'Popup width',
			'name' => 'popup_width',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => 'Eg: 900px',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '900px',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '900px',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6554aa64d330a',
			'label' => 'Popup button',
			'name' => 'popup_button',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6554aa77d330b',
			'label' => 'Popup button URL',
			'name' => 'popup_button_url',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_6554aa64d330a',
						'operator' => '!=empty',
					),
				),
			),
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_655757e47ab79',
			'label' => 'Popup animation',
			'name' => 'popup_animation',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '33',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'fade-in' => 'Fade In',
				'slide-in' => 'Slide In',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'allow_in_bindings' => 1,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/eg-action-popup',
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