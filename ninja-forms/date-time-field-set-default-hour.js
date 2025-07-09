/**
 * Set default hour to 09:00 for date/time fields in Ninja Forms
 *
 * @author Faisal Ahammad <me@faisalahammad.com>
 *
 * First add the "setdefaulttime" CSS class in the Date/Time → Display → Container to make this code work.
 */

jQuery(document).ready(function ($) {
  function checkAndSetHour() {
    if ($(".setdefaulttime").length === 0) {
      setTimeout(checkAndSetHour, 100);
      return;
    }
    var $select = $('select[id^="hour-select-"], select.hour.extra');
    $select.each(function () {
      $(this).find('option[value="09"]').prop("selected", true);
    });
  }
  checkAndSetHour();
});
