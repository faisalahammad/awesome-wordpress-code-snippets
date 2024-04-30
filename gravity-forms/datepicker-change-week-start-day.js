/**
 * Gravity Forms - Datepicker Change Week Start Day
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  // Sunday is 0, Monday is 1, etc.
  optionsObj.firstDay = 1;
  return optionsObj;
});
