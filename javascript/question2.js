function redirectionToResponsesPage() {
    window.location.href = '../reponse/reponse2.php';
}

// Fonction pour mettre à jour le chrono
function updateTimer() {
    const timerElement = document.querySelector('.timer');
    let timeLeft;

    // Vérifie s'il y a une valeur dans le localStorage
    if (localStorage.getItem('timeLeft')) {
        timeLeft = parseInt(localStorage.getItem('timeLeft'));
        // Réinitialise le temps à 60 secondes si le décompte est terminé
        if (timeLeft === 0) {
            timeLeft = 60;
        }
    } else {
        timeLeft = 60; // Si aucune valeur n'est trouvée, définissez le temps par défaut à 60 secondes
    }

    const timerInterval = setInterval(() => {
        const minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        timerElement.textContent = minutes + ':' + seconds;
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            redirectionToResponsesPage();
        } else if (timeLeft <= 30) {
            timerElement.style.color = "red";
        }
        // Enregistrez le temps restant dans le localStorage à chaque itération
        localStorage.setItem('timeLeft', timeLeft);
        timeLeft--;
    }, 1000); // Mettre à jour toutes les secondes
}

function resetChrono() {
    // Réinitialiser le temps de départ à 1 min (1* 60 secondes)
    clearInterval(intervalId);
    localStorage.removeItem('chronoStartTime');
    startTime = Math.floor(Date.now() / 1000) + (1 * 60) + 20; // Utiliser la variable globale startTime
    localStorage.setItem('chronoStartTime', startTime);
}

// Démarrez le décompte du temps (1 minute)
document.addEventListener('DOMContentLoaded', updateTimer);