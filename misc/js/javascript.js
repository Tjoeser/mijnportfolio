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

function hover(element) {
    console.log(element);
    element.setAttribute('src', 'http://dummyimage.com/100x100/eb00eb/fff');
}


document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function (event) {
      event.preventDefault(); // Prevent default anchor behavior

      const target = this.getAttribute('data-target'); // Get target ID
      const section = document.getElementById(target); // Find the target section
      section.scrollIntoView({ behavior: 'smooth' }); // Smooth scroll to the section

      // Update the URL without showing index.php
      const newUrl = window.location.origin + window.location.pathname + '#' + target;
      history.pushState(null, null, newUrl); // Update the URL in the address bar
    });
  });