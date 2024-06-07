function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    const formattedMinutes = minutes < 10 ? `0${minutes}` : `${minutes}`;
    const formattedSeconds = remainingSeconds < 10 ? `0${remainingSeconds}` : `${remainingSeconds}`;
    return `${formattedMinutes}:${formattedSeconds}`;
}

function startChrono() {
    let startTime;
    const savedTime = localStorage.getItem('chronoStartTime_question3.php');

    if (savedTime) {
        startTime = parseInt(savedTime);
    } else {
        startTime = Math.floor(Date.now() / 1000) + 60;
        localStorage.setItem('chronoStartTime_question3.php', startTime);
    }

    function updateChrono() {
        const currentTime = Math.floor(Date.now() / 1000);
        const remainingTime = Math.max(0, startTime - currentTime);
        const chronoElement = document.getElementById('chrono');
        chronoElement.innerText = formatTime(remainingTime);

        if (remainingTime <= 15) {
            chronoElement.style.color = 'red';
        }

        if (remainingTime === 0) {
            clearInterval(intervalId);
            localStorage.removeItem('chronoStartTime_question3.php');
            window.location.href = '../reponse/reponse3.php';
        }
    }

    const intervalId = setInterval(updateChrono, 1000);
    updateChrono();
}

startChrono();