/**
 * Add the "myBlog" CSS class to the "Section Settings → Advanced → CSS ID → Classes → CSS Class".
 */

(function ($) {
  $(document).on("ready ajaxComplete", function () {
    $(".myBlog .et_pb_post a.more-link").html("View Post");
  });
})(jQuery);
