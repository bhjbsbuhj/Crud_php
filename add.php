<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>

<?php include 'config.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : ''; 

    // Handle File Upload
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $display_pic = $target_dir . basename($_FILES["display_pic"]["name"]);
    move_uploaded_file($_FILES["display_pic"]["tmp_name"], $display_pic);

    $sql = "INSERT INTO users (name, gender, dob, address, hobbies, display_pic) 
            VALUES ('$name', '$gender', '$dob', '$address', '$hobbies', '$display_pic')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-message' style='color: green;'>New record created successfully!</div>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="form-container">
    <h2>Add New User</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label class="gender-label">Gender:</label>
        <div class="gender-container">
            <input type="radio" name="gender" value="Male" required> Male
            <input type="radio" name="gender" value="Female" required> Female
        </div><br>

        <label for="dob">DOB:</label>
        <input type="date" name="dob" required><br>

        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br>

        <label for="hobbies">Hobbies:</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Reading"> Reading</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Traveling"> Traveling</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Sports"> Sports</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Cooking"> Cooking</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Music"> Music</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Photography"> Photography</label><br>


        <label for="display_pic">Display Pic:</label>
        <input type="file" name="display_pic" required><br>

        <input type="submit" value="Add User">
    </form>

    <div class="center-btn">
        <button onclick="window.location.href='index.php'" class="btn">Back</button>
    </div>
</div>

</body>
</html>