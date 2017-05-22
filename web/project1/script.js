var speed1 = 100;
var speed2 = 200;

$(document).ready(function () {
  $('#header > div > a').hover(function(){
    $('a > h2').animate({
      fontSize: "+=2"
    }, speed1);
  }, function(){
    $('a > h2').animate({
      fontSize: "-=2"
    }, speed1);
  });

  $("#confirm").click(function(){
    $("#form").submit();
  });
});