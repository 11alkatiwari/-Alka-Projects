<?php
include('tp.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;

    $sql = "UPDATE users SET Name='$username', Email='$email'";
    
    if ($password) {
        $sql .= ", password='$password'";
    }
    
    $sql .= " WHERE id=$user_id";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully!";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>
