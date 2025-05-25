jQuery(document).ready(function(jQuery) {

    if(jQuery('body').find('.egacf-action-popup-block').length > 0)
    {
        jQuery('body').find('.egacf-action-popup-block').each(function( index ) {
            
            var btn_class = jQuery(this).attr('data-class');

            jQuery("body").on('click', '.'+btn_class, function (e) {
                e.preventDefault();
                jQuery('body').find('.egacf-action-popup-block[data-class='+btn_class+']').addClass('egacf-popup-content-activate');
                setTimeout(function () {
                    jQuery('body').find('.egacf-action-popup-block[data-class='+btn_class+']').addClass('egacf-popup-content-bg');
                }, 200);
            });
        });

        jQuery("body").on('click', '.egacf-action-popup-block .close', function (e) {
            jQuery('body').find('.egacf-action-popup-block').removeClass('egacf-popup-content-bg');
            jQuery('body').find('.egacf-action-popup-block').removeClass('egacf-popup-content-activate');
        });
    }
});