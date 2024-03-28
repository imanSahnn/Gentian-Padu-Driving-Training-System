<?php
// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page (change the URL accordingly)
    header("Location: studentlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <!-- Add your styles or link to a CSS file if needed -->
</head>
<body>

    <script>
        function confirmLogout() {
            var result = confirm("Are you sure you want to log out?");
            if (result) {
                // If the user clicks "OK", submit the form
                document.getElementById("logoutForm").submit();
            }
        }
    </script>



    <!-- Add any additional HTML content or scripts if needed -->

</body>
</html>
