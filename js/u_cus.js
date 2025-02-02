function addCustomer() {
    document.getElementById("formAction").value = "add";
    document.getElementById("formTitle").textContent = "Add Customer";
    document.getElementById("form").reset();
    document.getElementById("customerForm").style.display = "block";
}

function editCustomer(id) {
    // Set the ID of the customer
    document.getElementById("customerId").value = id;
    document.getElementById("formAction").value = "edit";
    document.getElementById("formTitle").textContent = "Edit Customer";
    document.getElementById("customerForm").style.display = "block";
}

function deleteCustomer(id) {
    if (confirm("Are you sure you want to delete this customer?")) {
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "";
        const actionField = document.createElement("input");
        actionField.type = "hidden";
        actionField.name = "action";
        actionField.value = "delete";
        form.appendChild(actionField);

        const idField = document.createElement("input");
        idField.type = "hidden";
        idField.name = "id";
        idField.value = id;
        form.appendChild(idField);

        document.body.appendChild(form);
        form.submit();
    }
}

function closeForm() {
    document.getElementById("customerForm").style.display = "none";
}