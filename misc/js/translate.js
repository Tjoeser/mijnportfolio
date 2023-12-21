function googleTranslateElementInit() {
    console.log(navigator.language || navigator.userLanguage)
    new google.translate.TranslateElement(
        { pageLanguage: "en" },
        "google_translate_element"
    );
    type = "text/javascript"
    src = "//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"

}

