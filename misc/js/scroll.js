// Get all elements with the class "rightcard"
var elements = document.getElementsByClassName("rightcard");

// Create an array to keep track of whether each element is currently "moving" or "stuck"
var isMoving = Array(elements.length).fill(false);

// Initialize a variable to keep track of the index of the currently "stuck" element
var currentStuckIndex = -1;

// Listen for the scroll event on the window
window.addEventListener("scroll", function () {
    // Loop through all elements with the class "rightcard"
    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        // Get the position of the element relative to the viewport
        var rect = element.getBoundingClientRect();

        // Check if the current element is the same as the previously "stuck" element
        if (i === currentStuckIndex) {
            // If the element is no longer in the viewport or has scrolled out of view
            if (rect.top > 0 || rect.bottom <= 0) {
                // Mark it as not "moving"
                isMoving[i] = false;
                // Set its position to "static" to release it
                element.style.position = "static";
                // Reset the currently "stuck" element index
                currentStuckIndex = -1;
            }
        } else if (rect.top <= 20 && !isMoving[i]) {
            // If the element is at the top of or above the viewport and not already "moving"
            // Mark it as "moving"
            isMoving[i] = true;
            // Set its position to "fixed" to make it sticky
            element.style.position = "fixed";
            element.style.top = "0";
            
            // If there was a previously "stuck" element, release it
            if (currentStuckIndex !== -1) {
                // Mark it as not "moving"
                isMoving[currentStuckIndex] = false;
                // Set its position to "static" to release it
                elements[currentStuckIndex].style.position = "static";
            }
            
            // Update the currently "stuck" element index to the current element
            currentStuckIndex = i;
        }
    }
});
