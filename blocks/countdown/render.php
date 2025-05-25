<?php

/**
 * Countdown Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'countdown';
if( !empty($block['className']) ) {
  $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
  $className .= ' align' . $block['align'];
}

// Check For A Preview Image
if (!empty($block['data']['_is_preview'])) {  ?>
  <!-- Block Preview Image -->
  <figure>
      <img src="<?php echo esc_url(EGY_PLUGIN_URL); ?>/blocks/countdown/images/preview.png" alt="Preview">
  </figure>
  <?php return;
} ?>
<!-- countdown start -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div id="timer" date="<?php if (get_field('counter_date')) : the_field('counter_date'); else: ?>30 October 2025 6:00:00<?php endif; ?>" timezone="<?php if (get_field('counter_timezone')) : the_field('counter_timezone'); else: ?>GMT+04:00<?php endif; ?>">
    <div id="days" <?php if (get_field('days_color')) :?>style="color:<?php the_field('days_color'); ?>"<?php endif; ?>>...<span>Days</span></div>
    <div id="hours" <?php if (get_field('hours_color')) :?>style="color:<?php the_field('hours_color'); ?>"<?php endif; ?>>...<span>Hours</span></div>
    <div id="minutes" <?php if (get_field('minutes_color')) :?>style="color:<?php the_field('minutes_color'); ?>"<?php endif; ?>>...<span>Minutes</span></div>
    <div id="seconds" <?php if (get_field('seconds_color')) :?>style="color:<?php the_field('seconds_color'); ?>"<?php endif; ?>>...<span>Seconds</span></div>
  </div>
</section>
<!-- countdown end -->