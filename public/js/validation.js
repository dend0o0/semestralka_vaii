const chyba = document.getElementById("errorForm");

document.getElementById("edit-create-form").onsubmit = function(){
    chyba.innerHTML = "";
    let nazov = document.getElementsByName("nazovClanku");
    let obsah = document.getElementsByName("obsahClanku");
    let maxTeplota = document.getElementsByName("maxTeplota");
    let minTeplota = document.getElementsByName("minTeplota");
    if (nazov[0].value === "") {
        chyba.innerHTML += "Názov článku nesmie byť prázdny.";
        return false;
    } else if (nazov[0].value.length < 3 || nazov[0].value.length > 255) {
        chyba.innerHTML += "Názov článku musí mať aspoň 3 znaky a najviac 255 znakov.";
        return false;
    }

    if (maxTeplota[0].value.length < 0 || maxTeplota[0].value.length > 60) {
        chyba.innerHTML += "Maximálna teplota sa môže pohybovať od 0 do 60 stupňov."
        return false;
    } else if (minTeplota[0].value.length < -50 || minTeplota[0].value.length > 30) {
        chyba.innerHTML += "Minimálna teplota sa môže pohybovať od -50 do 30 stupňov."
        return false;
    }

    if (obsah[0].value.length < 3 || obsah[0].value.length > 2000) {
        chyba.innerHTML += "Obsah článku musí mať aspoň 3 znaky a najviac 2000 znakov.";
        return false;
    }
    return true;
};
