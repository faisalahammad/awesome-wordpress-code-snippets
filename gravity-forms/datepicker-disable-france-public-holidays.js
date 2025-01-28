/**
 * Disable France public holidays in datepicker
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

jQuery(document).ready(function ($) {
  gform.addFilter("gform_datepicker_options_pre_init", function (optionsObj, formId, fieldId) {
    // Update your form ID and field ID here
    if (formId == 1 && fieldId == 30) {
      optionsObj.beforeShowDay = function (date) {
        var disabledDays = ["04/21", "05/01", "05/08", "05/29", "07/14", "08/15", "11/01", "11/11", "12/25"];

        var checkdate = jQuery.datepicker.formatDate("mm/dd", date);

        return [disabledDays.indexOf(checkdate) == -1];
      };
    }
    return optionsObj;
  });
});
