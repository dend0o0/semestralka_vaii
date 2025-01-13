const chyba = document.getElementById("errorForm");

document.getElementById("login-form").onsubmit = function(event){
    event.preventDefault();
    chyba.innerHTML = "";
    let validny = true;
    let email = document.getElementsByName("email");
    let heslo = document.getElementsByName("password");
    if (email[0].value === "") {
        chyba.innerHTML += "E-mail nesmie byť prázdny!<br>";
        email[0].style.borderColor = "red";
        validny = false;
    }

    if (heslo[0].value === "") {
        chyba.innerHTML += "Prosím, vyplňte heslo!<br>";
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

