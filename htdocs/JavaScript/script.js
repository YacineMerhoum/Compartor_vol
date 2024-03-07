// CARROUSEL ANIME PHOTOS ACCUEIL

const slides = document.querySelectorAll('.carousel-slide');
let currentSlide = 0;

function nextSlide() {
  slides[currentSlide].classList.remove('active');
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].classList.add('active');
}

setInterval(nextSlide, 5000);

//LOADER
// Fonction pour afficher le loader
function showLoader() {
    document.getElementById("loader").style.display = "block";
}


function hideLoader() {
    setTimeout(function() {
        document.getElementById("loader").style.display = "none";
    }, 2000); 
}

// Événement lorsque la page est en cours de chargement
document.addEventListener("DOMContentLoaded", function() {
    showLoader(); // Afficher le loader lorsque la page commence à charger
});

// Événement lorsque la page a fini de charger
window.addEventListener("load", function() {
    hideLoader(); // Cacher le loader après 2 secondes
});


// BOUTON RACCOURCI POUR QUE ÇA ENVOI SUR LES DESTINATIONS 
function scrollToMiddle() {
    let middleOfPage = document.body.scrollHeight / 3.3;
    window.scrollTo(0, middleOfPage);
}