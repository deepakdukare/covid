<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Covid-TMS | Search Report</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for enhancements -->
    <style>
        body {
            background-color: #f8f9fc;
        }
        .navbar, .sidebar {
            background-color: #2c3e50; /* Dark background */
        }
        .navbar-brand, .sidebar-brand {
            color: #ecf0f1; /* Light text color */
        }
        .btn-info {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-info:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .card-header {
            background-color: #2980b9;
            color: white;
        }
        .table thead {
            background-color: #2c3e50;
            color: white;
        }
        .table tbody tr {
            background-color: #ecf0f1;
        }
        .table tbody tr:hover {
            background-color: #d5dbdb;
        }
        .form-control {
            background-color: #ecf0f1;
            color: #2c3e50;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    $searchdata=$_POST['serachdata'];
                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Search Result for '<?php echo $searchdata;?>'</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold">Search Report Results</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form name="assignto" method="post">
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
                                            $query=mysqli_query($con,"SELECT tbltestrecord.OrderNumber,tblpatients.FullName,tblpatients.MobileNumber,tbltestrecord.TestType,tbltestrecord.TestTimeSlot,tbltestrecord.RegistrationDate,tbltestrecord.id AS testid FROM tbltestrecord
                                            JOIN tblpatients ON tblpatients.MobileNumber=tbltestrecord.PatientMobileNumber
                                            WHERE (tblpatients.FullName LIKE '%$searchdata%' || tblpatients.MobileNumber LIKE '%$searchdata%' || tbltestrecord.OrderNumber LIKE '%$searchdata%')");
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($query)){
                                            ?>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo $row['OrderNumber'];?></td>
                                                <td><?php echo $row['FullName'];?></td>
                                                <td><?php echo $row['MobileNumber'];?></td>
                                                <td><?php echo $row['TestType'];?></td>
                                                <td><?php echo $row['TestTimeSlot'];?></td>
                                                <td><?php echo $row['RegistrationDate'];?></td>
                                                <td>
                                                    <a href="test-details.php?tid=<?php echo $row['testid'];?>&&oid=<?php echo $row['OrderNumber'];?>" class="btn btn-info btn-sm" target="blank">View Details</a>
                                                </td>
                                            </tr>
                                            <?php $cnt++; } ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include_once('includes/footer2.php');?>

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
