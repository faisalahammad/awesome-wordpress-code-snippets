/**
 * Divi - Load Button in mobile menu
 * @package Divi v4.x.x
 */

jQuery(document).ready(function ($) {
  $(window).on("load", function () {
    $("a.et_pb_button.et_pb_button_0_tb_header.et_pb_bg_layout_light").addClass("myphone");

    let getWidth = $(window).width();
    if (getWidth <= 480) {
      let getData = '<a class="et_pb_button et_pb_button_0_tb_header et_pb_bg_layout_light myphone" href="/contact">Call (910) 295-2828</a>';
      $("ul#mobile_menu1").append('<li class="myCta">' + getData + "<li>");
    }
  });
});
