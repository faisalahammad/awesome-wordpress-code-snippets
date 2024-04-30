/**
 * Gravity Forms - Datepicker Allow Only Weekend
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  if (formId == 12 && fieldId == 1) {
    optionsObj.firstDay = 1;
    optionsObj.beforeShowDay = function (date) {
      var day = date.getDay();
      return [day == 0 || day == 6];
    };
  }
  return optionsObj;
});
