document.addEventListener('DOMContentLoaded', function () {
    let elems = document.getElementsByClassName("dropdown-trigger")
    const arr = Array.from(elems);
    arr.forEach(function (elem) {
        elem.dropdown();
    });
});

var Notification = document.getElementById("notification");
var close = document.getElementById("close-modal");
Notification.style.transform = "translateX(150%)";
Notification.classList.remove("hidden");
Notification.style.transform = "translateX(0%)";

function closeModal() {
    Notification.style.transform = "translateX(150%)";
    Notification.classList.remove("hidden");
    setTimeout(function () {
        Notification.style.transform = "translateX(0%)";
    }, 1000);
}
