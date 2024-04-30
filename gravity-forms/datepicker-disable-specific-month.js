/**
 * Gravity Forms - Datepicker Disable Specific Month
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  if (formId == 1744 && fieldId == 1) {
    // Months to disable (0 for January, 1 February, etc...)
    monthsDisabled = [0, 3, 6];

    optionsObj.beforeShowDay = function (date) {
      if (jQuery.inArray(date.getMonth(), monthsDisabled) > -1) {
        return [false, ""];
      }

      return [true, ""];
    };
  }

  return optionsObj;
});
