/**
 * Gravity Forms - Datepicker Disable Specific Days of Week
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  // Days to disable. Possible values from 0 (Sunday) to 6 (Saturday).
  daysDisabled = [0, 5]; // Disable Sunday and Friday.
  optionsObj.beforeShowDay = function (date) {
    if (jQuery.inArray(date.getDay(), daysDisabled) > -1) {
      return [false, ""];
    }
    return [true, ""];
  };

  return optionsObj;
});
