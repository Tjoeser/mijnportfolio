// translate.js

function toggleLanguage() {
    // Define translations object for each language
    var translations = {
        'nl': {
            'welcomeMessage': 'Mijn Portfolio Website',
            'mobileVersionMessage': 'Mobile version\nCheck de webversie die is iets mooier.',
            // Add more translations as needed
        },
        'en': {
            'welcomeMessage': 'My Portfolio Website',
            'mobileVersionMessage': 'Mobile version\nCheck the web version, it looks a bit nicer.',
            // Add more translations as needed
        }
    };

    // Get the current language (assuming you have a way to track the language)
    var currentLanguage = 'nl'; // Change this to dynamically get the language

    // Translate all elements with a data-lang attribute
    var elements = document.querySelectorAll('[data-lang]');
    elements.forEach(function(element) {
        var langKey = element.getAttribute('data-lang');
        if (translations[currentLanguage] && translations[currentLanguage][langKey]) {
            element.innerHTML = translations[currentLanguage][langKey];
        }
    });
}

// Example usage
document.addEventListener('DOMContentLoaded', function() {
    toggleLanguage();
});
