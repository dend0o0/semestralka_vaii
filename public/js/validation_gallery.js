const chyba = document.getElementById("errorForm");

document.getElementById("edit-create-form").onsubmit = function(event){

    event.preventDefault();
    chyba.innerHTML = "";
    let validny = true;
    let nazov = document.getElementsByName("nazov");
    let popis = document.getElementsByName("popis");
    let subor = document.getElementsByName("image");

    if (nazov[0].value === "") {
        chyba.innerHTML += "Názov nesmie byť prázdny!<br>";
        nazov[0].style.borderColor = "red";
        validny = false;
    } else if (nazov[0].value.length < 3 || nazov[0].value.length > 255) {
        chyba.innerHTML += "Názov musí mať aspoň 3 znaky a najviac 255 znakov.<br>";
        popis[0].style.borderColor = "red";
        validny = false;
    }

    if (subor.length > 0) {
        if (subor[0].files.length === 0) {
            chyba.innerHTML += "Nahrajte obrázok, prosím.<br>";
            validny = false;
        }
    }


    if (popis[0].value.length < 3 || popis[0].value.length > 2000) {
        chyba.innerHTML += "Popis obrázku musí mať aspoň 3 znaky a najviac 2000 znakov.<br>";
        popis[0].style.borderColor = "red";
        popis[0].style.borderWidth = "2px";
        validny = false;
    }

    if (validny) {
        this.submit();
        return true;
    } else {
        return false;
    }

};
