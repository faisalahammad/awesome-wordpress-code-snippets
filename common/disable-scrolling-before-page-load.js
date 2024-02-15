// Get the current page scroll position
scrollTop = window.pageYOffset || document.documentElement.scrollTop;
(scrollLeft = window.pageXOffset || document.documentElement.scrollLeft),
  // if any scroll is attempted, set this to the previous value
  (window.onscroll = function () {
    window.scrollTo(scrollLeft, scrollTop);
  });

jQuery(window).on("load", function () {
  setTimeout(() => {
    window.onscroll = function () {};
  }, 1000);
});
