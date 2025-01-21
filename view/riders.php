
<?php
include "../Model/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rider Dashboard</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Rider List</h1>

    <table>
        <thead>
            <tr>
                <th>Admin Username</th> <!-- Added missing header -->
                <th>Rider Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Vehicle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // SQL query to fetch riders and their admin's username
            $result = getRiders();

            // Check for SQL errors
            if ($result === false) {
                die("SQL Error: " . $conn->error);
            }

            // Debugging: Check how many rows were found
            if ($result->num_rows > 0) {
                echo "<p>Debug: Found " . $result->num_rows . " riders.</p>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['admin_username']) . "</td>"; // Display admin username
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>"; // Display rider name
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['vehicle']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p>Debug: No riders found. Check database data and relationships.</p>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <br>
    <a href="../Control/rider_add.php">Back to Add Rider</a>
    <br>
    <a href="../Control/rider_updel.php">Back to Update/Delete Rider</a>
</body>
</html>
