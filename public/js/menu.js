function menuShowHide() {

    const menuClick = document.getElementsByClassName("menu-item");
    const menuButton = document.getElementById("menu-button-resp").firstChild;

    menuButton.classList.toggle("fa-xmark");

    for (let i = 0; i < menuClick.length; i++) {
        menuClick[i].classList.toggle("menu-item-shown");
    }
}
