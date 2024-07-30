<!DOCTYPE html>
<html>
<head>
    <title>Achievements</title>
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
    <h1>Our Achievements</h1>

    <?php
    // Include the database connection code here.
    require_once('classes/db1.php');
    // Fetch achievements from the database and display them.
    $sql = "SELECT * FROM achievements";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>Title: " . $row["title"] . "<br>Description: " . $row["description"] . "<br>Date: " . $row["date"] . "</p>";
        }
    } else {
        echo "No achievements yet.";
    }

    $conn->close();
    ?>

    <h2>Upload an Achievement</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="date">Date:</label>
        <input type="date" name="date" required><br>
        <label for="image">Upload an Image:</label>
        <input type="file" name="image" accept="image/*" required><br>
        <div class="image-preview">
        <img src="" alt="Image Preview" id="preview">
</div>
        <input type="submit" value="Upload Achievement">
    </form>
</body>
</html>