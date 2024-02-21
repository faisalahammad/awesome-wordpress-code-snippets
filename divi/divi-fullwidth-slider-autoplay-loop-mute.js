/**
 * Change the autoplay, loop and muted value from true to false to disable
 * The "myVideo" CSS class needs to add on the Section Settings → Advanced → CSS ID → Classes → CSS Class.
 */

(function ($) {
  jQuery(document).ready(function () {
    if (jQuery(".myVideo").length) {
      jQuery(".myVideo .et_pb_slide:first-child video").prop({
        autoplay: true,
        loop: true,
        muted: true,
      });

      setTimeout(function () {
        jQuery(".myVideo .et_pb_slide").each(function () {
          jQuery(this).find("video").prop({
            autoplay: true,
            loop: true,
            muted: true,
          });
        });
      }, 300);
    }
  });
})(jQuery);
