const form = document.querySelector('form')

console.log("ciao");

form.addEventListener("submit", (event) => {
    console.log("Ah yes, inizia la funzione");
    let valid = true;
    let errors = [];
    const errorsMessage = ["<li>Nome troppo corto</li>", "<li>Nome troppo lungo</li>", "<li>Inserire solo lettere</li>", "<li>Cognome troppo corto</li>", "<li>Cognome troppo lungo</li>", "<li>Inserire solo Lettere</li>", "<li>Deve essere presente un numero civico</li>"]
    
    const name = document.getElementById("name").value;
    const lastname = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    const address = document.getElementById("address").value;

    const nameAler = document.getElementById("nameAler");
    const lastnameAler = document.getElementById("lastnameAler");
    const emailAler = document.getElementById("emailAler");
    const addressAler = document.getElementById("addressAler");

    const regExpNameLastname = /[^a-zA-Z]/
    const regExpEmail = /^@\d{1, }|^.\d{1, }/
    const regExpAddress = /[0-1]|sn|snc$/

    // controllo sul nome
    if(name.length < 3) {
        errors.push(1)
        valid = false
    }
    if(name.length > 15) {
        errors.push(2)
        valid = false
    }
    if (regExpNameLastname.test(name) == true) {
        errors.push(3)
        valid = false
    }
    
    // controllo sul cognome
    if(lastname.length < 3) {
        errors.push(101)
        valid = false
    }
    if(lastname.length > 15) {
        errors.push(102)
        valid = false
    }
    if (regExpNameLastname.test(lastname) == true) {
        errors.push(103)
        valid = false
    }

    // controllo sull'indirizzo
    if(regExpAddress.test(address) == false) {
        errors.push(201)
        valid = false
    }

    // controllo email
    if(regExpEmail.test(email) == false){

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
            } else if (error == 101 || error == 102 || error == 103) {
                lastnameAler.innerHTML += errorsMessage[error - 1]
            } else if (error == 201) {
                addressAler.innerHTML = errorsMessage[error - 1]
            }
        });
    }
})