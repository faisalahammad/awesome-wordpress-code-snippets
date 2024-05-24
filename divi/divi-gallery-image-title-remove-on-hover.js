/**
 * Divi - Remove image title on hover
 * @package Divi v4.x
 */

jQuery(document).ready(function ($) {
  $(".remove_img_title .et_pb_gallery_image a").each(function () {
    $(this).removeAttr("title");
  });
});
