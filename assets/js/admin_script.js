$("#store-icon").click(function () {
  icon = $(this).find("i");
  if (icon.hasClass("fa-angle-left")) {
    icon.addClass("fa-angle-down").removeClass("fa-angle-left");
  } else {
    icon.addClass("fa-angle-left").removeClass("fa-angle-down");
  }
});

$(function () {
  /** add active class and stay opened when selected */
  var url = window.location;
  // for sidebar menu entirely but not cover treeview
  $("ul.sidebar-menu a")
    .filter(function () {
      return this.href == url;
    })
    .parent()
    .addClass("active-style");
  // for treeview
  $("ul.treeview-menu a")
    .filter(function () {
      return this.href == url;
    })
    .parent()
    .addClass("active-style");
});
