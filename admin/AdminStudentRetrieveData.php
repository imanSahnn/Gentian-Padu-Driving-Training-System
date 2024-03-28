<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gentianpadu";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student data with image paths
$sql = "SELECT Student_Id, S_Name, S_Email, S_Img FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["Student_Id"]. " - Name: " . $row["S_Name"]. " - Email: " . $row["S_Email"]. " <a href='downloadstudentimg.php?id=" . $row["Student_Id"] . "'>Download Image</a><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
