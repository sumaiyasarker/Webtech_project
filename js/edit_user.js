function addCustomer() {
    // Redirect to add customer form
    window.location.href = '../control/add_customer.php';
}

function editCustomer(id) {
    // Redirect to edit customer form with the specific customer's ID
    window.location.href = `../control/edit_customer.php?u_id=${id}`;
}

function deleteCustomer(id) {
    if (confirm("Are you sure you want to delete this customer?")) {
        window.location.href = `../control/delete_customer.php?u_id=${id}`;
    }
}
