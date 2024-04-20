/**
 * Gravity Forms - Checkbox Select Two of One Option
 */
jQuery(document).ready(function ($) {
  // Event listener for checkbox A
  $('.disable_b .gchoice input[value="A"]').change(function () {
    if ($(this).is(":checked")) {
      $('.disable_b .gchoice input[value="B"]').prop("disabled", true);
    } else {
      $('.disable_b .gchoice input[value="B"]').prop("disabled", false);
    }
  });

  // Event listener for checkbox B
  $('.disable_b .gchoice input[value="B"]').change(function () {
    if ($(this).is(":checked")) {
      $('.disable_b .gchoice input[value="A"]').prop("disabled", true);
    } else {
      $('.disable_b .gchoice input[value="A"]').prop("disabled", false);
    }
  });
});
