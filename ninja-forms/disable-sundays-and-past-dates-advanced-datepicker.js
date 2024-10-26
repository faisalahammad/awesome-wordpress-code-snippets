/**
 * Ninja Forms - Disable Past Dates and Sundays in Advanced Datepicker
 * @author Faisal Ahammad
 */

jQuery(document).ready(function ($) {
  function initCustomDatePicker() {
    var customDatePicker = Marionette.Object.extend({
      initialize: function () {
        this.listenTo(Backbone.Radio.channel("flatpickr"), "init", this.modifyDatepicker);
      },
      modifyDatepicker: function (dateObject, fieldModel) {
        var currentDate = new Date();
        currentDate.setDate(currentDate.getDate() + 1); // Allow only future dates

        // Disable Sundays
        dateObject.set("disable", [
          function (date) {
            return date.getDay() === 0;
          },
        ]);

        dateObject.set("minDate", currentDate);
      },
    });

    new customDatePicker();
  }

  // Form ID (185) to apply the code on a specific form
  if ($("#nf-form-185-cont").length) {
    initCustomDatePicker();
  } else {
    var observer = new MutationObserver(function (mutations, observerInstance) {
      if ($("#nf-form-185-cont").length) {
        initCustomDatePicker();
        observerInstance.disconnect();
      }
    });

    observer.observe(document.body, { childList: true, subtree: true });
  }
});
