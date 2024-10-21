<?php 
session_start();
// DB connection
include_once('includes/config.php');

// Validating Session
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['update'])) {
        $adminid = $_SESSION['aid'];
        $aname = $_POST['adminname'];
        $mobno = $_POST['mobilenumber'];
        $email = $_POST['email'];

        $query = mysqli_query($con, "UPDATE tbladmin SET AdminName='$aname', MobileNumber='$mobno', Email='$email' WHERE ID='$adminid'");
        
        if ($query) {
            echo '<script>alert("Profile has been updated")</script>';
        } else {
            echo '<script>alert("Something Went Wrong. Please try again.")</script>';
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

    <title>Covid-19 Testing Management System | Admin Profile</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', sans-serif;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #4e73df;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #4e73df;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 5px rgba(78, 115, 223, 0.5);
        }

        .card-header {
            background-color: #4e73df;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        h1 {
            color: #4e73df;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once('includes/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('includes/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Admin Profile</h1>
                    <form method="post" name="adminprofile">

                        <div class="row">
                            <div class="col-lg-8">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">

                                    <?php
                                    $adminid = $_SESSION['aid'];
                                    $ret = mysqli_query($con, "SELECT * FROM tbladmin WHERE ID='$adminid'");
                                    while ($row = mysqli_fetch_array($ret)) {
                                    ?>
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold">Registration Date: <?php echo $row['AdminRegdate']; ?></h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Admin Name</label>
                                                <input type="text" class="form-control" name="adminname" value="<?php echo $row['AdminName']; ?>" required='true'>
                                            </div>

                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $row['AdminuserName']; ?>" readonly='true'>
                                            </div>

                                            <div class="form-group">
                                                <label>Email Id</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $row['Email']; ?>" required='true'>
                                            </div>

                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control" name="mobilenumber" value="<?php echo $row['MobileNumber']; ?>" required='true' maxlength='10'>
                                            </div>

                                        <?php } ?>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-user btn-block" name="update" id="update" value="Update">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once('includes/footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include_once('includes/footer2.php'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
<?php } ?>
