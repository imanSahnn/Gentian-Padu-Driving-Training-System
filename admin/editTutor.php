<?php
session_start();
include('conn.php');

if(isset($_GET['editTutor'])) {
    $tutorId = $_GET['editTutor'];

    // Fetch tutor details from the database based on Tutor_Id
    $sql = "SELECT * FROM tutor WHERE Tutor_Id = $tutorId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tutorId = $row['Tutor_Id'];
        $tutorName = $row['T_Name'];
        $tutorEmail = $row['T_Email'];
        $tutorAddress = $row['T_Address'];
    } else {
        echo "Tutor not found!";
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
        <div class="text">Tutor</div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Tutor</h4>
                    </div>
                    <div class="card-body">
                        <form action="updateTutor.php" method="post">
                            <input type="hidden" name="tutorId" value="<?php echo $tutorId; ?>">
                            <div class="mb-3">
                                <label for="tutorName" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="tutorName" name="tutorName" value="<?php echo $tutorName; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tutorEmail" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="tutorEmail" name="tutorEmail" value="<?php echo $tutorEmail; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tutorAddress" class="form-label">Address:</label>
                                <textarea class="form-control" id="tutorAddress" name="tutorAddress" rows="3" required><?php echo $tutorAddress; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Tutor</button>
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