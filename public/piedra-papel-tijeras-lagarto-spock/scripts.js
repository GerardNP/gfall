/* Variables */
const DIR_IMG = "piedra-papel-tijeras-lagarto-spock/img/";

var nameJ1 = "Gerard";
var rounds = 0;
var scoreJ1 = 0; var scoreJ2 = 0;

var options = ["rock", "paper", "scissors", "lizard", "spock"];


/* Evento principal */
document.getElementById("btn-play").addEventListener("click", showContent);

function showContent(event) {
  event.target.style.display = "none";
  document.getElementById("content-game").style.display = "block";

  var options = document.getElementsByClassName("option");
  for (var i = 0; i < options.length; i++) {
    options[i].addEventListener("click", play);
  }
}

function play(event) {
  var option_J1 = event.target.name;

  // Elección del J2
  var random = Math.floor( Math.random() * 5 );
  var option_J2 = options[random];

  // Determinar el ganador
  var winner = getWinner(option_J1, option_J2);

  if ( winner == "J1") {
    var text = document.createTextNode("¡Has ganado!");
    scoreJ1++;
  } else if ( winner == "J2" ) {
    var text = document.createTextNode("¡Has perdido!");
    scoreJ2++;
  } else {
    var text = document.createTextNode("Empate");
  }
  rounds++;

  // Mostrar el resultado
  var h2 = document.getElementById("result-txt")
  h2.innerHTML = "";
  h2.appendChild(text);

  // Mostrar las opciones elegidas
  showResults(option_J1, option_J2);

  // Mostrar puntuaciones
  showScores();
}

function getWinner(option_J1, option_J2) {
  var winner;

  if ( option_J1 == "rock" &&  option_J2 == "paper" ) { // rock
    winner = "J2";
  } else if ( option_J1 == "rock" &&  option_J2 == "scissors" ) {
    winner = "J1";
  } else if ( option_J1 == "rock" &&  option_J2 == "lizard" ) {
    winner = "J1";
  } else if ( option_J1 == "rock" &&  option_J2 == "spock" ) {
    winner = "J2";
  } else if ( option_J1 == "paper" &&  option_J2 == "rock" ) { // paper
    winner = "J1";
  } else if ( option_J1 == "paper" &&  option_J2 == "scissors" ) {
    winner = "J2";
  } else if ( option_J1 == "paper" &&  option_J2 == "lizard" ) {
    winner = "J2";
  } else if ( option_J1 == "paper" &&  option_J2 == "spock" ) {
    winner = "J1";
  } else if ( option_J1 == "scissors" &&  option_J2 == "rock" ) { // scissor
    winner = "J2";
  } else if ( option_J1 == "scissors" &&  option_J2 == "paper" ) {
    winner = "J1";
  } else if ( option_J1 == "scissors" &&  option_J2 == "lizard" ) {
    winner = "J1";
  } else if ( option_J1 == "scissors" &&  option_J2 == "spock" ) {
    winner = "J2";
  } else if ( option_J1 == "lizard" &&  option_J2 == "rock" ) { // lizard
    winner = "J2";
  } else if ( option_J1 == "lizard" &&  option_J2 == "paper" ) {
    winner = "J1";
  } else if ( option_J1 == "lizard" &&  option_J2 == "scissors" ) {
    winner = "J2";
  } else if ( option_J1 == "lizard" &&  option_J2 == "spock" ) {
    winner = "J1";
  } else if ( option_J1 == "spock" &&  option_J2 == "rock" ) { // spock
    winner = "J1";
  } else if ( option_J1 == "spock" &&  option_J2 == "paper" ) {
    winner = "J2";
  } else if ( option_J1 == "spock" &&  option_J2 == "scissors" ) {
    winner = "J1";
  } else if ( option_J1 == "spock" &&  option_J2 == "lizard" ) {
    winner = "J2";
  } else {
    winner = "none";
  }
  return winner;
}

function showResults(option_J1, option_J2) {
  var resultImg = document.getElementById("result-img");
  var options = [option_J1 + ".png", option_J2 + ".png"];

  if ( resultImg.childElementCount > 0) {
    resultImg.innerHTML = "";
  }

  for (var i = 0; i < 2; i++) {
    var img = document.createElement("img");
    img.setAttribute("src",  asset + DIR_IMG + options[i]);
    if ( i == 1 ) {
      img.setAttribute("style", "-webkit-transform: scaleX(-1); transform: scaleX(-1);");
    }
    resultImg.appendChild(img);
  }

  document.getElementsByClassName("result")[0].style.display = "block";
}

function showScores() {
  var scores = document.getElementById("scores");
  scores.innerHTML = "";
  var text = document.createTextNode("Partidas: " + rounds + "\n" + " - " +
  "Ganadas: " + scoreJ1 + "\n" + " - " +
  "Perdidas: " + scoreJ2);
  scores.appendChild(text);

  document.getElementsByClassName("scores")[0].style.display = "block";
}
