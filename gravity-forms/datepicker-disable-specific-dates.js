/**
 * Gravity Forms - Datepicker Disable Specific Dates
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  if (formId == 12 && fieldId == 14) {
    var disabledDays = ["06/15/2014", "07/01/2014", "07/15/2014"];
    optionsObj.beforeShowDay = function (date) {
      var checkdate = jQuery.datepicker.formatDate("mm/dd/yy", date);
      return [disabledDays.indexOf(checkdate) == -1];
    };
  }
  return optionsObj;
});
