document.getElementById("listuser").onchange = function () {

    if (document.getElementById("listuser").value == 0) {
        var url = "?module=admin&action=index";
    } else {
        var url = "?module=admin&action=index&user=" + document.getElementById("listuser").value + "&tab=com";
    }

    window.location = url;

    evt.preventDefault();
}
