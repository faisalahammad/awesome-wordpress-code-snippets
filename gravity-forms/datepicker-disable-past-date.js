/**
 * Gravity Forms - Datepicker Disable Past Date
 * Source: https://community.gravityforms.com/t/disable-past-dates-from-datepicker/17379
 * Main Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/#h-9-disable-past-dates
 */
gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  // Add your own field ID
  if (fieldId == 2) {
    optionsObj.minDate = 0;
  }
  return optionsObj;
});
