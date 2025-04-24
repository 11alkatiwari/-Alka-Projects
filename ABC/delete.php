<?php
include('tp.php'); 

$user_id = $_GET['id'];

$sql = "DELETE FROM teet WHERE id=$user_id";
if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully!";
} else {
    echo "Error deleting user: " . $conn->error;
}
?>
