
document.getElementById("navbarSidebar").addEventListener("click", showSidebar);
document.getElementById("close").addEventListener("click", closeSidebar);

if ( document.getElementById("logout") ) {
  document.getElementById("logout").addEventListener("click", logout);
}

function logout() {
  document.getElementById('logout-form').submit();
}

function showSidebar() {
  var sMenu = document.getElementById("sidebar-menu");
  sMenu.style.width = "230px";

}

function closeSidebar() {
  var sMenu = document.getElementById("sidebar-menu");
  sMenu.style.width = "0px";
}
