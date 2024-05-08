/**
 * Ensures Elementor accordions start closed on page load.
 *
 * This snippet removes the 'elementor-active' class from accordion titles 
 * and hides the content panels after a short delay, ensuring all accordions
 * begin in a collapsed state.
 */
jQuery(document).ready(function($) {
    var delay = 100; 
    setTimeout(function() {
        $('.elementor-tab-title').removeClass('elementor-active');
        $('.elementor-tab-content').css('display', 'none'); 
    }, delay);
});
