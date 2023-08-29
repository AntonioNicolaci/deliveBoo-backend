const form = document.getElementById("registerForm");

console.log("ciao");

form.addEventListener("submit", formCont()) 


function formCont(){
    console.log("Ah yes, inizia la funzione");
    let valid = true;
    
    const name = document.getElementById("name");
    const lastname = document.getElementById("lastname");
    const address = document.getElementById("address");

    const nameAler = document.getElementById("nameAler");
    const lastnameAler = document.getElementById("lastnameAler");
    const addressAler = document.getElementById("addressAler");

    const regExpNameLastname = /[^a-zA-Z]/
    const regExpAddress = /[0-1]|sn|snc$/

    // controllo sul nome
    if(name.length < 3) {
        nameAler.innerHTML = "Nome troppo corto"
        valid = false
    } else if(name.length > 15) {
        nameAler.innerHTML = "Nome troppo lungo"
        valid = false
    } else if (regExpNameLastname.test(name) == true) {
        nameAler.innerHTML = "Inserire solo lettere"
        valid = false
    }
    
    // controllo sul cognome
    if(lastname.length < 3) {
        lastnameAler.innerHTML = "nome troppo corto"
        valid = false
    } else if(lastname.length > 15) {
        lastnameAler.innerHTML = "nome troppo lungo"
        valid = false
    } else if (regExpNameLastname.test(lastname) == true) {
        lastnameAler.innerHTML = "Inserire solo Lettere"
        valid = false
    }

    // controllo sull'indirizzo
    if(regExpAddress.test(address) == false) {
        addressAler.innerHTML = "Deve essere presente un numero civico"
        valid = false
    }

    if (valid == false) {
        console.log("NON FUNZIONA UN CAZZO ma false");
        form.preventDefault();
    } else {
        console.log("NON FUNZIONA UN CAZZO ma true");
        const url = Laravel.route("login");
        window.location.href = url;
    }
}