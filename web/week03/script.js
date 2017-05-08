$(document).ready(function () {
    $('.submit').hover(function () {
        $(this).css('background-color', '#346249');
        $(this).animate({
            top: "-=2px"
        }, 100);
    }, function () {
        $(this).css('background-color', '#1D5135');
        $(this).animate({
            top: "+=2px"
        }, 100);
    });
    
    $('.item').hover(function(){
        $(this).find("#description").show('fast');
        $(this).find("img").animate({
            opacity: "0.3"
        }, 'fast');
    }, function(){
        $(this).find("#description").hide('fast');
        $(this).find("img").animate({
            opacity: "1.0"
        }, 'fast');
    });
    
    $("#confirm").click(function(){
        $("#form").submit();
    });
});