<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gentianpadu";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$displayTable = false; // Flag to check if the table should be displayed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected table
    $selectedTable = $_POST['selectedTable'];

    // Display the selected table for the report
    echo "<h2>Report for $selectedTable</h2>";

    // Perform database query based on the selected table
    switch ($selectedTable) {
        case 'student':
            $query = "SELECT * FROM student";
            break;
        case 'tutor':
            $query = "SELECT * FROM tutor";
            break;
        case 'course':
            $query = "SELECT * FROM course";
            break;
        default:
            echo "Invalid table selection";
            // You can handle this case as per your requirements
            break;
    }

    // Execute the query
    $result = $connection->query($query);

    // Set the flag to true if the query is successful
    if ($result) {
        $displayTable = true;
    } else {
        echo "Error executing query: " . $connection->error;
    }

    // Close the database connection
    $connection->close();
}
?>