/**
 * Ninja Forms - Add URL Field with Validation
 * @author Faisal Ahammad
 * Add the "websiteurl" class to the Single Line Text field
 */

jQuery(document).ready(function ($) {
  setTimeout(function () {
    $("input.websiteurl").attr("type", "url");
  }, 1000);

  // Function to validate URL
  function isValidURL(url) {
    var pattern = new RegExp("^(https?:\\/\\/)?" + "(([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}" + "(\\/[-a-z\\d%_.~+]*)*" + "(\\?[;&a-z\\d%_.~+=-]*)?" + "(\\#[-a-z\\d_]*)?$", "i");
    return pattern.test(url);
  }

  // Validate URL field on blur
  $(document).on("blur", "input.websiteurl", function () {
    var urlField = $(this);
    var urlValue = urlField.val();
    var submitButton = $(".submit-wrap input[type='submit']");
    if (urlValue && !isValidURL(urlValue)) {
      urlField.css("border", "2px solid red");
      submitButton.prop("disabled", true);
    } else {
      urlField.css("border", "");
      submitButton.prop("disabled", false);
    }
  });
});
