/**
 * Ninja Forms - Disable Special Characters From Email Field
 * @author Faisal Ahammad
 * Source: https://developer.ninjaforms.com/codex/client-side-field-validation/
 */

var myCustomFieldController = Marionette.Object.extend({
  initialize: function () {
    var submitChannel = Backbone.Radio.channel("submit");
    this.listenTo(submitChannel, "validate:field", this.validateField);
    var fieldsChannel = Backbone.Radio.channel("fields");
    this.listenTo(fieldsChannel, "change:modelValue", this.validateField);
  },
  validateField: function (model) {
    if ("email" != model.get("type")) return;

    var value = model.get("value");

    if (model.get("required") && !value) {
      Backbone.Radio.channel("fields").request("add:error", model.get("id"), "required-error", "This field is required");
      return;
    }

    if (value && !this.isValidEmail(value)) {
      Backbone.Radio.channel("fields").request("add:error", model.get("id"), "invalid-email-error", "Email address contains invalid characters");
    } else {
      Backbone.Radio.channel("fields").request("remove:error", model.get("id"), "invalid-email-error");
    }
  },
  isValidEmail: function (email) {
    var regex = /^[a-zA-Z0-9@.]+$/;
    return regex.test(email);
  },
});

jQuery(document).ready(function ($) {
  new myCustomFieldController();
});
