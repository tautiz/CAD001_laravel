document.addEventListener('DOMContentLoaded', function () {
    let elems = document.getElementsByClassName("dropdown-trigger")
    const arr = Array.from(elems);
    arr.forEach(function (elem) {
        elem.dropdown();
    });
});

