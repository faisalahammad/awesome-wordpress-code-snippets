(function ($) {
  jQuery(window).on("load", function ($) {
    $("li.dontClick a").attr("href", "javascript: void(0)");
  });
})(jQuery);
