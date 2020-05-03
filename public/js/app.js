
document.getElementById("button-account").addEventListener("click", showDropdownContent);
document.getElementById("button-menu").addEventListener("click", showMenu);
if ( document.getElementById("logout") ) {
  document.getElementById("logout").addEventListener("click", logout);
}

function showDropdownContent() {
  var c_account = document.getElementById("content-account")
  c_account.classList.toggle("show");
}

function showMenu() {
  var m_categories = document.getElementById("menu-categories");
  if ( m_categories.style.width == "0px" ) {
    m_categories.style.width = "200px";
  } else {
    m_categories.style.width = "0px";
  }
}

function logout() {
  document.formLogout.submit();
}
