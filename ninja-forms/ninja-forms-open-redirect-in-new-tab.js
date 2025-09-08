/**
 * Open Ninja Forms redirect URL in a new browser tab after form submission.
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

jQuery(document).ready(function ($) {
  if (typeof nfRadio !== "undefined") {
    nfRadio
      .channel("forms")
      .on("submit:response", function (response, textStatus, jqXHR, formId) {
        if (
          response &&
          response.data &&
          response.data.actions &&
          response.data.actions.redirect &&
          response.data.actions.redirect !== ""
        ) {
          var redirectUrl = response.data.actions.redirect;

          delete response.data.actions.redirect;

          // Open redirect in a new tab
          window.open(redirectUrl, "_blank");

          return false;
        }
      });
  }
});
