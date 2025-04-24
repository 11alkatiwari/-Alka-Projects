<?php
include('tp.php'); 

$sql = "SELECT * FROM teet";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Username</th><th>Email</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td>";
        echo "<td><a href='edit_user.php?id=" . $row['id'] 
        . "'>Edit</a> | <a href='delete_user.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No users found";
}
?>
