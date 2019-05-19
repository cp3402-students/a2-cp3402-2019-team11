var menu = document.getElementById("site-navigation");
var body = document.getElementById("primary");
var menuOffset = menu.offsetTop;

function stickyMenu() {
    if (window.pageYOffset >= menuOffset) {
        menu.classList.add("sticky");
        body.classList.add("sticky-time");

    } else {
        menu.classList.remove("sticky");
        body.classList.remove("sticky-time");
    }
}

window.onscroll = function() {
    stickyMenu();
};