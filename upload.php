<?php
// Include the database connection code here.
require_once('classes/db1.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = $_POST["date"];

    $imageDirectory = "uploads/"; // Create a directory to store uploaded images
    $imageName = $_FILES["image"]["name"];
    $imagePath = $imageDirectory . $imageName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO achievements (title, description, date, image_path) VALUES ('$title', '$description', '$date', '$imagePath')";

    if ($conn->query($sql) === TRUE) {
        echo "Achievement uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Error uploading the image.";
}
}