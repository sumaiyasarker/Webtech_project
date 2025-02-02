<?php
session_start();
include "../Model/db.php";

// Ensure user is logged in

// Function to fetch users from the database
function getUsers()
{
    global $conn;
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$users = getUsers();

// Handle Add, Edit, and Delete actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Add User
        if ($action == 'add') {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
            $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);

            $query = "INSERT INTO users (username, f_name, l_name, email, password, phone, address, status) 
                      VALUES ('$username', '$f_name', '$l_name', '$email', '$password', '$phone', '$address', '$status')";
            mysqli_query($conn, $query);
            header("Location: admin_user.php");
            exit();
        }

        // Edit User
        if ($action == 'edit') {
            $u_id = (int) $_POST['u_id'];
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
            $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $status = mysqli_real_escape_string($conn, $_POST['status']);

            $query = "UPDATE users SET username='$username', f_name='$f_name', l_name='$l_name', email='$email', 
                      phone='$phone', address='$address', status='$status' WHERE u_id=$u_id";
            mysqli_query($conn, $query);
            header("Location: admin_user.php");
            exit();
        }

        // Delete User
        if ($action == 'delete') {
            $u_id = (int) $_POST['u_id'];
            $query = "DELETE FROM users WHERE u_id = $u_id";
            mysqli_query($conn, $query);
            header("Location: admin_user.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" type="text/css" href="../css/styles_r.css">
    <script src="../JS/user.js" defer></script>
</head>
<body>
    <h2>Manage Users</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user['u_id']; ?></td>
                <td><?= htmlspecialchars($user['username']); ?></td>
                <td><?= htmlspecialchars($user['f_name']); ?></td>
                <td><?= htmlspecialchars($user['l_name']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
                <td><?= htmlspecialchars($user['phone']); ?></td>
                <td><?= htmlspecialchars($user['address']); ?></td>
                <td><?= htmlspecialchars($user['status']); ?></td>
                <td>
                    <button onclick="editUser(<?= $user['u_id']; ?>, '<?= $user['username']; ?>', '<?= $user['f_name']; ?>', '<?= $user['l_name']; ?>', '<?= $user['email']; ?>', '<?= $user['phone']; ?>', '<?= $user['address']; ?>', '<?= $user['status']; ?>')">Edit</button>
                    <button onclick="deleteUser(<?= $user['u_id']; ?>)">Delete</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <button onclick="addUser()">Add User</button>

    <!-- Add/Edit User Form -->
    <div id="userForm" style="display:none;">
        <h3 id="formTitle">Add User</h3>
        <form id="form" method="POST">
            <input type="hidden" name="action" id="formAction" value="add">
            <input type="hidden" name="u_id" id="userId">
            <label>Username: <input type="text" name="username" id="username" required></label><br>
            <label>First Name: <input type="text" name="f_name" id="f_name" required></label><br>
            <label>Last Name: <input type="text" name="l_name" id="l_name" required></label><br>
            <label>Email: <input type="email" name="email" id="email" required></label><br>
            <label>Password: <input type="password" name="password" id="password" required></label><br>
            <label>Phone: <input type="text" name="phone" id="phone" required></label><br>
            <label>Address: <input type="text" name="address" id="address" required></label><br>
            <label>Status: <input type="text" name="status" id="status" required></label><br>
            <button type="submit">Save</button>
            <button type="button" onclick="closeForm()">Cancel</button>
        </form>
    </div>
</body>
</html>
