/**
 * Gravity Forms - Datepicker Disallow Weekend
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  if (formId == 12 && fieldId == 6) {
    optionsObj.firstDay = 1;
    optionsObj.beforeShowDay = jQuery.datepicker.noWeekends;
  }
  return optionsObj;
});
