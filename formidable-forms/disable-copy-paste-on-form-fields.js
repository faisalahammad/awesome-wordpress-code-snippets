/**
 * Disable copy and paste on form fields
 * Ensure to change the #frm_form_1_container form ID to your own form ID
 */

jQuery(document).ready(function ($) {
  $("#frm_form_1_container input, #frm_form_1_container textarea").on(
    "copy paste",
    function (e) {
      e.preventDefault();
    }
  );

  $("#frm_form_1_container input, #frm_form_1_container textarea").on(
    "contextmenu",
    function (e) {
      e.preventDefault();
    }
  );
});
