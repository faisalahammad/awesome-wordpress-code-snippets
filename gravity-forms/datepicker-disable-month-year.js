/**
 * Gravity Forms - Datepicker Disable Month and Year
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  if (formId == 381 && fieldId == 2) {
    // Update form and field id in this line
    optionsObj.changeMonth = false;
    optionsObj.changeYear = false;
  }
  return optionsObj;
});
