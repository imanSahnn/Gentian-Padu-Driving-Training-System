<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseId = $_POST['courseId'];  // Change 'Course_Id' to 'courseId'
    $courseName = $_POST['courseName'];
    $coursePrice = $_POST['coursePrice'];
    $courseInfo = $_POST['courseInfo'];

    // Update the course in the database
    $sql = "UPDATE course SET C_Name='$courseName', C_Price='$coursePrice', C_Info='$courseInfo' WHERE Course_Id='$courseId'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: CourseAdmin.php"); // Redirect to the tutor list page after updating
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>