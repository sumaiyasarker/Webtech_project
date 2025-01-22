<?php
session_start();
include "../Model/db.php";

// Ensure user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: ../view/login.php");
    exit();
}

// Function to fetch customers from the database
function getCustomers()
 {
    global $conn;
    $query = "SELECT * FROM customer";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $customers = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $customers[] = $row;
        }
        return $customers;
    } else {
        return [];
    }
}

$customers = getCustomers();

// Handle Add, Edit, and Delete actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Add Customer
        if ($action == 'add') {
            $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
            $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $delivery_address = mysqli_real_escape_string($conn, $_POST['delivery_address']);

            $query = "INSERT INTO customer (f_name, l_name, phone, email, address, delivery_address) 
                      VALUES ('$f_name', '$l_name', '$phone', '$email', '$address', '$delivery_address')";
            mysqli_query($conn, $query);
            header("Location: user_cus.php");
            exit();
        }

        // Edit Customer
        if ($action == 'edit') {
            $id = (int) $_POST['id']; // Ensure the ID is an integer
            $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
            $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $delivery_address = mysqli_real_escape_string($conn, $_POST['delivery_address']);

            // Check if ID is valid and not empty
            if ($id > 0) {
                $query = "UPDATE customer SET f_name='$f_name', l_name='$l_name', phone='$phone', email='$email', 
                          address='$address', delivery_address='$delivery_address' WHERE id=$id";
                if (mysqli_query($conn, $query)) {
                    header("Location: user_cus.php");
                    exit();
                } else {
                    echo "Error updating customer: " . mysqli_error($conn);
                }
            } else {
                echo "Invalid customer ID.";
            }
        }

    // Delete Customer
if ($action == 'delete') {
    $id = (int) $_POST['id']; // Ensure the ID is an integer
    if ($id > 0) {
        // Delete related orders first
        $deleteOrdersQuery = "DELETE FROM orders WHERE id = $id";
        if (!mysqli_query($conn, $deleteOrdersQuery)) {
            echo "Error deleting related orders: " . mysqli_error($conn);
            exit();
        }

        // Then delete the customer
        $query = "DELETE FROM customer WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            header("Location: user_cus.php");
            exit();
        } else {
            echo "Error deleting customer: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid customer ID.";
    }
}

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Customers</title>
</head>
<body>
    <h2>Manage Customers</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Delivery Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer) { ?>
            <tr>
                <td><?= $customer['id']; ?></td>
                <td><?= htmlspecialchars($customer['f_name']); ?></td>
                <td><?= htmlspecialchars($customer['l_name']); ?></td>
                <td><?= htmlspecialchars($customer['phone']); ?></td>
                <td><?= htmlspecialchars($customer['email']); ?></td>
                <td><?= htmlspecialchars($customer['address']); ?></td>
                <td><?= htmlspecialchars($customer['delivery_address']); ?></td>
                <td>
                    <button onclick="editCustomer(<?= $customer['id']; ?>)">Edit</button>
                    <button onclick="deleteCustomer(<?= $customer['id']; ?>)">Delete</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <button onclick="addCustomer()">Add Customer</button>

    <!-- Add/Edit Customer Form (hidden by default) -->
    <div id="customerForm" style="display:none;">
        <h3 id="formTitle">Add Customer</h3>
        <form id="form" method="POST">
            <input type="hidden" name="action" value="add" id="formAction">
            <input type="hidden" name="id" id="customerId">
            <label for="f_name">First Name:</label>
            <input type="text" name="f_name" id="f_name" required><br>
            <label for="l_name">Last Name:</label>
            <input type="text" name="l_name" id="l_name" required><br>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required><br>
            <label for="delivery_address">Delivery Address:</label>
            <input type="text" name="delivery_address" id="delivery_address" required><br>
            <button type="submit">Save</button>
            <button type="button" onclick="closeForm()">Cancel</button>
        </form>
    </div>

    <script>
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
    </script>
</body>
</html>
