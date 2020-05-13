
document.getElementById("navbarSidebar").addEventListener("click", showSidebar);
if ( document.getElementById("logout") ) {
  document.getElementById("logout").addEventListener("click", logout);
}

function logout() {
  document.formLogout.submit();
}

function showSidebar() {
  var sMenu = document.getElementById("sidebar-menu");
  if ( sMenu.style.width == "0px" ) {
    sMenu.style.width = "200px";
  } else {
    sMenu.style.width = "0px";
  }
}
