<?php
session_start();

// Include configuration and functions
include_once('includes/config.php');

// Validating Session
if (!isset($_SESSION['aid']) || strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit; // Use exit after header redirection
}

// Fetch assigned tests
$reportStatus = 'On the Way for Collection';
$stmt = $con->prepare("SELECT tbltestrecord.OrderNumber, tblpatients.FullName, 
                        tblpatients.MobileNumber, tbltestrecord.TestType, 
                        tbltestrecord.TestTimeSlot, tbltestrecord.RegistrationDate, 
                        tbltestrecord.id AS testid 
                        FROM tbltestrecord 
                        JOIN tblpatients ON tblpatients.MobileNumber = tbltestrecord.PatientMobileNumber 
                        WHERE ReportStatus = ?");
$stmt->bind_param("s", $reportStatus);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Covid-Tms | Assigned Tests</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('includes/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Assigned To Phlebotomist</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Assigned Tests</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Order No.</th>
                                            <th>Patient Name</th>
                                            <th>Mobile No.</th>
                                            <th>Test Type</th>
                                            <th>Time Slot</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Order No.</th>
                                            <th>Patient Name</th>
                                            <th>Mobile No.</th>
                                            <th>Test Type</th>
                                            <th>Time Slot</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $cnt = 1;
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo htmlspecialchars($row['OrderNumber']); ?></td>
                                                <td><?php echo htmlspecialchars($row['FullName']); ?></td>
                                                <td><?php echo htmlspecialchars($row['MobileNumber']); ?></td>
                                                <td><?php echo htmlspecialchars($row['TestType']); ?></td>
                                                <td><?php echo htmlspecialchars($row['TestTimeSlot']); ?></td>
                                                <td><?php echo htmlspecialchars($row['RegistrationDate']); ?></td>
                                                <td>
                                                    <a href="test-details.php?tid=<?php echo $row['testid']; ?>&oid=<?php echo $row['OrderNumber']; ?>" class="btn btn-info btn-sm">View Details</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('includes/footer.php'); ?>
            <!-- End of Footer -->

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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
</html>
