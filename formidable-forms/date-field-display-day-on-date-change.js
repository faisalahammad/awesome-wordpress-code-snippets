/**
 * Formidable Forms - Date field display day on date change
 * Source: https://formidable-masterminds.com/display-day-name-on-date-field-change/
 */

jQuery(document).ready(function ($) {
  "use strict";

  $("#field_2dctc").on("change", function () {
    const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    var selected_date = new Date($(this).val());

    $("#field_2dctc").val(days[selected_date.getDay()]);
  });
});
