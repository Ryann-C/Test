let IntervalId;
let startTime = localStorage.getItem('chronoStartTime_reponse2') ? parseInt(localStorage.getItem('chronoStartTime_reponse2')) : Math.floor(Date.now() / 1000) + (12 * 60);

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    const formattedMinutes = minutes < 10 ? `0${minutes}` : `${minutes}`;
    const formattedSeconds = remainingSeconds < 10 ? `0${remainingSeconds}` : `${remainingSeconds}`;
    return `${formattedMinutes}:${formattedSeconds}`;
}

function updateChrono() {
    const currentTime = Math.floor(Date.now() / 1000);
    const remainingTime = Math.max(0, startTime - currentTime);
    const chronoElement = document.getElementById('chrono');
    chronoElement.innerText = formatTime(remainingTime);

    // Si le temps restant est inférieur ou égal à 30 secondes, changer la couleur en rouge
    if (remainingTime <= 30) {
        chronoElement.style.color = 'red';
    }

    // Si le temps restant est écoulé
    if (remainingTime === 0) {
        clearInterval(intervalId);
        localStorage.removeItem('chronoStartTime_reponse2');
        window.location.href = 'question3.php'; // Rediriger vers la page question2.php
    }
}


function startChrono() {
    const savedTime = localStorage.getItem('chronoStartTime_reponse2');

    if (!savedTime) {
        // Définir la durée du chrono à 1 min
        startTime = Math.floor(Date.now() / 1000) + (1 * 60)
        localStorage.setItem('chronoStartTime_reponse2', startTime);
    } else {
        startTime = parseInt(savedTime);
    }
}

// Gestionnaire d'événements lorsque la page est rechargée
window.addEventListener('load', function() {
    startChrono(); // Démarrer le chrono lors du rechargement de la page
    startChronoIfActive(); // Vérifier si le chrono doit être démarré lorsque la page est rechargée
});
if (!localStorage.getItem('chronoStartTime_reponse2')) {
    startChrono();
}
const intervalId = setInterval(updateChrono, 1000);
updateChrono();

// Fonction pour réinitialiser le chronomètre
function resetChrono() {
    // Réinitialiser le temps de départ à 1 min 
    clearInterval(intervalId);
    localStorage.removeItem('chronoStartTime_reponse2');
    startTime = Math.floor(Date.now() / 1000) + (1 * 60); // Utiliser la variable globale startTime
    localStorage.setItem('chronoStartTime_reponse2', startTime);
}

// Modifier la fonction startChronoIfActive pour vérifier si la visibilité est 'visible' et que la page est active avant de démarrer le chrono
function startChronoIfActive() {
    if (document.visibilityState === 'visible' && document.hasFocus()) {
        startChrono();
    } else {
        clearInterval(intervalId); // Arrêter le chronomètre lorsque la page devient inactive ou non visible
    }
}

// Gestionnaire d'événements pour détecter lorsque la fenêtre est en premier plan ou lorsque la visibilité de la page change
document.addEventListener('visibilitychange', startChronoIfActive);
window.addEventListener('focus', startChronoIfActive);

// Gestionnaire d'événements pour le bouton "Suivant"
document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
    event.preventDefault(); // Empêcher la soumission du formulaire
    resetChrono(); // Réinitialiser le chronomètre
    document.getElementById('form').submit(); // Soumettre le formulaire
});