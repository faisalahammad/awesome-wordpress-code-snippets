/**
 * Divi - Hide the feature image for video post
 */
jQuery(document).ready(function ($) {
  if ($(".entry-content .et_pb_video_box").length) {
    $(".et_post_meta_wrapper img").hide();
  }
});
