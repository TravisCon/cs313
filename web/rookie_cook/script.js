var speed1 = 100;
var speed2 = 200;

function setPassError(){
  $("#passError").show();
  $(".password").addClass("has-error has-feedback");
  $("#submit").attr('disabled','disabled');
}

function setPassValid(){
  $("#passError").hide();
  $(".password").removeClass("has-error has-feedback");
  $(".password").addClass("has-success has-feedback");
  $("#submit").removeAttr('disabled');
}

$(document).ready(function () {
  //Use to make links look interactive
  $('.link').hover(function(){
    $(this).animate({
      letterSpacing: '-=1'
    }, speed1);
  }, function(){
    $(this).animate({
      letterSpacing: '+=1'
    }, speed1);
  });

  //Make previews look interactive
  $('.preview').hover(function(){
    $(this).animate({
      padding: '+=10'
    }, speed1);
  }, function(){
    $(this).animate({
      padding: '-=10'
    }, speed1);
  });

  $('#addRecipeButton').click(function(){
    $(this).slideUp('fast');
    $('#newRecipeForm').slideDown('medium');
  });

  //Check password equivalence
  $("#registerForm").submit(function(){
    if ($("#pass2").val() !== $("#pass1").val()) {
      setPassError();
      return false;
    } else {
      setPassValid();
      return true;
    }
  });

  $("#pass2").focusout(function(){
    if ($("#pass2").val() !== $("#pass1").val()) {
      setPassError();
    } else {
      setPassValid();
    }
  });

  $("#photoName").change(function(){
    $('#photoLabel').html(this.files[0].name);
  });

  var ingredientCounter = 1;
  $("#addIngredient").unbind().click(function(){
    ingredientCounter++;
    var ingredientsInput = "<div class='col-xs-8'> <input type='text' class='form-control' name='ingredient["+ (ingredientCounter - 1) +"]'></div> <div class='col-xs-4'><input type='text' class='form-control' name='quantity["+ (ingredientCounter - 1) +"]'></div>";
    $("#ingredientsList").append(ingredientsInput);
  });

  var stepCounter = 1;
  $("#addStep").unbind().click(function(){
    stepCounter++;
    var stepId = "step["+ (stepCounter - 1)+"]";
    var stepInput = "<label for='" + stepId + "' class='col-xs-2 col-form-label'> Step "+ stepCounter +"</label><div class='col-xs-10'><input type='text' class='form-control' id='"+ stepId + "' name='" + stepId + "'></div>";
    $("#stepList").append(stepInput);
  });

  //Ajax edit request
  $(".editRequest").submit(function(e){
    e.preventDefault();
    var recipeId = $(this).find("input").val();
    $.post("edit_recipe.php", {recipeId: recipeId}, 
           function(result){
      $("#editBox").html(result);
      $("#center3").slideDown("medium", function() {
        $('html, body').animate({
          scrollTop: ($("#center3").height() + $("#center1").height() + 100)
        }, 'medium');  
      });
    });
  });

  $(".delete").click(function(){
    var recipeId = $("#recipeId").val();
    $.post('deleteRecipe.php', {recipeId : recipeId}, function(data){
    });
    location.reload();
  });
});