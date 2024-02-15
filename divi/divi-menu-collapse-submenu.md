Use the following code in **Divi > Theme Options > General > Custom CSS**.

```css
#main-header .et_mobile_menu .menu-item-has-children,
.et_pb_fullwidth_menu .et_mobile_menu .menu-item-has-children,
.et_pb_menu .et_mobile_menu .menu-item-has-children {
  position: relative;
}

#main-header .et_mobile_menu .menu-item-has-children > a,
.et_pb_fullwidth_menu .et_mobile_menu .menu-item-has-children > a,
.et_pb_menu .et_mobile_menu .menu-item-has-children > a {
  padding-right: 47px;
  background: transparent;
}

#main-header .et_mobile_menu .menu-item-has-children > a + span,
.et_pb_fullwidth_menu .et_mobile_menu .menu-item-has-children > a + span,
.et_pb_menu .et_mobile_menu .menu-item-has-children > a + span {
  position: absolute;
  right: 0;
  top: 0;
  padding: 10px 15px;
  font-size: 20px;
  font-weight: 600;
  cursor: pointer;
  z-index: 2;
}

#main-header .et_mobile_menu li ul.menu-hide,
.et_pb_fullwidth_menu .et_mobile_menu li ul.menu-hide,
.et_pb_menu .et_mobile_menu li ul.menu-hide {
  display: none !important;
}

#main-header .et_mobile_menu span.menu-closed:before,
.et_pb_fullwidth_menu .et_mobile_menu span.menu-closed:before,
.et_pb_menu .et_mobile_menu span.menu-closed:before {
  content: "\4c";
  font-family: "ETmodules";
  display: block;
  font-size: 17px;
}

#main-header .et_mobile_menu span.menu-closed.menu-open:before,
.et_pb_fullwidth_menu .et_mobile_menu span.menu-closed.menu-open:before,
.et_pb_menu .et_mobile_menu span.menu-closed.menu-open:before {
  content: "\4d";
}
```

Add the following code in **Divi > Theme Options > Integration > Body**.

```javascript
jQuery(document).ready(function ($) {
  function ds_setup_collapsible_submenus_parent_cickable() {
    var top_level_link = ".et_mobile_menu .menu-item-has-children > a";
    $(top_level_link).after('<span class="menu-closed"></span>');
    $(top_level_link).each(function () {
      $(this).next().next(".sub-menu").toggleClass("menu-hide", 1000);
    });
    $(top_level_link + "+ span").on("click", function (event) {
      event.preventDefault();
      $(this).toggleClass("menu-open");
      $(this).next(".sub-menu").toggleClass("menu-hide", 1000);
    });
  }

  setTimeout(function () {
    ds_setup_collapsible_submenus_parent_cickable();
  }, 300);
});
```

**Credit:** [WPZone](https://wpzone.co/wordpress-and-divi-code-snippets/divi-mobile-collapse-submenus-with-clickable-parent-menu-items/)
