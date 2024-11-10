<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $Password = md5($_POST['inputpwd']);
    $query = mysqli_query($con, "SELECT ID FROM tbladmin WHERE AdminuserName='$uname' AND Password='$Password'");
    $ret = mysqli_fetch_array($query);
    
    if ($ret > 0) {
        $_SESSION['aid'] = $ret['ID'];
        header('location:dashboard.php');
        exit(); // Always exit after a header redirection
    } else {
        echo "<script>alert('Invalid Details.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Covid 19 Testing Management System | Admin Login</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6e6e6; /* Light grey background */
        }
        .login-card {
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            background-color: white; /* Ensure card background is white for contrast */
        }
        .login-title {
            color: #007bff; /* Bootstrap primary color */
        }
        .btn-custom {
            background-color: #007bff; /* Custom button color */
            color: white;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .small {
            font-weight: bold;
        }
        .login-image {
            width: 100%; /* Adjust width */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 20px; /* Add some spacing below the image */
        }
    </style>
</head>

<body style="background-color: #a3f2fd;">
    <div class="container" style="background-color: #a3f2fd;">
        <!-- Outer Row -->
        <div class="row justify-content-center" style="background-color: #a3f2fd;">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 login-card">
                    <div class="card-body p-0">
                    <h3 align="center" style="margin-top:4%;color:#007bff">Covid Testing Management System</h3>
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                            <img src="img/login.avif" alt="Logo" class="login-image"> 
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <!-- Your logo image -->
                                        <h1 class="h4 login-title mb-4">Welcome Back!</h1>
                                    </div>
                                    <form name="login" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required="true">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="inputpwd" id="inputpwd" placeholder="Password" required="true">
                                        </div>
                                        <input type="submit" name="login" class="btn btn-custom btn-user btn-block" value="Login">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="password-recovery.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home Page</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
