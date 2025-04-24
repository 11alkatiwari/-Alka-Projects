<?php
include 'tp.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['Name'];
    $email = $_POST['Email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO teet (Name, Email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
         header ("Location: login.php");
        echo "User registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="log.png" alt="Logo" height="50"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="service.html">Our Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                        </ul>
                        <a class="btn btn-warning ms-3" href="reg.php">Sign Up</a>
                    </div>
                </div>
            </nav>
        <main>
        <form action="reg.php" method="post">
    Username: <input type="text" name="Name" required>
    Email: <input type="email" name="Email" required>
    Password: <input type="password" name="password" required>
    <button
        type="submit"
        class="btn btn-primary"
    >
        Submit
    </button>
    </button>
</form>
        </main>
        <footer class="fixed-bottom py-4 text-center bg-dark text-light">
        <p>&copy; 2025 Event Management. All Rights Reserved.</p>
    </footer>
       
    </body>
</html>

