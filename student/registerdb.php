<?php

// Separate file for database connection (conn.php)
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gentianpadu';

require 'C:\xampp\htdocs\PROTOTYPE\vendor/autoload.php'; // Adjust the path to autoload.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {
    exit('Error connecting to Gentian Padu: ' . mysqli_connect_error());
}

if (!isset($_POST['S_Name'], $_POST['S_Phone'], $_POST['S_Ic'], $_POST['S_Address'], $_POST['S_Email'], $_POST['S_Password'])) {
    exit('Empty Field(s)');
}

if (empty($_POST['S_Name']) || empty($_POST['S_Phone']) || empty($_POST['S_Ic']) || empty($_POST['S_Address']) || empty($_FILES['S_Img']['tmp_name']) || empty($_FILES['S_Ic_Img']['tmp_name']) || empty($_POST['S_Email']) || empty($_POST['S_Password'])) {
    exit('Value Empty');
}

// Include the database connection
include 'conn.php';

// Read the image files and convert to binary
$imgContent = file_get_contents($_FILES['S_Img']['tmp_name']);
$icImgContent = file_get_contents($_FILES['S_Ic_Img']['tmp_name']);

if ($stmt = $conn->prepare('INSERT INTO student (S_Name, S_Phone, S_Ic, S_Address, S_Img, S_Ic_Img, S_Email, S_Password) VALUES (?,?,?,?,?,?,?,?)')) {
    $password = password_hash($_POST['S_Password'], PASSWORD_DEFAULT);
    $stmt->bind_param('ssssssss', $_POST['S_Name'], $_POST['S_Phone'], $_POST['S_Ic'], $_POST['S_Address'], $imgContent, $icImgContent, $_POST['S_Email'], $password);
    $stmt->execute();

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);
    $userEmail = $_POST['S_Email'];
    $userName = $_POST['S_Name'];

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'imanhusincool@gmail.com'; // Your Gmail email address
        $mail->Password = 'cuef qubz hdnb gnyt'; // Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('imanhusincool@gmail.com', 'iman cool');
        $mail->addAddress('imanhusincool@gmail.com', 'iman cool');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Gentian Padu';
        $mail->Body    = 'Thanks for register into our system';

        $mail->send();
        echo 'Email has been sent';
        header("Location: index.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $stmt->close();
} else {
    echo 'Error Occurred';
}

$conn->close();
?>
