const form = document.querySelector('.sectionCreation form');
const formConnexion = document.querySelector('.sectionConnexion form');
const oeil = document.querySelector(".oeil")
const oeilB = document.querySelector(".oeilB")
const oeil2 = document.querySelector(".oeil2")
const oeilB2 = document.querySelector(".oeilB2")
const prenom = document.querySelector(".inputPrenom")
const prenomValide = document.querySelector(".prenomValide")
const nom = document.querySelector(".inputNom")
const nomValide = document.querySelector(".nomValide")
const email = document.querySelector(".inputEmail")
const emailValideBlock = document.querySelector(".emailValide")
const password = document.querySelector(".inputP")
const password2 = document.querySelector(".inputP2")
const verifMotdepasse = document.querySelector(".verifMotdepasse")
const verifMotdepasse2 = document.querySelector(".verifMotdepasse2")

oeil.addEventListener("click", () => {
    password.type = "password"
    oeil.style = "display: none;"
    oeilB.style = "display: block;"
})

oeilB.addEventListener("click", () => {
    password.type = "text"
    oeilB.style = "display: none;"
    oeil.style = "display: block;"
})
oeil2.addEventListener("click", () => {
    password2.type = "password"
    oeil2.style = "display: none;"
    oeilB2.style = "display: block;"
})
oeilB2.addEventListener("click", () => {
    password2.type = "text"
    oeilB2.style = "display: none;"
    oeil2.style = "display: block;"
})

form.addEventListener('submit', () => {
    if (!nameValide() || !lastNameValide() || !emailValide() || !passwordValide() || !passwordValide2()) {
        event.preventDefault();
    }
});

// formConnexion.addEventListener('submit', () => {
//     console.log("test")
//     if (!emailValide() || !passwordValide2()) {
//         event.preventDefault();
//     }
// });

// const creation = document.querySelector("#btnConn")
// const verif = document.querySelector(".verif")
// const verifPassword2 = document.querySelector("#verifPassword2")

function nomPrenomValide(name) {
    const regex = /^[A-Za-zÀ-ÿ -]+$/;
    return regex.test(name);
}
function mailValide(adresseEmail) {
    const regex = /^[a-zA-Z0-9 .-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]{1,}$/;
    return regex.test(adresseEmail);
}
function nameValide() {
    if (!nomPrenomValide(prenom.value)) {
        prenomValide.style = "display: block;"
        prenom.style = "border-color: #ff9d8e;"
        return false
    }
    prenomValide.style = "display: none;"
    prenom.style = "border-color: #b2b2b2;"
    console.log("prenom ok")
    return true
}

function lastNameValide() {
    if (!nomPrenomValide(nom.value)) {
        nomValide.style = "display: block;"
        nom.style = "border-color: #ff9d8e;"
        return false
    }
    nomValide.style = "display: none;"
    nom.style = "border-color: #b2b2b2;"
    console.log("nom ok")
    return true
}

function emailValide() {
    if (!mailValide(email.value)) {
        emailValideBlock.style = "display: block;"
        email.style = "border-color: #ff9d8e;"
        return false
    }
    emailValideBlock.style = "display: none;"
    email.style = "border-color: #b2b2b2;"
    console.log("email ok")
    return true
}

function passwordValide() {
    if (password.value != password2.value) {
        verifMotdepasse.style = "display: block;"
        password.style = "border-color: #ff9d8e;"
        password2.style = "border-color: #ff9d8e;"
        return false
    }
    verifMotdepasse.style = "display: none;"
    password.style = "border-color: #b2b2b2;"
    password2.style = "border-color: #b2b2b2;"
    console.log('mot de passe 1/2 ok')
    return true
}

function passwordValide2() {
    if (password.size < 6) {
        verifMotdepasse2.style = "display: block;"
        password.style = "border-color: #ff9d8e;"
        password2.style = "border-color: #ff9d8e;"
        return false
    }
    verifMotdepasse2.style = "display: none;"
    password.style = "border-color: #b2b2b2;"
    password2.style = "border-color: #b2b2b2;"
    console.log('mot de passe 2/2 ok')
    return true
}