<?php
session_start(); // Start the session

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // Redirect to login page if session is not set
//     header("Location: login.php");
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['']); ?></h2>
    <p>This is your homepage</p>
    <a href="logout.php">Logout</a>
</body>
</html>
