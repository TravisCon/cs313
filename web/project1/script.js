$(document).ready(function () {
    $('.preview').hover(function(){
        $(this).find("img").animate({
            opacity: "0.3"
        }, 'fast');
    }, function(){
        $(this).find("img").animate({
            opacity: "1.0"
        }, 'fast');
    });
    
    $("#confirm").click(function(){
        $("#form").submit();
    });
});