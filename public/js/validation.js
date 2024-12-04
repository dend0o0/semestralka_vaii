const chyba = document.getElementById("errorForm");

document.getElementById("edit-create-form").onsubmit = function(event){
    event.preventDefault();
    chyba.innerHTML = "";
    let validny = true;
    let nazov = document.getElementsByName("nazovClanku");
    let nazovLat = document.getElementsByName("nazovLat");
    let obsah = document.getElementsByName("obsahClanku");
    let maxTeplota = document.getElementsByName("maxTeplota");
    let minTeplota = document.getElementsByName("minTeplota");
    let subor = document.getElementsByName("image");
    if (nazov[0].value === "") {
        chyba.innerHTML += "Názov článku nesmie byť prázdny!<br>";
        nazov[0].style.borderColor = "red";
        validny = false;
    } else if (nazov[0].value.length < 3 || nazov[0].value.length > 255) {
        chyba.innerHTML += "Názov článku musí mať aspoň 3 znaky a najviac 255 znakov.<br>";
        nazov[0].style.borderColor = "red";
        validny = false;
    }

    if (nazovLat[0].value === "") {
        chyba.innerHTML += "Latinský názov článku nesmie byť prázdny!<br>";
        nazovLat[0].style.borderColor = "red";
        validny = false;
    } else if (nazovLat[0].value.length < 3 || nazovLat[0].value.length > 255) {
        chyba.innerHTML += "Latinský názov článku musí mať aspoň 3 znaky a najviac 255 znakov.<br>";
        nazovLat[0].style.borderColor = "red";
        validny = false;
    }

    if (subor.length > 0) {
        if (subor[0].files.length === 0) {
            chyba.innerHTML += "Nahrajte obrázok, prosím.<br>";
            validny = false;
        }
    }


    if (maxTeplota[0].value < 0 || maxTeplota[0].value > 60 ) {
        chyba.innerHTML += "Maximálna teplota sa môže pohybovať od 0 do 60 stupňov.<br>";
        maxTeplota[0].style.borderColor = "red";
        validny = false;
    } else if (minTeplota[0].value.length < -50 || minTeplota[0].value.length > 30) {
        chyba.innerHTML += "Minimálna teplota sa môže pohybovať od -50 do 30 stupňov.<br>";
        minTeplota[0].style.borderColor = "red";
        validny = false;
    } else if (minTeplota[0].value.length === 0 || maxTeplota[0].value.length === 0) {
        chyba.innerHTML += "Minimálna a maximálna teplota musí byť vyplnená.<br>";
    }

    if (obsah[0].value.length < 3 || obsah[0].value.length > 2000) {
        chyba.innerHTML += "Obsah článku musí mať aspoň 3 znaky a najviac 2000 znakov.<br>";
        obsah[0].style.borderColor = "red";
        validny = false;
    }

    if (validny) {
        this.submit();
        return true;
    } else {
        return false;
    }

};
