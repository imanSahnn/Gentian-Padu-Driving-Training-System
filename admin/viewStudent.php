<?php
session_start();
include('conn.php');
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
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Student</div>
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details 
                            <a href="StudentAdmin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['Student_Id']))
                        {
                            $student_id = mysqli_real_escape_string($conn, $_GET['Student_Id']);
                            $query = "SELECT * FROM student WHERE Student_Id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $students = mysqli_fetch_assoc($query_run);
                                ?>
                                <div class="mb-3">
                                    <label>Name:</label>
                                    <p class="form-control"><?= $students['S_Name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Ic:</label>
                                    <p class="form-control"><?= $students['S_Ic']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Address:</label>
                                    <p class="form-control"><?= $students['S_Address']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Email:</label>
                                    <p class="form-control"><?= $students['S_Email']; ?></p>
                                </div>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Data Found</h4>";
                            }
                        }
                        else
                        {
                            echo "<h4>Invalid Tutor ID</h4>";
                        }
                        ?>
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
?>
 
