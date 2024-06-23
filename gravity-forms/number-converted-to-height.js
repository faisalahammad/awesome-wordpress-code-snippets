/**
 * Gravity Forms - Number Converted To Height Value
 * @author Faisal Ahammad
 * Ticket: https://community.gravityforms.com/t/trying-to-turn-a-field-into-height-59/17659
 */

jQuery(document).ready(function ($) {
  $(".numbertofeet .ginput_container input").on("blur", function () {
    var input = $(this).val().replace(/\D/g, ""); // Remove non-digit characters
    var feet, inches, formattedHeight;

    if (input.length === 1) {
      feet = input;
      inches = "0";
    } else if (input.length === 2) {
      feet = input.charAt(0);
      inches = input.charAt(1);
    } else if (input.length === 3) {
      feet = input.charAt(0);
      inches = input.substring(1);
    } else if (input.length >= 4) {
      feet = input.substring(0, 2);
      inches = input.substring(2);
    } else {
      feet = "0";
      inches = "0";
    }

    formattedHeight = feet + "'" + inches + '"';
    $(this).val(formattedHeight);
  });

  // Convert back to numbers on focus for editing
  $(".numbertofeet .ginput_container input").on("focus", function () {
    var value = $(this).val();
    var numericValue = value.replace(/\D/g, "");
    $(this).val(numericValue);
  });
});
