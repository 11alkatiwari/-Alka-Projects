<?php
session_start();
// if (!isset($_SESSION['Name'])) {
//     header("Location: login.php");
//     exit();
// }

include('tp.php'); 
$sql = "SELECT * FROM teet";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Dashboard</title>
</head>
<body>
    <h2>Your Event Submissions</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Gender</th>
            <th>Event Type</th>
            <th>Location</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['event_type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' width='100' class='img-thumbnail'></td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No events found.</td></tr>";
            }
            ?>

    </table>

    <a href="home.php">Go back to home</a>
</body>
</html>
