<?php
if (isset($_POST['upload'])) {
    // Check if a file was uploaded
    if ($_FILES['image']['size'] > 0) {
        // Establish a database connection
        $conn = new mysqli("localhost", "root", "", "cus_primary");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get file data
        $image = $_FILES['image']['tmp_name'];
        $imgData = file_get_contents($image);

        // Insert the image into the database (you may need to modify the SQL statement)
        $sql = "INSERT INTO msg (user) VALUES (5555)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("b", $imgData);

        if ($stmt->execute()) {
            echo "Image uploaded successfully!";
        } else {
            echo "Error uploading image.";
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "Please select a file to upload.";
    }
}
?>
