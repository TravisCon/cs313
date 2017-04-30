$(document).ready(function () {
    var oldColor = null;
    $("#unselected").hover(function () {
        oldColor = $(this).css("background-color");
        $(this).css("background-color", '#9ea6ae');
    }, function () {
        $(this).css("background-color", oldColor);
    });
});