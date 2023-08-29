const form = document.querySelector('form')

console.log("ciao");

form.addEventListener("submit", (event) => {
    console.log("Ah yes, inizia la funzione");
    let valid = true;
    let errors = [];
    const errorsMessage = ["<li>Nome troppo corto</li>", "<li>Nome troppo lungo</li>", "<li>Inserire solo lettere</li>", "<li>Cognome troppo corto</li>", "<li>Cognome troppo lungo</li>", "<li>Inserire solo Lettere</li>", "<li>Deve essere presente un numero civico</li>"]
    
    const name = document.getElementById("name").value;
    const lastname = document.getElementById("lastname").value;
    const address = document.getElementById("address").value;

    const nameAler = document.getElementById("nameAler");
    const lastnameAler = document.getElementById("lastnameAler");
    const addressAler = document.getElementById("addressAler");

    const regExpNameLastname = /[^a-zA-Z]/
    const regExpAddress = /[0-1]|sn|snc$/

    // controllo sul nome
    if(name.length < 3) {
        // nameAler.innerHTML = "Nome troppo corto"
        errors.push(1)
        valid = false
    }
    if(name.length > 15) {
        // nameAler.innerHTML = "Nome troppo lungo"
        errors.push(2)
        valid = false
    }
    if (regExpNameLastname.test(name) == true) {
        // nameAler.innerHTML = "Inserire solo lettere"
        errors.push(3)
        valid = false
    }
    
    // controllo sul cognome
    if(lastname.length < 3) {
        // lastnameAler.innerHTML = "nome troppo corto"
        errors.push(4)
        valid = false
    }
    if(lastname.length > 15) {
        // lastnameAler.innerHTML = "nome troppo lungo"
        errors.push(5)
        valid = false
    }
    if (regExpNameLastname.test(lastname) == true) {
        // lastnameAler.innerHTML = "Inserire solo Lettere"
        errors.push(6)
        valid = false
    }

    // controllo sull'indirizzo
    if(regExpAddress.test(address) == false) {
        // addressAler.innerHTML = "Deve essere presente un numero civico"
        errors.push(7)
        valid = false
    }

    if (valid == false) {
        console.log("NON FUNZIONA UN CAZZO ma false");
        event.preventDefault();
        nameAler.innerHTML = ""
        lastnameAler.innerHTML = ""
        addressAler.innerHTML = ""
        errors.forEach(error => {
            if (error == 1 || error == 2 || error == 3) {
                nameAler.innerHTML += errorsMessage[error - 1] 
            } else if (error == 4 || error == 5 || error == 6) {
                lastnameAler.innerHTML += errorsMessage[error - 1]
            } else {
                addressAler.innerHTML = errorsMessage[error - 1]
            }
        });
    } else {
        console.log("NON FUNZIONA UN CAZZO ma true");
        // const url = Laravel.route("login");
        // window.location.href = url;
    }
})