document.getElementById("commentForm").onsubmit = function(event){
    event.preventDefault();
    chyba.innerHTML = "";
    let validny = true;
    let obsah = document.getElementsByName("obsah");

    if (obsah[0].value.length < 3 || obsah[0].value.length > 255){} {
        chyba.innerHTML += "<p>Komentár musí mať aspoň 3 znaky a maximálne 255 znakov!</p>";
        obsah[0].style.borderColor = "red";
        obsah[0].style.borderWidth = "2px";
        validny = false;
    }


    if (validny) {
        this.submit();
        return true;
    } else {
        return false;
    }

};
