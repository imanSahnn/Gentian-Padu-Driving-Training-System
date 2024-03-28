<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['studentId'];
    $studentName = $_POST['studentName'];
    $studentIc = $_POST['studentIc'];
    $studentAddress = $_POST['studentAddress'];
    $studentEmail = $_POST['studentEmail'];
    

    // Update tutor details in the database
    $sql = "UPDATE student SET S_Name='$studentName', S_Ic='$studentIc', S_Address='$studentAddress', S_Email='$studentEmail' WHERE Student_Id=$studentId";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully";
        header("Location: StudentAdmin.php"); // Redirect to the tutor list page after updating
        exit;
    } else {
        echo "Error updating student: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
