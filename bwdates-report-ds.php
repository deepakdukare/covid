<?php session_start();
// DB connection
include_once('includes/config.php');
error_reporting(0);

// Validating Session
if (!isset($_SESSION['aid']) || $_SESSION['aid'] == 0) {
    header('location:logout.php');
    exit; // Use exit after header redirection
}

if (isset($_POST['submit'])) {
    // Getting post values
    $mnumber = mysqli_real_escape_string($con, $_POST['mobilenumber']);
    $testtype = mysqli_real_escape_string($con, $_POST['testtype']);
    $timeslot = mysqli_real_escape_string($con, $_POST['birthdaytime']);
    $orderno = mt_rand(100000000, 999999999);

    // Using prepared statements
    $stmt = $con->prepare("INSERT INTO tbltestrecord (PatientMobileNumber, TestType, TestTimeSlot, OrderNumber) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $mnumber, $testtype, $timeslot, $orderno);
    $result = $stmt->execute();

    if ($result) {
        echo '<script>alert("Your test request submitted successfully. Order number is " + '.$orderno.')</script>';
        echo "<script>window.location.href='registered-user-testing.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";  
        echo "<script>window.location.href='registered-user-testing.php'</script>";
    }
    $stmt->close(); // Close the statement
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
    <title>Covid-19 TMS | B/w Dates Report Date Selection</title>
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #d4f1f4; /* Baby Blue */
        }

        .container-fluid {
            padding: 30px;
        }

        h1 {
            color: #05445e; /* Navy Blue */
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: #189ab4; /* Blue Grotto */
            border-radius: 10px;
            padding: 20px;
        }

        label {
            font-size: 18px;
            font-weight: bold;
            color: #fff; /* White */
        }

        input[type="date"] {
            border-radius: 5px;
            border: 1px solid #75e6da; /* Blue Green */
        }

        .btn-primary {
            background-color: #05445e; /* Navy Blue */
            border-color: #05445e; /* Navy Blue */
        }

        .btn-primary:hover {
            background-color: #189ab4; /* Blue Grotto */
            border-color: #189ab4; /* Blue Grotto */
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
                    <h1 class="h3 mb-4">B/w Dates Report Date Selection</h1>

                    <form method="post" action="bwdates-report-result.php">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>From Date</label>
                                            <input type="date" class="form-control" id="fromdate" name="fromdate" required>
                                        </div>

                                        <div class="form-group">
                                            <label>To Date</label>
                                            <input type="date" class="form-control" id="todate" name="todate" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Submit">                           
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
