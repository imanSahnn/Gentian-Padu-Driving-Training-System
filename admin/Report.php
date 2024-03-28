<?php
session_start();

// Include your database connection code here
// Make sure to adapt this according to your actual database connection details
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

$displayTable = false; // Initialize the flag

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected table
    $selectedTable = $_POST['selectedTable'];


    // Perform database query based on the selected table
    switch ($selectedTable) {
        case 'student':
            $query = "SELECT * FROM student";
            $result = $connection->query($query);

            // Set the flag to true if the query is successful
            if ($result !== false) {
                $displayTable = true;
            } else {
                echo "Error executing query: " . $connection->error;
            }
            break;

        case 'tutor':
            $query = "SELECT * FROM tutor";
            $result = $connection->query($query);

            // Set the flag to true if the query is successful
            if ($result !== false) {
                $displayTable = true;
            } else {
                echo "Error executing query: " . $connection->error;
            }
            break;

        case 'course':
            $query = "SELECT * FROM course";
            $result = $connection->query($query);

            // Set the flag to true if the query is successful
            if ($result !== false) {
                $displayTable = true;
            } else {
                echo "Error executing query: " . $connection->error;
            }
            break;

        default:
            echo "Invalid table selection";
            // You can handle this case as per your requirements
            break;
    }

    // Close the database connection
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">Menu</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="AdminHomepage.php">
          <i class="bx bx-grid-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="StudentAdmin.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Student</span>
        </a>
        <span class="tooltip">Student</span>
      </li>
      <li>
        <a href="TutorAdmin.php">
          <i class="bx bx-user"></i>
          <span class="link_name">Tutor</span>
        </a>
        <span class="tooltip">Tutor</span>
      </li>
      <li>
        <a href="CourseAdmin.php">
          <i class="bx bx-car"></i>
          <span class="link_name">Course</span>
        </a>
        <span class="tooltip">Course</span>
      </li>
      <li>
      <li>
        <a href="Report.php">
          <i class="bx bx-task-x"></i>
          <span class="link_name">Report</span>
        </a>
        <span class="tooltip">Report</span>
      </li>
      <li>
        <li class="profile">
          <div class="profile_details">
            <img src="profile.jpeg" alt="profile image">
            <div class="profile_content">

            </div>
          </div>
          <i class="bx bx-log-out" id="log_out"></i>
        </li>
     </ul>
        </div>
                  <section class="home-section">
                <div class="text">Report</div>
        
    </div>

<section class="home-section">
    <div class="text">Report</div>
    
    <!-- Display the table only if the flag is set to true -->
    <?php if ($displayTable): ?>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-striped">
            <thead>
                <?php if ($selectedTable == 'student'): ?>
                    <tr>
                        <th style="width: 10%;">Student_Id</th>
                        <th style="width: 20%;">Name</th>
                        <th style="width: 20%;">Email</th>
                    </tr>
                <?php elseif ($selectedTable == 'tutor'): ?>
                    <tr>
                        <th style="width: 10%;">Tutor_Id</th>
                        <th style="width: 30%;">Name</th>
                        <th style="width: 30%;">Email</th>
                    </tr>
                <?php elseif ($selectedTable == 'course'): ?>
                    <tr>
                        <th style="width: 10%;">Course_Id</th>
                        <th style="width: 20%;">Name</th>
                        <th style="width: 20%;">Price</th>
                        <th style="width: 40%;">Info</th>
                    </tr>
                <?php endif; ?>
            </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
            <?php if ($selectedTable == 'student'): ?>
                <td><?php echo isset($row["Student_Id"]) ? $row["Student_Id"] : ''; ?></td>
                <td><?php echo isset($row["S_Name"]) ? $row["S_Name"] : ''; ?></td>
                <td><?php echo isset($row["S_Email"]) ? $row["S_Email"] : ''; ?></td>
            <?php elseif ($selectedTable == 'tutor'): ?>
                <td><?php echo isset($row["Tutor_Id"]) ? $row["Tutor_Id"] : ''; ?></td>
                <td><?php echo isset($row["T_Name"]) ? $row["T_Name"] : ''; ?></td>
                <td><?php echo isset($row["T_Email"]) ? $row["T_Email"] : ''; ?></td>
            <?php elseif ($selectedTable == 'course'): ?>
                <td><?php echo isset($row["Course_Id"]) ? $row["Course_Id"] : ''; ?></td>
                <td><?php echo isset($row["C_Name"]) ? $row["C_Name"] : ''; ?></td>
                <td><?php echo isset($row["C_Price"]) ? $row["C_Price"] : ''; ?></td>
                <td><?php echo isset($row["C_Info"]) ? $row["C_Info"] : ''; ?></td>
            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No records found</p>
        <?php endif; ?>
    <?php endif; ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="selectedTable">Select Table:</label>
        <select class="form-control" name="selectedTable" id="selectedTable">
            <option value="student">Student</option>
            <option value="tutor">Tutor</option>
            <option value="course">Course</option>
            <!-- Add more options as needed -->
        </select>
        <button type="submit" class="btn btn-primary mt-2">Display Table</button>
    </form>
</section>

<!-- Scripts -->
<script src="script.js"></script>
<!-- Add Bootstrap JS and Popper.js if needed -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>