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
}

    $Email = validate($_POST['email']);
    $Password = validate($_POST['password']);

    if (empty($Email)) {
        header("Location: your_error_page.php?error=Empty email. Fill it");
        exit();
    } else if (empty($Password)) {
        header("Location: your_error_page.php?error=Empty password");
        exit();
    }

    $sql = "SELECT * FROM admin WHERE email ='$Email' AND password = '$Password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $Email && $row['password'] === $Password) {
            echo "Logged in";
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['name'] = $row['name'];
            echo "Name set in session: " . $_SESSION['name'];
            header("Location: AdminHomepage.php");
            exit();
        } else {
            header("Location: AdminHomepage.php?error=Incorrect Email or Password");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }

?>
