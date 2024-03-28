<?php
session_start();
include('conn.php');

if(isset($_GET['editCourse'])) { // Change 'editCCourse' to 'editCourse'
    $courseId = $_GET['editCourse'];

    // Fetch course details from the database based on Course_Id
    $sql = "SELECT * FROM course WHERE Course_Id = $courseId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $courseId = $row['Course_Id'];
        $courseName = $row['C_Name'];
        $coursePrice = $row['C_Price'];
        $courseInfo = $row['C_Info'];
    } else {
        echo "Course not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
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
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Course</div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Course</h4>
                    </div>
                    <div class="card-body">
                        <form action="updateCourse.php" method="post">
                            <input type="hidden" name="courseId" value="<?php echo $courseId; ?>">
                            <div class="mb-3">
                                <label for="courseName" class="form-label">Name:</label>
                                <!-- Assuming $courseName is not being edited and it's a fixed set of options -->
                                <select id="courseName" name="courseName" class="form-control" required>
                                    <option value="B2" <?php echo ($courseName == 'B2') ? 'selected' : ''; ?>>B2</option>
                                    <option value="B Full" <?php echo ($courseName == 'B Full') ? 'selected' : ''; ?>>B Full</option>
                                    <option value="D" <?php echo ($courseName == 'D') ? 'selected' : ''; ?>>D</option>
                                    <option value="DA" <?php echo ($courseName == 'DA') ? 'selected' : ''; ?>>DA</option>
                                    <option value="E" <?php echo ($courseName == 'E') ? 'selected' : ''; ?>>E</option>
                                    <option value="PSV" <?php echo ($courseName == 'PSV') ? 'selected' : ''; ?>>PSV</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="coursePrice" class="form-label">Price:</label>
                                <textarea class="form-control" id="coursePrice" name="coursePrice" rows="1" required><?php echo $coursePrice; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="courseInfo" class="form-label">Info:</label>
                                <textarea class="form-control" id="courseInfo" name="courseInfo" rows="3" required><?php echo $courseInfo; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Course</button>
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