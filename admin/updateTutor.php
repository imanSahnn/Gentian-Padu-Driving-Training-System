<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tutorId = $_POST['tutorId'];
    $tutorName = $_POST['tutorName'];
    $tutorEmail = $_POST['tutorEmail'];
    $tutorAddress = $_POST['tutorAddress'];

    // Update tutor details in the database
    $sql = "UPDATE tutor SET T_Name='$tutorName', T_Email='$tutorEmail', T_Address='$tutorAddress' WHERE Tutor_Id=$tutorId";

    if ($conn->query($sql) === TRUE) {
        echo "Tutor updated successfully";
        header("Location: TutorAdmin.php"); // Redirect to the tutor list page after updating
        exit;
    } else {
        echo "Error updating tutor: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
