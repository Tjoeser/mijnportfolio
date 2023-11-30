var consecutiveEscapes = 0;

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        consecutiveEscapes++;

        if (consecutiveEscapes >= 3) {
            if (!isOnAdminPage()) {
                if (window.confirm('Wil je naar de admin pagina?')) {
                    window.location = "index.php?op=admin";
                } else {
                    // They clicked no
                }
            } else {
                if (window.confirm('Wil je naar de home pagina?')) {
                    window.location = "index.php?";
                } else {
                    // They clicked no
                }
            }
            consecutiveEscapes = 0; // Reset the count after the alert
        }
    } else {
        consecutiveEscapes = 0; // Reset the count if a different key is pressed
    }
});

function isOnAdminPage() {
    // Check if the current URL indicates that the user is on the admin page
    return window.location.href.indexOf("admin") !== -1;
}

function sendback() {
    setTimeout(() => {
        window.location.href = 'https://url.com';
    }, 2000);
}

