/**
 * Rearranges label and image elements in the Select Image field
 * @author Faisal Ahammad <me@faisalahammad.com>
 */

jQuery(document).ready(function ($) {
  function waitForLabels() {
    if ($(".listimage-container label").length) {
      $(".listimage-container label").each(function () {
        var $this = $(this);
        var image = $this.find("img");
        var text = $this.contents().not(image);

        $this.empty();
        $this.append(image);
        $this.append(text);

        image.css("margin-bottom", "5px");
      });
    } else {
      setTimeout(waitForLabels, 100); // Retry after 100ms
    }
  }

  waitForLabels();
});
