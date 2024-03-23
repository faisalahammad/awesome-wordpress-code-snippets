/**
 * Gravity forms number format in swiss
 * By default Gravity Forms only allow to use the predefined number format in Number input field and you can have custom currency format.
 * So to have custom number format, you'll need some custom coding and have to use the "Single Line Text" field type.
 * Ensure to use the "totalkg" custom CSS class in the field settings.
 */

// Only number format without decimal.
jQuery(document).ready(function ($) {
  $(".totalkg input").on("blur", function () {
    $(this).val(formatSwissNumber($(this).val()));
  });

  function formatSwissNumber(number) {
    number = number.replace(/[^\d,]/g, "");
    number = parseFloat(number.replace(",", "."));
    if (isNaN(number)) {
      return "";
    }
    return Math.round(number).toLocaleString("de-CH").replace(".", "'");
  }
});

// Number format with decimal.
jQuery(document).ready(function ($) {
  $(".totalkg input").on("blur", function () {
    $(this).val(formatSwissNumber($(this).val()));
  });

  function formatSwissNumber(number) {
    number = number.replace(/[^\d,]/g, "");
    number = parseFloat(number.replace(",", "."));
    if (isNaN(number)) {
      return "";
    }
    number = Math.round(number * 100) / 100;
    return number
      .toLocaleString("de-CH", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
      })
      .replace(".", ",");
  }
});
