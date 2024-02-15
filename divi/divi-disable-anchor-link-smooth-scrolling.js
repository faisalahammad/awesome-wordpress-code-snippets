jQuery(document).ready(function () {
  var previousSmoothScroll = window.et_pb_smooth_scroll;
  window.et_pb_smooth_scroll = function ($target, $top_section, speed, easing) {
    previousSmoothScroll($target, $top_section, 0, "linear");
  };
});
