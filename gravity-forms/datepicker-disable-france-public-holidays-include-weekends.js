/**
 * Disable France public holidays including weekends in datepicker
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

jQuery(document).ready(function ($) {
  gform.addFilter(
    "gform_datepicker_options_pre_init",
    function (optionsObj, formId, fieldId) {
      if (formId == 1 && fieldId == 24) {
        optionsObj.firstDay = 1;
        optionsObj.minDate = 2;

        optionsObj.beforeShowDay = function (date) {
          var disabledDays = [
            "04/21",
            "05/01",
            "05/08",
            "05/29",
            "07/14",
            "08/15",
            "11/01",
            "11/11",
            "12/25",
          ];
          var checkdate = jQuery.datepicker.formatDate("mm/dd", date);

          // Check both weekends and holidays
          var isWeekend = jQuery.datepicker.noWeekends(date)[0] === false;
          var isHoliday = disabledDays.indexOf(checkdate) !== -1;

          return [!isWeekend && !isHoliday];
        };
      }
      return optionsObj;
    }
  );
});
