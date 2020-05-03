// VARIABLES
var options = ["rock", "paper", "scissors", "lizard", "spock"];
var dir = "img/";
var type_img = ".png"
var J1;
var J2 = "bot";
var rounds = 0;
var score_J1 = 0; var score_J2 = 0;

var start = new Audio("sounds/start.mp3"); // when the user start the game
var click = new Audio("sounds/click.mp3"); // when the user click the option
var win = new Audio("sounds/win.mp3");
var loose = new Audio("sounds/loose.mp3");

// CONTROLLER EVENTS
$(document).ready(controller_events);


function controller_events() {
  $(".button_play").click(show_content);
}


// FUNCTIONS
function show_content() {
  start.play();
  $(".div_button_play , window.parent.document").css("display", "none");
  $(".content_game").css("display", "block");

  set_name_J1();

  $(".options img").click(play);
}


function set_name_J1() {
  if ( !J1 ) {
    J1 = prompt("Introduce un nombre para el J1: ");
    if ( J1 == "" ) {
      J1 = "Player";
    }
  }
}


function play(event) {
  click.play();
  var player_J1 = event.target.name;

  var random = Math.floor( Math.random() * 5 );
  var player_J2 = options[random];

  show_option(player_J1, J1);
  show_option(player_J2, J2);

  var winner = get_winner(player_J1, player_J2);
  switch ( winner ) {
    case "J1":
      var text = document.createTextNode("Has ganado, " + J1);
      win.play();
      rounds++; score_J1++;break;
    case "J2":
      var text = document.createTextNode("Has ganado, " + J2);
      loose.play();
      rounds++; score_J2++;break;
    default:
      var text = document.createTextNode("Empate");
      rounds++;break;
  }
  var h2 = document.createElement("h2");
  h2.appendChild(text);
  if ( $(".result").children().length > 1 ) {
    $(".result h2").remove();
  }
  $(".result div").before(h2);

  show_scores();
}


function show_option(option, player) {
  if ( $(".result div").children().length > 1 ) {
    $(".result div").html("");
  }
  var img = document.createElement("img");
  var dir_img = dir + option + type_img;
  var alt_img = player + "-" + option;
  img.setAttribute("src", dir_img);
  img.setAttribute("alt", alt_img);
  img.setAttribute("height", 130);
  if ( player == J2 ) {
    img.setAttribute("style", "-webkit-transform: scaleX(-1); transform: scaleX(-1);");
  }
  $(".result div").append(img);
}


function get_winner(option_J1, option_J2) {
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


function show_scores() {
  $(".scores").html("");
  var text = "Partidas: " + rounds + "\n Puntuación " + J1 +": " + score_J1 + "\n Puntuación J2: " + score_J2;
  $(".scores").append(text);
}
