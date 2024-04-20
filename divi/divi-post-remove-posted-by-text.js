/**
 * Divi - Remove "Posted by" text
 */
jQuery(document).ready(function () {
  jQuery(".post-meta.vcard").each(function (idx, el) {
    let thisMeta = jQuery(el).html();
    thisMeta = thisMeta.replace(/Posted by/, "");
    jQuery(this).html(thisMeta);
  });
});
