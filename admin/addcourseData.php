<?php
// Separate file for database connection (conn.php)
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gentianpadu';

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {
    exit('Error connecting to Gentian Padu: ' . mysqli_connect_error());
}

if (!isset($_POST['C_Name'], $_POST['C_Price'], $_POST['C_Info'])) {
    exit('Empty Field(s)');
}

if (empty($_POST['C_Name']) || empty($_POST['C_Price']) || empty($_POST['C_Info'])) {
    exit('Value Empty');
}

// Include the database connection
include 'conn.php';

// Check if the tutor name already exists
$check_query = "SELECT * FROM course WHERE C_Name=?";
if ($check_stmt = $conn->prepare($check_query)) {
    $check_stmt->bind_param('s', $_POST['C_Name']);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo 'Course already exists. Please choose a different name.';
        $check_stmt->close();
        $conn->close();
        exit();
    }

    $check_stmt->close();
}

// Insert new tutor if the name doesn't exist
$insert_query = "INSERT INTO course (C_Name, C_Price, C_Info) VALUES (?, ?, ?)";
if ($stmt = $conn->prepare($insert_query)) {
    $stmt->bind_param('sss', $_POST['C_Name'], $_POST['C_Price'], $_POST['C_Info']);
    $stmt->execute();
    $stmt->close();

    // Redirect after successful registration
    header("Location: CourseAdmin.php");
    exit();
} else {
    echo 'Error Occurred';
}

$conn->close();
?>
