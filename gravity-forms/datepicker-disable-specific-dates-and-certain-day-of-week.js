/**
 * Gravity Forms - Datepicker Disable Specific Dates and Certain Day of Week
 * Source: https://docs.gravityforms.com/gform_datepicker_options_pre_init/
 */

gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
  if (formId == 149 && fieldId == 2) {
    optionsObj.firstDay = 1;
    optionsObj.beforeShowDay = function (date) {
      var disabledDays = ["06/15/2015", "06/16/2015", "06/18/2015"],
        currentDate = jQuery.datepicker.formatDate("mm/dd/yy", date),
        day = date.getDay();

      return [!(disabledDays.indexOf(currentDate) != -1 || day == 3)];
    };
  }

  return optionsObj;
});
