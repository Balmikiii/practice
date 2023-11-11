<?php
// Establish a database connection
$conn = new mysqli("your_server_name", "your_username", "your_password", "your_database_name");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the image data from the database (you may need to modify the SQL statement)
$sql = "SELECT image_data FROM images WHERE image_id = ?"; // Change image_id to the appropriate identifier for your records
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $imageId); // Set $imageId to the desired image ID

if ($stmt->execute()) {
    $stmt->bind_result($imgData);
    $stmt->fetch();

    // Display the image
    header("Content-type: image/jpeg"); // Adjust the content type based on your image type
    echo $imgData;
} else {
    echo "Image not found.";
}

// Close the database connection
$conn->close();
?>
