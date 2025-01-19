// JavaScript form validation function
function validateForm() {
    // Validate restaurant registration form fields
    var category_id = document.getElementById("category_id").value;
    var title = document.getElementById("title").value;
    var o_hr = document.getElementById("o_hr").value;
    var c_hr = document.getElementById("c_hr").value;
    var o_days = document.getElementById("o_days").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("address").value;


    // If all validations pass, return true
    return true;
}
