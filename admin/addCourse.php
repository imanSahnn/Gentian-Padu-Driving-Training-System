<?php
session_start();
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>GENTIAN PADU</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script>
        function confirmAdd() {
            var result = confirm('Are you sure you want to add this tutor?');
            
            if (result) {
                // If user clicks 'Yes', the form will be submitted
                document.forms["addCourseForm"].submit();
            } else {
                // If user clicks 'No', clear the textboxes
                document.getElementById('C_Name').value = '';
                document.getElementById('C_Price').value = '';
                document.getElementById('C_Info').value = '';
                
            }
        }
    </script>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">Menu</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list" style="margin-left: -35px;">
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
    <div class="text">Course</div>
    <div class="container">
      <div class="row" style="margin-left: -100px;">
        <div class="col-md-12">
          <div class="card" style="margin-left: -50px;">
            <div class="card-reader">
              <h4>
                Add Course
                <a href="CourseAdmin.php" class="btn btn-danger float-end">BACK</a>
              </h4>
            </div>
            <div class="card-body">
              <form action="addcourseData.php" method="POST" name="addCourseForm">
              <div class="mb-3">
    <label for="C_Name">Name</label>
    <select id="C_Name" name="C_Name" class="form-control">
        <option value="B2">B2</option>
        <option value="B Full">B Full</option>
        <option value="D">D</option>
        <option value="DA">DA</option>
        <option value="E">E</option>
        <option value="PSV">PSV</option>
    </select>
</div>
                <div class="mb-3">
                  <label>Price</label>
                  <input type="text" id="C_Price" name="C_Price" class="form-control">
                </div>
                <div class="mb-3">
                  <label>Info</label>
                  <input type="text" id="C_Info" name="C_Info" class="form-control">
                </div>

                <div class="mb-3">
                <button type="button" onclick="confirmAdd()" class="btn btn-primary">Save Course</button>
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</section>
<script src="Tutorscript.js"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

