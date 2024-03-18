(function ($) {
  jQuery(document).ready(function () {
    setTimeout(function () {
      jQuery(".et_pb_gallery_pagination a").click(function () {
        jQuery("html,body").animate(
          {
            scrollTop: jQuery(".et_pb_gallery").offset().top - 2000,
          },
          700
        );
      });
    }, 500);
  });
})(jQuery);
