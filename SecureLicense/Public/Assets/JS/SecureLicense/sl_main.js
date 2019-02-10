$(".sidebar-dropdown > a").click(function () {
    $(".sidebar-submenu").slideUp(200);
    if (
        $(this)
            .parent()
            .hasClass("active")
    ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .parent()
            .removeClass("active");
    } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
        $(this)
            .parent()
            .addClass("active");
    }
});
$("#close-sidebar").on("click", function () {
    $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").on("click", function () {
    $(".page-wrapper").addClass("toggled");
});
if ($(window).width() < 750) {
    $(".page-wrapper").removeClass("toggled");
}
$(window).resize(function () {
    if ($(window).width() < 750) {
        $(".page-wrapper").removeClass("toggled");
    } else {
        $(".page-wrapper").addClass("toggled");
    }
});
$(".sidebar-wrapper").show();

/**
 * Data Table
 */
var table = document.querySelector('table');
var headerCheckbox = table.querySelector('thead .mdl-data-table__select input');
var boxes = table.querySelectorAll('tbody .mdl-data-table__select');
var headerCheckHandler = function (event) {
    if (event.target.checked) {
        for (var i = 0, length = boxes.length; i < length; i++) {
            boxes[i].MaterialCheckbox.check();
        }
    } else {
        for (var i = 0, length = boxes.length; i < length; i++) {
            boxes[i].MaterialCheckbox.uncheck();
        }
    }
};
