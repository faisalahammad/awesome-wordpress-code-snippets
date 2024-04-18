/**
 * Autoplay audio in Divi website
 */
jQuery(document).ready(function () {
  setTimeout(function () {
    jQuery(".custom-autoplay .mejs-playpause-button button").trigger("click");
    jQuery(".custom-autoplay audio").attr("loop", true);
  }, 500);
});
