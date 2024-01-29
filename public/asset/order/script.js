function formatCarte(event) {
    let input = event.target.value.replace(/\D/g, '').substring(0, 16)
    input = input.replace(/(\d{4})(?!$)/g, '$1 ').trim()
    event.target.value = input
}

function formatDate(event) {
    let input = event.target.value.replace(/\D/g, '').substring(0, 4)
    if (input.length > 2) {
        input = input.substring(0, 2) + '/' + input.substring(2)
    }
    event.target.value = input
}

// function formatCVV(event) {
//     let input = event.target.value.replace(/\D/g, '').substring(0, 4)
//     if (input.length > 2) {
//         input = input.substring(0, 2) + '/' + input.substring(2)
//     }
//     event.target.value = input
// }

function toggleRadioCB() {
    let radio = document.getElementById("radioCB")
    radio.checked = true
}

function toggleRadioPayPal() {
    let radio = document.getElementById("radioPayPal")
    radio.checked = true
}

function toggleCheckbox() {
    let checkbox = document.getElementById("coordonneesBancaires")
    checkbox.checked = !checkbox.checked
}

const radioPayPal = document.getElementById("radioPayPal")
const radioCB = document.getElementById("radioCB")
const formPaypal = document.querySelector(".formPaypal")
const formCarte = document.querySelector(".formCarte")
const labelPayPal = document.getElementById("labelPayPal")
const labelCarte = document.getElementById("labelCarte")

const carte = document.querySelector(".card")

function toggleFormPayPal() {
    if (radioPayPal.checked) {
        formCarte.classList.add("cacherFormCarte")
        formPaypal.classList.add("afficherFormPaypal")
        formPaypal.classList.remove("formPayPal")
        carte.classList.add('focused')
    }
}

function toggleFormCarte() {
    if (radioCB.checked) {
        formCarte.classList.remove("cacherFormCarte")
        formPaypal.classList.add("formPayPal")
        formPaypal.classList.remove("afficherFormPaypal")
        carte.classList.remove('focused')
    }
}

radioPayPal.addEventListener("change", function() {
    toggleFormPayPal()
})

radioCB.addEventListener("change", function() {
    toggleFormCarte()
})

labelPayPal.addEventListener("click", function() {
    toggleFormPayPal()
})

labelCarte.addEventListener("click", function() {
    toggleFormCarte()
})

//RECUPERER LES NUMEROS DU CLIENT POUR LES AFFICHER SUR LA CARTE
const numero_card_client = document.getElementById("inputNum")
const numero_card = document.querySelector(".card_number")

numero_card_client.addEventListener("input", () => {
    numero_card.textContent = numero_card_client.value
    if (numero_card.textContent.length == 0){
        numero_card.textContent = "1234 5678 1234 5678"
    }
});

//RECUPERER LES NOMS / PRENOMS DU CLIENT POUR LES AFFICHER SUR LA CARTE
const nom_client = document.querySelector("#inputName")
const nom_client_card = document.querySelector(".card_name")

nom_client.addEventListener("input", () => {
    nom_client_card.textContent = nom_client.value.toUpperCase()
    if (nom_client_card.textContent.length == 0){
        nom_client_card.textContent = "HENRI DUPONT"
    }
})

//RECUPERER LE mois / l'année  DU CLIENT POUR LES AFFICHER SUR LA CARTE
const date_client = document.querySelector("#inputExp")
const date_client_card = document.querySelector(".card_expire")

date_client.addEventListener("input", () => {
    date_client_card.textContent = "Expire en : " + date_client.value
    if (date_client_card.textContent == "Expire en : "){
        date_client_card.textContent = "Expire en : MM/AA"
    }
});

//RECUPERER LE CRYPTOGRAMME  DU CLIENT POUR LES AFFICHER SUR LA CARTE
const crypto_client = document.querySelector("#inputCVV")
const crypto_client_card = document.querySelector(".value_crypto")

crypto_client.addEventListener("input", () => {
    crypto_client_card.textContent = crypto_client.value
    if (crypto_client_card.textContent.length == 0){
        crypto_client_card.textContent = "000"
    }
})

const valider = document.querySelector('.valider')
const carteIncorrecte = document.querySelector('.carteIncorrecte')
const CVVIncorrect = document.querySelector('.CVVIncorrect')
const dateIncorrecte = document.querySelector('.dateIncorrecte')
const nameIncorrect = document.querySelector('.nameIncorrect')

function nameValide() {
    if (nom_client.value.length == 0) {
        nameIncorrect.style.display = 'block'
        return false
    }
    nameIncorrect.style.display = 'none'
    return true
}

function carteValide() {
    if (numero_card_client.value.length != 19) {
        carteIncorrecte.style.display = 'block'
        return false
    }
    carteIncorrecte.style.display = 'none'
    return true
}

function dateValide() {
    var date = date_client.value
    let valeurs = date.split('/')

    let mois = valeurs[0]
    let annee = valeurs[1]

    let anneeActuelle = new Date().getFullYear()

    let moisActuel = new Date().getMonth()+1

    if (mois < 0 || mois > 12 || annee < anneeActuelle % 100 || date.length == 0 || (annee == anneeActuelle && mois < moisActuel)) {
        dateIncorrecte.style.display = 'block'
        return false
    }
    dateIncorrecte.style.display = 'none'
    return true

}

function CVVValide() {
    if (crypto_client.value.length != 3) {
        CVVIncorrect.style.display = 'block'
        return false
    }
    CVVIncorrect.style.display = 'none'
    return true
}

const validerP = document.querySelector('.validerP')
const emailPaypal = document.querySelector('.emailPaypal')
const passwordPaypal = document.querySelector('.passwordPaypal')
const emailIncorrect = document.querySelector('.emailIncorrect')
const passwordIncorrect = document.querySelector('.passwordIncorrect')

function mailValide(adresseEmail) {
    const regex = /^[a-zA-Z0-9 .-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]{1,}$/;
    return regex.test(adresseEmail);
}

function emailValide() {
    if (emailPaypal.value.length == 0 || !mailValide(emailPaypal.value)) {
        emailIncorrect.style.display = 'block'
        return false
    }
    emailIncorrect.style.display = 'none'
    return true
}

function passwordValide() {
    if (passwordPaypal.value.length == 0) {
        passwordIncorrect.style.display = 'block'
        return false
    }
    passwordIncorrect.style.display = 'none'
    return true
}


const errorAdress = document.querySelector('.errorAdresse')
const adress1 = document.querySelector('.adress1')
const adress2 = document.querySelector('.adress2')
const adress3 = document.querySelector('.adress3')
const adress4 = document.querySelector('.adress4')
const adress5 = document.querySelector('.adress5')
const adress6 = document.querySelector('.adress6')
const adress7 = document.querySelector('.adress7')

function adressValide() {
    console.log('test')
    if (adress1.value.length == 0 || adress2.value.length == 0 || adress3.value.length == 0 || adress4.value.length == 0 || adress5.value.length == 0 || adress6.value.length == 0 || adress7.value.length == 0) {
        errorAdress.style.display = 'block'
        return false
    }
    errorAdress.style.display = 'none'
    return true
}

valider.addEventListener('click', () => {
    if (!nameValide() || !carteValide() || !dateValide() || !CVVValide() || !adressValide()) {
        event.preventDefault()
    }
})

validerP.addEventListener('click', () => {
    if (!emailValide() || !passwordValide() || !adressValide()) {
        event.preventDefault()
    }
})