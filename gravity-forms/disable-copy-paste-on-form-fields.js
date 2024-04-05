/**
 * Disable copy and paste on form fields
 * Ensure to change the #gform_1 form ID to your own form ID
 */

jQuery(document).ready(function ($) {
  $("#gform_1 input, #gform_1 textarea").on("copy paste", function (e) {
    e.preventDefault();
  });

  $("#gform_1 input, #gform_1 textarea").on("contextmenu", function (e) {
    e.preventDefault();
  });
});
