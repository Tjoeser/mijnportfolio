var succesmessage = document.getElementById('succesmessage');
succesmessage.style.display = 'none'; // Hide the paragraph

$('.emailbutton').on('click', function (e) {
  console.log("infcuntion");
  e.preventDefault();

  var copyText = $(this).attr('data-text');
  var succesmessage = document.getElementById('succesmessage');
  var textarea = document.createElement("textarea");

  textarea.textContent = copyText;
  textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in MS Edge.
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy");

  document.body.removeChild(textarea);
  succesmessage.style.display = 'block'; // Show the paragraph
})


