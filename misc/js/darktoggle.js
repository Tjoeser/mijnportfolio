// Assuming you have only one element with the class 'darklighttoggle'
var toggleButton = document.getElementsByClassName("darklighttoggle")[0];
var currentTheme = localStorage.getItem("theme") || "dark"; // Retrieve theme from localStorage or default to "dark"

// Function to set the theme and update the stylesheet link
function setTheme() {
  var styleLink = document.querySelector('link[rel="stylesheet"]');
  var backgroundLink = document.querySelector('link#background');
  
  if (currentTheme === "light") {
    toggleButton.src = "media/svg/sun-solid.svg";
    styleLink.href = 'media/stylelight.css';
    backgroundLink.href  = 'media/cloudbackground.css';
  } else {
    toggleButton.src = "media/svg/moon-regular.svg";
    styleLink.href = 'media/styledark.css';
    backgroundLink.href  = 'media/starbackground.css';
  }

  localStorage.setItem("theme", currentTheme); // Store the current theme in localStorage
}

// Set the initial theme on page load
setTheme();

// Toggle the theme on button click
toggleButton.onclick = function() {
  currentTheme = (currentTheme === "dark") ? "light" : "dark";
  setTheme();
};
