let boutonModif = document.querySelector('.modif_profil')
let formModif = document.querySelector('.formModifProfil')
let confirm = document.querySelector('.confirmation')
let pourModif = document.querySelectorAll('.pourModif')
let span = document.querySelectorAll('span')

var enModif = false

if (!enModif) {
    pourModif.forEach(function(element) {
        element.style.display = 'none'
    })
}

boutonModif.addEventListener('click', function () {
    event.preventDefault()
    enModif = true
    pourModif.forEach(function(element) {
        element.style.display = 'block'
    });
    boutonModif.style.display = 'none'
    span.forEach(function(element) {
        element.style.display = 'none'
    });
})

confirm.addEventListener('click', function () {
    enModif = false
    pourModif.forEach(function(element) {
        element.style.display = 'none'
    })
})