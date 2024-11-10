<?php
session_start();
include('includes/config.php');

// Process form submission
if (isset($_POST['submit'])) {
    $contactno = $_POST['contactno'];
    $username = $_POST['username'];
    $password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);

    // Use prepared statements for security
    $stmt = $con->prepare("SELECT ID FROM tbladmin WHERE AdminuserName = ? AND MobileNumber = ?");
    $stmt->bind_param("ss", $username, $contactno);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        $stmt = $con->prepare("UPDATE tbladmin SET Password = ? WHERE AdminuserName = ? AND MobileNumber = ?");
        $stmt->bind_param("sss", $password, $username, $contactno);
        
        if ($stmt->execute()) {
            echo "<script>alert('Password successfully changed');</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    } else {
        echo "<script>alert('Invalid Details. Please try again.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Covid 19 Testing Management System | Password Recovery</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value !== document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field do not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                <h3 align="center" style="margin-top: 4%; color: #007bff">Covid Testing Management System</h3>

                        <!-- Form Section -->
                        <form name="changepassword" method="post" onsubmit="return checkpass();">
                            <div class="row">
                                <!-- Image Section -->
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                    <img src="img/password-recovery.avif" alt="Logo" class="login-image"> 
                                </div>
                                <!-- Form Section -->
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Password Recovery</h1>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="contactno" placeholder="Contact Number" autocomplete="off" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="newpassword" placeholder="New Password" autocomplete="off" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirmpassword" placeholder="Confirm Password" autocomplete="off" class="form-control" required>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit">
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="login.php" style="font-weight: bold;">Sign In</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="index.php" style="font-weight: bold;"><i class="fa fa-home" aria-hidden="true"></i> Home Page</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript dependencies -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
