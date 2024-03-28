<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gentianpadu';

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {
    exit('Error connecting to Gentian Padu: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch image content based on the provided ID
    $stmt = $conn->prepare('SELECT S_Img FROM student WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Set the appropriate header for an image file
        header('Content-Type: image/jpeg');
        header('Content-Disposition: attachment; filename="student_image.jpg"');

        // Output the image content
        echo $row['S_Img'];
    } else {
        echo 'Image not found';
    }

    $stmt->close();
} else {
    echo 'Invalid request';
}

$conn->close();
?>
