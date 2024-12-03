function menuShowHide() {
    // vyskusat toggle!!!
    const menuClick = document.getElementsByClassName("menu-item");
    const menuButton = document.getElementById("menu-button-resp").firstChild;
    /*
    if (menuClick[0].style.display === "none") {
        menuButton.firstChild.className = "fa-solid fa-xmark";
    } else {
        menuButton.firstChild.className = "fa-solid fa-bars";
    }
*/
    menuButton.classList.toggle("fa-xmark");
    //menuButton.className.toggle("fa-solid fa-bars");
    for (let i = 0; i < menuClick.length; i++) {

        menuClick[i].classList.toggle("menu-item-shown");

    }
}
