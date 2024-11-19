/**
 * Ninja Forms - Sort Country List Alphabetically Order
 * @Author: Faisal Ahammad
 * @package ninja-forms
 */

jQuery(document).ready(function ($) {
  var waitForContainer = setInterval(function () {
    if ($(".listcountry-container").length > 0) {
      clearInterval(waitForContainer);

      var $select = $(".listcountry-container .listcountry-wrap select");
      var $options = $select.find("option");

      var sortedOptions = $options.toArray().sort(function (a, b) {
        return $(a).text().localeCompare($(b).text(), undefined, { sensitivity: "base" });
      });

      $select.empty().append(sortedOptions);
    }
  }, 100);
});
