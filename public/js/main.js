// Menambahkan class active pada sidebar
jQuery(document).ready(function ($) {
    // Get current path and find target link
    var path = window.location.href;
    // Account for home page with empty path
    if (path == "http://localhost:8000/") {
        path = "http://localhost:8000";
    } else {
        path = path.substring(7);
    }
    path = path.split('/')[2];
    // path = path.substring(path.lastIndexOf("/") + 1);
    var target = $("#" + path);
    // alert(target);
    // Add active class to target link
    target.addClass('active');
});