const boutonAutresProduits = document.getElementById('autresProduits');
let nb = 0;

const produitsCaches = document.querySelectorAll('.product');

// Afficher les prochains produits cachés
for (let i = 0; i < 4 && nb < produitsCaches.length; i++) {
    produitsCaches[nb].classList.add('visible');
    nb++;
}

boutonAutresProduits.addEventListener('click', function() {
    const produitsCaches = document.querySelectorAll('.product');

    // Afficher les prochains produits cachés
    for (let i = nb; i < produitsCaches.length; i++) {
        produitsCaches[i].classList.add('visible');
    }

    boutonAutresProduits.style.display = 'none';
});

