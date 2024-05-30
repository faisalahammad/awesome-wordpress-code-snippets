/**
 * Divi - Scroll Mobile Incorrect Position
 * @package Divi v4.x.x
 */

jQuery(function ($) {
  window.et_pb_smooth_scroll = function ($target, $top_section, speed, easing) {
    var $window_width = $(window).width();
    $menu_offset = -1;
    var headerHeight = 64;
    if ($window_width <= 980) {
      if ($("#wpadminbar").length) {
        $menu_offset += $("#wpadminbar").outerHeight() + headerHeight;
      } else {
        $menu_offset += headerHeight;
      }

      if ($top_section) {
        $scroll_position = 0;
      } else {
        $scroll_position = $target.offset().top - $menu_offset;
      }
      if (typeof easing === "undefined") {
        easing = "swing";
      }
      $("html, body").animate({ scrollTop: $scroll_position }, speed, easing);
    }
  };
});
