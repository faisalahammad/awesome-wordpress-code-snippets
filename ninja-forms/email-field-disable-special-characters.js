/**
 * Ninja Forms - Disable Special Characters From Email Field
 * @author Faisal Ahammad
 * Source: https://developer.ninjaforms.com/codex/client-side-field-validation/
 */

// Create a new object for custom validation of Email field
var myCustomFieldController = Marionette.Object.extend({
  initialize: function () {
    // On the Form Submission's field validation...
    var submitChannel = Backbone.Radio.channel("submit");
    this.listenTo(submitChannel, "validate:field", this.validateField);
    // on the Field's model value change...
    var fieldsChannel = Backbone.Radio.channel("fields");
    this.listenTo(fieldsChannel, "change:modelValue", this.validateField);
  },
  validateField: function (model) {
    // Only validate email fields
    if ("email" != model.get("type")) return;

    var value = model.get("value");

    // Check if the field is required and empty
    if (model.get("required") && !value) {
      Backbone.Radio.channel("fields").request("add:error", model.get("id"), "required-error", "This field is required");
      return;
    }

    // Check for special characters
    if (value && !this.isValidEmail(value)) {
      Backbone.Radio.channel("fields").request("add:error", model.get("id"), "invalid-email-error", "Email address contains invalid characters");
    } else {
      Backbone.Radio.channel("fields").request("remove:error", model.get("id"), "invalid-email-error");
    }
  },
  isValidEmail: function (email) {
    // This regex allows only letters, numbers, dots, and @ symbol
    var regex = /^[a-zA-Z0-9@.]+$/;
    return regex.test(email);
  },
});

// Run the code after Document Ready
jQuery(document).ready(function ($) {
  // Instantiate our custom field's controller, defined above.
  new myCustomFieldController();
});
