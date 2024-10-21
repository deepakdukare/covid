<?php session_start();
// DB connection
include_once('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid-19 TMS | Search Report</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style type="text/css">
        body {
            background-color: #eef2f3; /* Light background */
            color: #333; /* Dark text for readability */
        }

        h1 {
            color: #2980b9; /* Header color */
            font-weight: bold;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            color: #34495e; /* Darker text for labels */
        }

        .card {
            border-radius: 12px; /* Rounded corners for cards */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* More pronounced shadow */
            margin-top: 20px; /* Space between cards */
        }

        .btn-primary {
            background-color: #3498db; /* Lively blue for buttons */
            border-color: #2980b9; /* Slightly darker border */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }

        .btn-primary:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }

        .form-control {
            border-radius: 8px; /* Rounded input fields */
            border: 1px solid #bdc3c7; /* Light gray border */
            transition: border-color 0.3s; /* Smooth transition for focus effect */
        }

        .form-control:focus {
            border-color: #3498db; /* Change border color on focus */
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Glow effect on focus */
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
                    <h1 class="h3 mb-4 text-gray-800">Search Report</h1>

                    <form method="post" action="patient-report.php">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Search By Patient Name, Mobile Number, or Order Number</label>
                                            <input type="text" class="form-control" id="searchdata" name="searchdata" required="true" placeholder="Enter name, mobile number, or Order Number">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" name="search" value="Search">
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
