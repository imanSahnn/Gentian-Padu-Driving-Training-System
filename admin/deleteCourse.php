<?php
session_start();
include('conn.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $courseId = $_GET['id'];

    // Delete the tutor record from the database
    $deleteSql = "DELETE FROM course WHERE Course_Id = $courseId";
    
    if ($conn->query($deleteSql) === TRUE) {
        echo "Student deleted successfully.";
        header("Location: CourseAdmin.php");
        exit();
    } else {
        echo "Error deleting student: " . $conn->error;
    }
} else {
    echo "Invalid course ID";
}

$conn->close();
?>
