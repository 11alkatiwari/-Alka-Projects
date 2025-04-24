<?php
session_start();
include('tp.php');

$id = $_GET['id']; 
if (!isset($id)) {
    header("Location: dashboard.php");
    exit();
}

$sql = "SELECT * FROM teet WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact'];
    $gender = $_POST['gender'];
    $event_type = $_POST['event_type'];
    $location = $_POST['location'];

    $image = $row['image'];
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    }
    $sql = "UPDATE user_events SET 
                name='$name', email='$email', contact_number='$contact_number',
                gender='$gender', event_type='$event_type', location='$location',
                image='$image' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>
    <h2>Edit Event</h2>

    <form action="edit.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br>
        Contact Number: <input type="text" name="contact" value="<?php echo htmlspecialchars($row['contact']); ?>" required><br>
        Gender: 
        <select name="gender" required>
            <option value="Male" <?php if($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        </select><br>
        Event Type: <input type="text" name="event_type" value="<?php echo htmlspecialchars($row['event_type']); ?>" required><br>
        Location: <input type="text" name="location" value="<?php echo htmlspecialchars($row['location']); ?>" required><br>
        
        Current Image: <br>
        <img src="<?php echo $row['image']; ?>" width="100" alt="Event Image"><br>
        Upload New Image: <input type="file" name="image"><br>

        <button type="submit">Update Event</button>
    </form>
</body>
</html>
