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

if (!isset($_POST['T_Name'], $_POST['T_Address'], $_POST['T_Email'], $_POST['T_Password'])) {
    exit('Empty Field(s)');
}

if (empty($_POST['T_Name']) || empty($_POST['T_Address']) || empty($_POST['T_Email']) || empty($_POST['T_Password'])) {
    exit('Value Empty');
}

// Include the database connection
include 'conn.php';

// Check if the tutor name already exists
$check_query = "SELECT * FROM tutor WHERE T_Name=?";
if ($check_stmt = $conn->prepare($check_query)) {
    $check_stmt->bind_param('s', $_POST['T_Name']);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo 'Tutor Name already exists. Please choose a different name.';
        $check_stmt->close();
        $conn->close();
        exit();
    }

    $check_stmt->close();
}

// Insert new tutor if the name doesn't exist
$insert_query = "INSERT INTO tutor (T_Name, T_Email, T_Password, T_Address) VALUES (?, ?, ?, ?)";
if ($stmt = $conn->prepare($insert_query)) {
    $password = password_hash($_POST['T_Password'], PASSWORD_DEFAULT);
    $stmt->bind_param('ssss', $_POST['T_Name'], $_POST['T_Email'], $password, $_POST['T_Address']);
    $stmt->execute();
    echo 'Successfully Registered';
    header("Location: TutorAdmin.php");
    exit();
    $stmt->close();
} else {
    echo 'Error Occurred';
}

$conn->close();
?>
