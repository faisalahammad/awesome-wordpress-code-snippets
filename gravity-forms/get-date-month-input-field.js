/**
 * Gravity Forms Get Date Month Input Field
 * User will type 02/12 and it'll validate the date in Single Line Text field.
 */

jQuery(document).ready(function ($) {
  $(".custom_birthday_date").on("input", function () {
    var inputVal = $(this).val();
    var isValid = validateDate(inputVal);

    if (!isValid) {
      $(this).addClass("error");
    } else {
      $(this).removeClass("error");
    }
  });

  function validateDate(dateString) {
    // Check if string length is less than 5
    if (dateString.length < 5) {
      return false;
    }

    // Check if the first 2 characters represent a valid day (01-31)
    var day = parseInt(dateString.substring(0, 2));
    if (isNaN(day) || day < 1 || day > 31) {
      return false;
    }

    // Check if the third character is "/"
    if (dateString.charAt(2) !== "/") {
      return false;
    }

    // Check if the last 2 characters represent a valid month (01-12)
    var month = parseInt(dateString.substring(3, 5));
    if (isNaN(month) || month < 1 || month > 12) {
      return false;
    }

    return true;
  }
});
