<?php
/**
 * Action Popup Block Template.
 *
 * @param	array $block The block settings and attributes.
 * @param	string $content The block inner HTML (empty).
 * @param	bool $is_preview True during AJAX preview.
 * @param	(int|string) $post_id The post ID this block is saved to.
 */
 
// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'egacf-action-popup-block';
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
        <img src="<?php echo esc_url(EG_PLUGIN_URL); ?>/blocks/action-popup/images/pop-preview.png" alt="Preview">
    </figure>
    <?php return;
} 

?>

<!-- Popup Start -->
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php the_field('popup_animation'); ?>" data-class="<?php the_field('popup_class'); ?>">
    <div class="container scroll-style" style="<?php if (get_field('popup_width')): ?>width: <?php the_field('popup_width'); ?>;<?php endif; ?>">
        <div class="form-wrapper">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body" style="<?php if (get_field('background_color')): ?>background-color: <?php the_field('background_color'); ?>;<?php endif; ?>">
                <div class="egacf-action-popup-wrap egacf-image-count-<?php if( have_rows('popup_images') ): echo count(get_field('popup_images')); else: echo '1'; endif; ?>">
                    <?php if( have_rows('popup_images') ): ?>
                    <div class="egacf-action-popup-left">
					<?php while( have_rows('popup_images') ) : the_row(); ?>
                        <?php if (get_sub_field('popup_image')): ?>
                        <div class="egacf-action-popup-left-img" style="<?php if (get_field('popup_height')): ?>height: <?php the_field('popup_height'); ?>;<?php endif; ?>">
                            <img src="<?php the_sub_field('popup_image') ?>" alt="Popup Image">
						</div>
                        <?php endif; ?>
					<?php endwhile; ?>
					</div>
				    <?php endif; ?>
                    <div class="egacf-action-popup-right scroll-style" style="<?php if (get_field('popup_height')): ?>height: <?php the_field('popup_height'); ?>;<?php endif; ?>">
                        <?php if (get_field('popup_title')): ?>
                            <h4 class="egacf-action-popup-right-title"><?php the_field('popup_title'); ?></h4>
                        <?php endif; ?>
                        <?php echo do_shortcode(get_field('popup_content')); ?>
                        <?php if(get_field('popup_button')): ?>
                            <a class="button-style" href="<?php the_field('popup_button_url'); ?>" target="_blank"><?php the_field('popup_button'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php if(get_field('text_color')): ?>
  <style>
      .egacf-action-popup-right,
      .egacf-action-popup-right h1, 
      .egacf-action-popup-right h2, 
      .egacf-action-popup-right h3, 
      .egacf-action-popup-right h4, 
      .egacf-action-popup-right h5, 
      .egacf-action-popup-right h6,
      .egacf-action-popup-right p,
      .egacf-action-popup-right a,
      .egacf-action-popup-right li {
          color: <?php the_field('text_color'); ?> !important;
      }
      .egacf-action-popup-right .button-style{
            background-color: <?php the_field('text_color'); ?> !important;
            <?php if(get_field('background_color')): ?>
            color: <?php the_field('background_color'); ?> !important;
            <?php endif; ?>
      }
  </style>
<?php endif; ?>

<!-- Popup End -->