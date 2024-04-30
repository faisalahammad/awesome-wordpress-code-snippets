/**
 * Gravity Forms - Datepicker Hide Dates in Other Months
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  // Turn off displaying of dates in other months (non-selectable).
  optionsObj.showOtherMonths = false;
  return optionsObj;
});
