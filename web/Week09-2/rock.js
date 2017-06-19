function handlePlay(request, response){
  console.log("Handling play request");
  var playerWeapon = request.query.weapon;
  var cpuWeapon = getRandomWeapon();
  var winner = getWinner(playerWeapon, cpuWeapon);
  console.log("Winner: " + winner);
  
  var params = {playerWeapon : playerWeapon,
               cpuWeapon : cpuWeapon,
               winner: winner};
  
  response.render("pages/results", params);
}

function getRandomWeapon(){
  return "rock";
}

function getWinner(){
  return "Player";
}

module.exports = {handlePlay: handlePlay};