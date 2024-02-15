/**
 * This will enable the hash linking to other page without poping the page first and scroll. It will directly scroll the to targeted section.
 */
jQuery(document).ready(function ($) {
  if (window.location.hash && $(window.location.hash).length) {
    var target = $(window.location.hash);
    $("html, body").animate(
      {
        scrollTop: target.offset().top,
      },
      1000
    ); // Adjust the animation speed if needed
  }
});
