function thisFunction() {
    alert("Clicked!");
}

function changeColor() {
    var header = document.getElementById("header");
    var newColor = document.getElementById("color").value;
    header.style = "background: " + newColor;
}
$(document).ready(function () {
    $("#button1").click(function () {
        var newColor = $("#color").val();
        $("#header").css("background-color", newColor);
    });
    $("#button2").click(function () {
        $("#footer").toggle("slow");
        if ($(this).text() == "Reappear") {
            $(this).text("Disappear");
        }
        else {
            $(this).text("Reappear");
        }
    });
});