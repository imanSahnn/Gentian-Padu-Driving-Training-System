<?php
session_start();
include('conn.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $studentId = $_GET['id'];

    // Delete the tutor record from the database
    $deleteSql = "DELETE FROM student WHERE Student_Id = $studentId";
    
    if ($conn->query($deleteSql) === TRUE) {
        echo "Student deleted successfully.";
        header("Location: StudentAdmin.php");
        exit();
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    echo "Invalid student ID";
}

$conn->close();
?>
