jQuery(document).ready(function ($) {
  if (navigator.userAgent.toLowerCase().indexOf("chrome") > -1) {
    $(".gr_browser_ie")
      .addClass("gf_browser_chrome")
      .removeClass("gr_browser_ie");
  }
});
