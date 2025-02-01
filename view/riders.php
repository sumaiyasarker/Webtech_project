<?php
include "../Model/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Dashboard</title>
    <link rel="stylesheet" href="../css/styles_dashboard.css">
</head>
<body>

<div class="container">
    <h1>Rider List</h1>

    <table>
        <thead>
            <tr>
                <th>Admin Username</th>
                <th>Rider Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Vehicle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = getRiders();

            if ($result === false) {
                die("<p class='error'>SQL Error: " . $conn->error . "</p>");
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['admin_username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['vehicle']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='no-data'>No riders found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div class="links">
        <a href="../Control/rider_add.php">Back to Add Rider</a>
        <a href="../Control/rider_updel.php">Back to Update/Delete Rider</a>
    </div>
</div>

</body>
</html>
