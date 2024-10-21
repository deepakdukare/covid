<?php 
session_start();
include_once('includes/config.php');
error_reporting(0);

// Function to check if the user is logged in
function checkSession() {
    if (strlen($_SESSION['aid']) == 0) {
        header('location:logout.php');
        exit();
    }
}

// Function to delete a phlebotomist record
function deletePhlebotomist($con, $pid) {
    $stmt = $con->prepare("DELETE FROM tblphlebotomist WHERE id = ?");
    $stmt->bind_param("i", $pid);
    if ($stmt->execute()) {
        echo '<script>alert("Record deleted successfully.");</script>';
        echo "<script>window.location.href='manage-phlebotomist.php';</script>";
    } else {
        echo '<script>alert("Failed to delete record.");</script>';
    }
}

// Check session validity
checkSession();

// Handle record deletion
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['pid'])) {
    $pid = intval($_GET['pid']);
    deletePhlebotomist($con, $pid);
}

// Fetch phlebotomist records
function fetchPhlebotomists($con) {
    $query = mysqli_query($con, "SELECT * FROM tblphlebotomist");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

$phlebotomists = fetchPhlebotomists($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Covid-TMS | Manage Phlebotomist</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Manage Phlebotomist</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Phlebotomist Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Emp Id</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Emp Id</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        foreach ($phlebotomists as $index => $row) {
                                            echo "<tr>
                                                <td>" . ($index + 1) . "</td>
                                                <td>{$row['EmpID']}</td>
                                                <td>{$row['FullName']}</td>
                                                <td>{$row['MobileNumber']}</td>
                                                <td>{$row['RegDate']}</td>
                                                <td>
                                                    <a href='edit-phlebotomist.php?pid={$row['id']}'><i class='fas fa-edit' style='color:blue'></i></a> |
                                                    <a href='manage-phlebotomist.php?pid={$row['id']}&action=delete' onclick=\"return confirm('Do you really want to delete this record?');\"><i class='fa fa-trash' aria-hidden='true' style='color:red' title='Delete this record'></i></a>
                                                </td>
                                            </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
