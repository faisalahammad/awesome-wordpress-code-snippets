/**
 * Ninja Forms - Disable Past Dates in Advanced Date Picker
 * @author Faisal Ahammad
 */

jQuery(document).ready(function ($) {
  var customDatePicker = Marionette.Object.extend({
    initialize: function () {
      this.listenTo(Backbone.Radio.channel("flatpickr"), "init", this.modifyDatepicker);
    },
    modifyDatepicker: function (dateObject, fieldModel) {
      var currentDate = new Date();
      dateObject.set("minDate", currentDate);
    },
  });

  new customDatePicker();
});
