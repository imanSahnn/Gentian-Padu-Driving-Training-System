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

if (isset($_POST['S_Ic'])) {
    $icNumber = $_POST['S_Ic'];

    // Check if the IC number already exists
    $check_query = "SELECT * FROM student WHERE S_Ic = ?";
    if ($check_stmt = $conn->prepare($check_query)) {
        $check_stmt->bind_param('s', $icNumber);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            echo 'IC Number already exists. Please use a different IC Number.';
        }

        $check_stmt->close();
    } else {
        echo 'Error Occurred';
    }
}

$conn->close();
?>
