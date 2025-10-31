<?php
/**
 * Plugin Name: Gutenberg Block - ACF Pro Addon
 * Text Domain: gutenberg-block-acf-pro-addon
 * Description: Plugin that integrates predefined Gutenberg blocks, work with ACF Pro plugin.
 * Version: 1.0
 * Requires at least: 6.4
 * Requires PHP: 7.2
 * Author: Yogesh Kumar Rajput
 * Author URI: https://www.linkedin.com/in/yogesh-kumar-656b421b/
 * Tested up to: 6.7.1

 **/


if(!defined('ABSPATH')) {
	exit;
}

DEFINE('EGY_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
DEFINE('EGY_PLUGIN_URL', plugin_dir_url( __FILE__ ));

//Check to see if ACF Pro is active.
function egyacf_blocks_has_parent_plugin() {
	if ( is_admin() && current_user_can( 'activate_plugins' ) && ( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) ) {

		if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php') ){
			add_action( 'admin_notices', 'egyacf_blocks_parent_plugin_notice' );
		}

		deactivate_plugins( plugin_basename( __FILE__ ) );

	}
}
add_action( 'admin_init', 'egyacf_blocks_has_parent_plugin' );


//Provide a notice message if the parent plugin has been deactivated.
function egyacf_blocks_parent_plugin_notice() { ?>
	<div class="error">
		<p>Gutenberg Block - ACF Pro Addon has been deactivated because Advanced Custom Fields Pro 6.0+ has been deactivated. Advanced Custom Fields Pro 6.0+ must be active in order for you to use Gutenberg Block - ACF Pro Addon.</p>
	</div>
	<?php
}


 //register block
 function egyacf_register_block(){
	//auto popup block
	include_once(EGY_PLUGIN_PATH . "blocks/hero-banner/block.php");

	//auto popup block
    include_once(EGY_PLUGIN_PATH . "blocks/auto-popup/block.php");

	//carousal block
    include_once(EGY_PLUGIN_PATH . "blocks/carousel/block.php");

	//accordion block
    include_once(EGY_PLUGIN_PATH . "blocks/accordion/block.php");

	//countdown block
    include_once(EGY_PLUGIN_PATH . "blocks/countdown/block.php");

	//Action popup block
    include_once(EGY_PLUGIN_PATH . "blocks/action-popup/block.php");
 }
 add_action( 'init', 'egyacf_register_block' );

 include_once(EGY_PLUGIN_PATH . "inc/register-block-category.php");
