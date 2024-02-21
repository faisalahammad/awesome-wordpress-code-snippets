/**
 * @param speed = 300
 * change the value to control the speed
 */

(function ($) {
  jQuery(document).ready(function () {
    window.et_pb_smooth_scroll = function (
      $target,
      $top_section,
      speed,
      easing
    ) {
      var $window_width = jQuery(window).width();
      $menu_offset = -1;
      var headerHeight = 130;
      if (jQuery("#wpadminbar").length) {
        $menu_offset += $("#wpadminbar").outerHeight() + headerHeight;
      } else {
        $menu_offset += headerHeight;
      }
      //fix sidenav scroll to top
      if ($top_section) {
        $scroll_position = 0;
      } else {
        $scroll_position = $target.offset().top - $menu_offset;
      }
      // set swing (animate's scrollTop default) as default value
      if (typeof easing === "undefined") {
        easing = "swing";
      }
      speed = 300;
      jQuery("html, body").animate(
        {
          scrollTop: $scroll_position,
        },
        speed,
        easing
      );
    };
  });
})(jQuery);
