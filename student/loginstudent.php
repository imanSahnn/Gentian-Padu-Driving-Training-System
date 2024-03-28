<?php
session_start();
include "conn.php";

if (isset($_POST['email']) && isset($_POST['name'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Email = validate($_POST['email']);
    $Name = validate($_POST['name']);

    if (empty($Email) || empty($Name)) {
        header("Location: your_error_page.php?error=Empty fields. Fill all the required fields");
        exit();
    }

    $sql = "SELECT * FROM student WHERE S_Email ='$Email' AND S_Name = '$Name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['S_Email'] === $Email && $row['S_Name'] === $Name) {
            echo "Logged in";
            $_SESSION['S_Email'] = $row['S_Email'];
            $_SESSION['S_Name'] = $row['S_Name'];
            header("Location: homepage.php");
            exit();
        } else {
            header("Location: studentlogin.php?error=Incorrect Email or Name");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
}
?>