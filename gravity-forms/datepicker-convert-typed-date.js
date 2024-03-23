/**
 * Convert typed date in Date input field (datepicker) into valid date format.
 * Date format must have to set to mm/dd/yyyy from the Date field settings.
 *
 * @package Gravity Forms
 */

jQuery(document).ready(function ($) {
  $(".datepicker").on("input", function () {
    var inputValue = $(this).val();

    if (inputValue.length === 8) {
      var month = inputValue.substring(0, 2);
      var date = inputValue.substring(2, 4);
      var year = inputValue.substring(4, 8);

      if (parseInt(month) > 12) {
        $(this).css("border", "2px solid red");
        return;
      } else {
        $(this).css("border", "");
      }

      var formattedDate = month + "/" + date + "/" + year;
      $(this).val(formattedDate);
    }
  });

  $(".datepicker").on("blur", function () {
    var inputValue = $(this).val();
    var month = inputValue.substring(0, 2);

    if (parseInt(month) > 12) {
      $(this).css("border", "2px solid red");
    } else {
      $(this).css("border", "");
    }
  });
});
