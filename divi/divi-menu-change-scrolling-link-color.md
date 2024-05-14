1. First add the following CSS code to your `Divi > Theme Options > General > Custom CSS` (at the end).

```css
ul#menu-landing-page-navigation li a.active {
  background: #000;
  color: #fff;
}
```

2. Now, add following JavaScript code in `Divi > Theme Options > Integration > Body`.

```javascript
jQuery(document).ready(function ($) {
  $("ul#menu-landing-page-navigation li a").on("click", function () {
    $("ul#menu-landing-page-navigation li a").removeClass("active");
    $(this).addClass("active");
  });
});
```

**Note:** Don't forgot to change the menu ID `#menu-landing-page-navigation` to your own menu ID.
