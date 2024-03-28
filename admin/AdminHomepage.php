<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>GENTIAN PADU</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="text">Dashboard</div>
  </section>
  <!-- Scripts -->
  <script src="script.js"></script>
</body>
</html>
<?php

?>
