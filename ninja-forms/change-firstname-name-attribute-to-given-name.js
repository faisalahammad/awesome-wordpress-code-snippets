/**
 * Ninja Forms - Change First Name "Name" Attribute to "Given Name"
 */

jQuery(document).ready(function ($) {
  $(".firstname-container .firstname-wrap input").attr("autocomplete", "given-name");
});
