document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const comment = document.querySelector("textarea[name='comment']"); // Use the correct selector

  form.addEventListener("submit", function (e) {
    clearErrors();

    let isValid = true;

    // Validate Comment
    if (!comment.value.trim()) {
      showError(comment, "Please provide a comment.");
      isValid = false;
    } else if (comment.value.length < 5) {
      showError(comment, "Comment must be at least 5 characters long.");
      isValid = false;
    } else if (comment.value.length > 500) {
      showError(comment, "Comment must not exceed 500 characters.");
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault(); // Prevent form submission if validation fails
    }
  });

  // Function to show an error message
  function showError(input, message) {
    const errorSpan = document.createElement("span");
    errorSpan.className = "error-message";
    errorSpan.textContent = message;
    input.parentElement.appendChild(errorSpan);
    input.classList.add("input-error");
  }

  // Function to clear all error messages
  function clearErrors() {
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((error) => error.remove());
    const inputsWithError = document.querySelectorAll(".input-error");
    inputsWithError.forEach((input) => input.classList.remove("input-error"));
  }
});
