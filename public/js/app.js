$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// LISTENERS
document.getElementById("navbarSidebar").addEventListener("click", showSidebar);
document.getElementById("navbarSidebar").addEventListener("mouseover", showSidebar);
document.getElementById("close").addEventListener("click", closeSidebar);
document.getElementById("sidebar-menu").addEventListener("mouseover", showSidebar);
document.getElementById("sidebar-menu").addEventListener("mouseout", closeSidebar);

if ( document.getElementById("logout") ) {
  document.getElementById("logout").addEventListener("click", logout);
}

// FUNCTIONS
function logout() {
  document.getElementById('logout-form').submit();
}

function showSidebar() {
  var sMenu = document.getElementById("sidebar-menu");
  sMenu.style.width = "320px"; //230

}

function closeSidebar() {
  var sMenu = document.getElementById("sidebar-menu");
  sMenu.style.width = "0px";
}
