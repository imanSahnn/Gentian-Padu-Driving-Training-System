<?php
session_start();
include "conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Email = validate($_POST['email']);
    $Password = validate($_POST['password']);

    if (empty($Email) || empty($Password)) {
        header("Location: your_error_page.php?error=Empty email or password. Fill in both fields");
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM tutor WHERE T_Email = ? AND T_Password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $Email, $Password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['T_Email'] = $row['T_Email'];
            $_SESSION['T_Password'] = $row['T_Password'];
            $_SESSION['T_Name'] = $row['T_Name'];
            header("Location: homepage.php");
            exit();
        } else {
            header("Location: homepage.php?");
            exit();
        }
    } else {
        // Log or handle the error appropriately
        header("Location: your_error_page.php?error=Database error");
        exit();
    }
} else {
    header("Location: your_error_page.php?error=Invalid request");
    exit();
}
?>
