const chyba = document.getElementById("errorForm");

document.getElementById("register-form").onsubmit = function(event){
    event.preventDefault();
    chyba.innerHTML = "";
    let validny = true;
    let meno = document.getElementsByName("name");
    let email = document.getElementsByName("email");
    let heslo = document.getElementsByName("password");
    let heslo_znova = document.getElementsByName("password_confirmation");
    if (meno[0].value === "") {
        chyba.innerHTML += "<p>Používateľské meno nesmie byť prázdne!</p>";
        meno[0].style.borderColor = "red";
        validny = false;
    }

    if (heslo[0].value === "") {
        chyba.innerHTML += "<p>Prosím, vyplňte heslo!</p>";
        heslo[0].style.borderColor = "red";
        validny = false;
    }

    if (email[0].value === "") {
        chyba.innerHTML += "<p>Prosím, vyplňte e-mail!</p>";
        email[0].style.borderColor = "red";
        validny = false;
    }

    if (heslo_znova[0].value === "") {
        chyba.innerHTML += "<p>Prosím, vyplňte znova heslo!</p>";
        heslo_znova[0].style.borderColor = "red";
        validny = false;
    }

    if (heslo_znova[0].value !==  heslo[0].value) {
        chyba.innerHTML += "<p>Hesla sa musia rovnať!</p>";
        heslo_znova[0].style.borderColor = "red";
        validny = false;
    }

    if (heslo[0].value.length < 8) {
        chyba.innerHTML += "Heslo musí mať aspoň 8 znakov!<br>";
        heslo[0].style.borderColor = "red";
        validny = false;
    }

    if (validny) {
        this.submit();
        return true;
    } else {
        return false;
    }

};

