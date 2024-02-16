/**
 * add mute_video class to the video module
 */
jQuery(document).ready(function ($) {
  $(".mute_video iframe").each(function () {
    $(this).closest(".autoplay").find(".et_pb_video_overlay").hide();
    $(this).attr("src", function (i, val) {
      return val + "&rel=0&mute=1&autoplay=1&loop=1";
    });
  });
});
