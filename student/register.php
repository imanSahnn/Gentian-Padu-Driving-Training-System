<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Student Registration Form
    <div><a href="index.php" class="btn btn-success mt-3">Back</a></div>
    </h2>
    
    <form method="POST" action="registerdb.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="S_Name" class="form-label">Student Name</label>
            <input type="text" class="form-control" id="S_Name" name="S_Name" required>
        </div>
        <div class="mb-3">
            <label for="S_Phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="S_Phone" name="S_Phone" required>
        </div>
        <div class="mb-3">
            <label for="S_Ic" class="form-label">IC Number</label>
            <input type="text" class="form-control" id="S_Ic" name="S_Ic" required>
            <div id="icErrorMessage" class="error-message"></div>
        </div>
        <div class="mb-3">
            <label for="S_Address" class="form-label">Address</label>
            <textarea class="form-control" id="S_Address" name="S_Address" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="S_Img" class="form-label">Profile Image</label>
            <input type="file" class="form-control" id="S_Img" name="S_Img" required>
        </div>
        <div class="mb-3">
            <label for="S_Ic_Img" class="form-label">IC Image</label>
            <input type="file" class="form-control" id="S_Ic_Img" name="S_Ic_Img" required>
        </div>
        <div class="mb-3">
            <label for="S_Email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="S_Email" name="S_Email" required>
        </div>
        <div class="mb-3">
            <label for="S_Password" class="form-label">Password</label>
            <input type="password" class="form-control" id="S_Password" name="S_Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
           
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua/CJ7OBbbZXBwFt2TKXy5s4SPARx3S6oBlF7pPbzq4C+LBefzeD0tZwD" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Event listener for IC number input field
        document.getElementById('S_Ic').addEventListener('input', function () {
            // Clear any existing error message
            document.getElementById('icErrorMessage').textContent = '';

            // Get the entered IC number
            var icNumber = this.value;

            // Check if the IC number is not empty
            if (icNumber.trim() !== '') {
                // Make an AJAX request to check if the IC number exists
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'checkIcExist.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Update the error message based on the response
                        var errorMessageElement = document.getElementById('icErrorMessage');
                        errorMessageElement.textContent = xhr.responseText;

                        // Clear the IC input box if the IC number already exists
                        if (xhr.responseText.trim() !== '') {
                            document.getElementById('S_Ic').value = '';
                        }
                    }
                };
                xhr.send('S_Ic=' + encodeURIComponent(icNumber));
            }
        });
    });
</script>
</body>
</html>

