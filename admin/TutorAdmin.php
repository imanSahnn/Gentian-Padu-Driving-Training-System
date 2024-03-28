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
        </ul>
    </div>
    <section class="home-section">
        <div class="text">Tutor</div>
        <div class="container mt-4">
            <div class="row" style="margin-left: -100px;">
                <div class="col-md-12">
                    <div class="card" style="margin-left: -40px;">
                        <div class="card-header" style="margin-left: 0px;">
                            <h4>Tutor Details
                                <a href="AddTutor.php" class="btn btn-primary float-end">Add Tutor</a>
                            </h4>
                        </div>
                        <div class="card-body" style="margin-left: 0px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $sql = "SELECT * FROM tutor ORDER BY Tutor_Id ASC";
                                  $result = $conn->query($sql);
                          
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                      <tr>
                                          <td><?php echo $row['Tutor_Id']; ?></td>
                                          <td><?php echo $row['T_Name']; ?></td>
                                          <td><?php echo $row['T_Email']; ?></td>
                                          <td><?php echo $row['T_Address']; ?></td>
                                          <td><a href='viewTutor.php?Tutor_Id=<?php echo $row['Tutor_Id']; ?>' class='btn btn-info btn-sm'>View</a>
                                                <a href='editTutor.php?editTutor=<?php echo $row['Tutor_Id']; ?>' class='btn btn-success btn-sm'>Edit</a>
                                                <button onclick="confirmDelete(<?php echo $row['Tutor_Id']; ?>)" class='btn btn-danger btn-sm'>Delete</button>
                                                </form></td>
                                      </tr>
                                  <?php
                                  }
                                  ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="Tutorscript.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
function confirmDelete(tutorId) {
    var result = confirm("Are you sure you want to delete this tutor?");
    
    if (result) {
        window.location.href = 'deleteTutor.php?id=' + tutorId;
    }
}
</script>
</body>

</html>
?>