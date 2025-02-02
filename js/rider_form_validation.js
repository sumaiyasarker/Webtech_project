<<<<<<< HEAD
function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var phone = document.getElementById('phone').value;
    var status = document.getElementById('status').value;
    var vehicle = document.getElementById('vehicle').value;
    var adminId = document.getElementById('admin_id').value;
    var errorMessages = [];

    // Clear previous error messages
    clearErrors();

    // Validate Name (non-empty)
    if (name.trim() == "") {
        showError('nameError', "Name is required.");
        errorMessages.push("Name is required.");
    }

    // Validate Email (valid format)
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email)) {
        showError('emailError', "Invalid email format.");
        errorMessages.push("Invalid email format.");
    }

    // Validate Password (non-empty)
    if (password.trim() == "") {
        showError('passwordError', "Password is required.");
        errorMessages.push("Password is required.");
    }

    // Validate Phone (10 digits)
    var phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(phone)) {
        showError('phoneError', "Phone number must be 10 digits.");
        errorMessages.push("Phone number must be 10 digits.");
    }

    // Validate Vehicle (non-empty)
    if (vehicle.trim() == "") {
        showError('vehicleError', "Vehicle is required.");
        errorMessages.push("Vehicle is required.");
    }

    // Validate Admin ID (must be a positive number)
    if (isNaN(adminId) || adminId <= 0) {
        showError('adminIdError', "Admin ID must be a positive number.");
        errorMessages.push("Admin ID must be a positive number.");
    }

    // If there are any error messages, prevent form submission
    if (errorMessages.length > 0) {
        return false;  // Prevent form submission
    }

    // If no errors, allow form submission
    return true;
}

// Show error messages below the respective input fields
function showError(elementId, message) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerText = message;
    errorElement.style.color = "red";
}

// Clear previous error messages
function clearErrors() {
    var errorElements = document.querySelectorAll('.error');
    errorElements.forEach(function(element) {
        element.innerText = '';
    });
}
=======
function validateName() {
    const name = document.getElementById("name");
    if (!name || name.value.trim() === "") {
        document.getElementById("nameError").innerText = "Name is required.";
        return false;
    }
    document.getElementById("nameError").innerText = "";
    return true;
}
 
function validateEmail() {
    const email = document.getElementById("email");
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email || !emailRegex.test(email.value)) {
        document.getElementById("emailError").innerText = "Enter a valid email.";
        return false;
    }
    document.getElementById("emailError").innerText = "";
    return true;
}
 
function validatePassword() {
    const password = document.getElementById("password");
    if (!password || password.value.length < 6) {
        document.getElementById("passwordError").innerText = "Password must be at least 6 characters.";
        return false;
    }
    document.getElementById("passwordError").innerText = "";
    return true;
}
 
function validatePhone() {
    const phone = document.getElementById("phone").value;
    const phoneRegex = /^(?:\+8801|01)[3-9]\d{8}$/;
    if (!phoneRegex.test(phone)) {
        document.getElementById("phoneError").innerText = "Enter a valid Bangladeshi phone number (e.g., +88017xxxxxxxx or 017xxxxxxxx).";
        return false;
    }
    document.getElementById("phoneError").innerText = "";
    return true;
}
 
function validateStatus() {
    const status = document.getElementById("status");
    if (!status || status.value.trim() === "") {
        document.getElementById("statusError").innerText = "Please select a status.";
        return false;
    }
    document.getElementById("statusError").innerText = "";
    return true;
}
 
function validateVehicle() {
    const vehicle = document.getElementById("vehicle");
    if (!vehicle || vehicle.value.trim() === "") {
        document.getElementById("vehicleError").innerText = "Vehicle is required.";
        return false;
    }
    document.getElementById("vehicleError").innerText = "";
    return true;
}
 
function validateAdminID() {
    const adminId = document.getElementById("admin_id");
    if (!adminId || adminId.value.trim() === "") {
        document.getElementById("adminError").innerText = "Admin ID is required.";
        return false;
    }
    document.getElementById("adminError").innerText = "";
    return true;
}
 
function validateRiderForm() {
    return (
        validateName() &&
        validateEmail() &&
        validatePassword() &&
        validatePhone() &&
        validateStatus() &&
        validateVehicle() &&
        validateAdminID()
    );
}
>>>>>>> 1ce2214 (my file)
