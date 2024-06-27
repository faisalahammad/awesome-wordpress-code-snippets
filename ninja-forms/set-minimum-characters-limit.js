/**
 * Ninja Forms - Set Minimum Characters Limit
 * @author Faisal Ahammad
 * Use the "setminlength" CSS class to the "Field Settings → Display → Element" to make it work.
 */

jQuery(document).ready(function ($) {
  setTimeout(function () {
    var $targetedFields = $(".setminlength");
    var $submitButton = $(".submit-wrap input[type='submit']");
    var minLength = 100;

    function checkAllRequiredFields() {
      var allRequiredFieldsValid = true;
      $targetedFields.filter('[aria-required="true"]').each(function () {
        if ($(this).val().length < minLength) {
          allRequiredFieldsValid = false;
          return false; // break the loop
        }
      });
      $submitButton.prop("disabled", !allRequiredFieldsValid);
    }

    $targetedFields.each(function (index) {
      var $field = $(this);
      var fieldId = $field.attr("id");
      var fieldTouched = false;

      // Add minlength attribute to the field
      $field.attr("minlength", minLength);

      // Add character count display
      $field.after('<small id="char-count-' + fieldId + '">0/' + minLength + " characters</small>");

      // Function to update character count and validate
      function updateCountAndValidate() {
        var charCount = $field.val().length;
        $("#char-count-" + fieldId).text(charCount + "/" + minLength + " characters");

        if (fieldTouched && charCount > 0 && charCount < minLength) {
          $field.css("border", "2px solid red");
        } else {
          $field.css("border", "");
        }

        checkAllRequiredFields();
      }

      // Initial call to set up the form
      updateCountAndValidate();

      // Update on keyup
      $field.on("keyup", function () {
        fieldTouched = true;
        updateCountAndValidate();
      });

      // Check on blur
      $field.on("blur", updateCountAndValidate);

      // Reset fieldTouched on focus
      $field.on("focus", function () {
        fieldTouched = false;
      });
    });

    // Initial check for all required fields
    checkAllRequiredFields();
  }, 500); // 500ms delay
});
