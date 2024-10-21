<?php 
session_start();
error_reporting(0);
include_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Covid-Tms | Statewise Testing Dashboard</title>
    
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet"> <!-- Custom CSS for new styles -->
</head>

<body id="page-top">

    <div id="wrapper">
        <?php include_once('includes/sidebar.php');?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('includes/topbar.php');?>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Statewise Testing Dashboard</h1>
                    
                    <!-- New Section for Testing Trends -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-warning text-black">
                            <h6 class="m-0 font-weight-bold">Testing Trends</h6>
                        </div>
                        <div class="card-body">
                            <p>View trends in testing over the past few months.</p>
                            <!-- Placeholder for charts or trends -->
                            <div id="trends-placeholder" class="text-center">
                                <p><em>Charts or graphs will be displayed here.</em></p>
                            </div>
                        </div>
                    </div>

                    <!-- Existing DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Statewise Testing Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>State Name</th>
                                            <th>Total Tests Done</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $query = mysqli_query($con,"SELECT tblpatients.State AS state, COUNT(tbltestrecord.id) AS totaltest FROM tbltestrecord JOIN tblpatients ON tblpatients.MobileNumber = tbltestrecord.PatientMobileNumber GROUP BY tblpatients.State");
                                    if (mysqli_num_rows($query) > 0) {
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo htmlspecialchars($row['state']); ?></td>
                                            <td><?php echo htmlspecialchars($row['totaltest']); ?></td>
                                        </tr>
                                    <?php 
                                            $cnt++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No records found.</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>State Name</th>
                                            <th>Total Tests Done</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Important Announcements Section -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-warning text-black">
                            <h6 class="m-0 font-weight-bold">Important Announcements</h6>
                        </div>
                        <div class="card-body">
                            <p>Stay updated with the latest announcements regarding testing and health guidelines.</p>
                            <ul>
                                <li>All citizens are encouraged to get tested regularly.</li>
                                <li>New testing centers have been established in various states.</li>
                                <li>Follow health protocols while visiting testing centers.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Resources for Further Information -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-warning text-black">
                            <h6 class="m-0 font-weight-bold">Resources for Further Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">WHO COVID-19 Resources</h5>
                                            <p class="card-text">Latest updates and guidelines from WHO.</p>
                                            <a href="https://www.who.int" target="_blank" class="btn btn-primary">Visit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">CDC Guidelines</h5>
                                            <p class="card-text">Health guidelines and recommendations from the CDC.</p>
                                            <a href="https://www.cdc.gov" target="_blank" class="btn btn-primary">Visit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title">Local Health Departments</h5>
                                            <p class="card-text">Find your local health department's resources.</p>
                                            <a href="https://www.naccho.org" target="_blank" class="btn btn-primary">Visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include_once('includes/footer.php');?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
