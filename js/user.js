function addUser() {
    document.getElementById("formAction").value = "add";
    document.getElementById("formTitle").textContent = "Add User";
    document.getElementById("form").reset();
    document.getElementById("userId").value = ""; // Clear user ID for new users
    document.getElementById("userForm").style.display = "block";
}

function editUser(id, username, f_name, l_name, email, phone, address, status) {
    document.getElementById("userId").value = id;
    document.getElementById("formAction").value = "edit";
    document.getElementById("formTitle").textContent = "Edit User";

    document.getElementById("username").value = username;
    document.getElementById("f_name").value = f_name;
    document.getElementById("l_name").value = l_name;
    document.getElementById("email").value = email;
    document.getElementById("phone").value = phone;
    document.getElementById("address").value = address;
    document.getElementById("status").value = status;

    document.getElementById("userForm").style.display = "block";
}

function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "";
        
        form.innerHTML = `<input type="hidden" name="action" value="delete">
                          <input type="hidden" name="u_id" value="${id}">`;
                          
        document.body.appendChild(form);
        form.submit();
    }
}

function closeForm() {
    document.getElementById("userForm").style.display = "none";
}
