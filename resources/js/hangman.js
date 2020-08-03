window.onload = init;

function init() {
    var button = document.getElementById("probeer");
    // button.disabled = true;
    // button.style.display = "none";
    button.style.visibility = "hidden";
}

function checkInput(lengte) {
    var input = document.getElementById("gword").value;
    var button = document.getElementById("probeer");

    if (input.length == lengte) {
        document.getElementById("rword").value = "Lengte is: " + input.length;
        // button.disabled = false;
        // button.style.display = "block";
        button.style.visibility = "visible";
    } else {
        document.getElementById("rword").value = "Lengte is: " + input.length;
        // button.disabled = true;
        // button.style.display = "none";
        button.style.visibility = "hidden";
    }
}


