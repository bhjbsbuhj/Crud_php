<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>

<?php include 'config.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $hobbies = implode(", ", $_POST['hobbies']);
    $sql = "UPDATE users SET name='$name', gender='$gender', dob='$dob', address='$address', hobbies='$hobbies' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="form-container">
    <h2>Edit User</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $row['name'] ?>" required><br>

        <label for="gender">Gender:</label>
        <div class="gender-container">
            <input type="radio" name="gender" value="Male" <?= ($row['gender'] == 'Male') ? 'checked' : '' ?>> Male
            <input type="radio" name="gender" value="Female" <?= ($row['gender'] == 'Female') ? 'checked' : '' ?>> Female
        </div><br>

        <label for="dob">DOB:</label>
        <input type="date" name="dob" value="<?= $row['dob'] ?>" required><br>

        <label for="address">Address:</label>
        <textarea name="address"><?= $row['address'] ?></textarea><br>

        <label for="hobbies">Hobbies:</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Reading" <?= (in_array('Reading', explode(', ', $row['hobbies']))) ? 'checked' : '' ?>> Reading</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Traveling" <?= (in_array('Traveling', explode(', ', $row['hobbies']))) ? 'checked' : '' ?>> Traveling</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Sports" <?= (in_array('Sports', explode(', ', $row['hobbies']))) ? 'checked' : '' ?>> Sports</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Cooking" <?= (in_array('Cooking', explode(', ', $row['hobbies']))) ? 'checked' : '' ?>> Cooking</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Music" <?= (in_array('Music', explode(', ', $row['hobbies']))) ? 'checked' : '' ?>> Music</label><br>
        <label><input type="checkbox" name="hobbies[]" value="Photography" <?= (in_array('Photography', explode(', ', $row['hobbies']))) ? 'checked' : '' ?>> Photography</label><br><br>

        <input type="submit" value="Update User">
    </form>
    <div class="center-btn">
        <button onclick="window.location.href='index.php'" class="btn">Back</button>
    </div>
</div>

</body>
</html>
