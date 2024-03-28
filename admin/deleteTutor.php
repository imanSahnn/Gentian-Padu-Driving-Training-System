<?php
session_start();
include('conn.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $tutorId = $_GET['id'];

    // Delete the tutor record from the database
    $deleteSql = "DELETE FROM tutor WHERE Tutor_Id = $tutorId";
    
    if ($conn->query($deleteSql) === TRUE) {
        echo "Tutor deleted successfully.";
        header("Location: TutorAdmin.php");
        exit();
    } else {
        echo "Error deleting tutor: " . $conn->error;
    }
} else {
    echo "Invalid tutor ID";
}

$conn->close();
?>
