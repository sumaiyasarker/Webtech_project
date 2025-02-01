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