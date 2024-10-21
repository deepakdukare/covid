<?php 
session_start();
// Database connection
include_once('includes/config.php');

// Validate Session
if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit; // Use exit to prevent further execution
} 

// Code for updating
if (isset($_POST['update'])) {
    $pid = intval($_GET['pid']);    
    // Getting post values
    $empid = mysqli_real_escape_string($con, $_POST['empid']);
    $fname = mysqli_real_escape_string($con, $_POST['fullname']);
    $mnumber = mysqli_real_escape_string($con, $_POST['mobilenumber']);
    
    $query = "UPDATE tblphlebotomist SET FullName='$fname', MobileNumber='$mnumber' WHERE id='$pid'";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        echo '<script>alert("Phlebotomist record updated successfully.")</script>';
        echo "<script>window.location.href='manage-phlebotomist.php'</script>";
        exit; // Use exit after redirection
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";  
        echo "<script>window.location.href='manage-phlebotomist.php'</script>";
        exit; // Use exit after redirection
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
    <title>Covid-19 Testing Management System | Edit Phlebotomist</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        label {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('includes/topbar.php'); ?>
                <div class="container-fluid">
                    <?php 
                    $pid = intval($_GET['pid']);
                    $query = mysqli_query($con, "SELECT * FROM tblphlebotomist WHERE id='$pid'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>                 
                    <h1 class="h3 mb-4 text-gray-800"><?php echo htmlspecialchars($row['FullName']); ?>'s Profile</h1>
                    <form name="editphlebotomist" method="post">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Registration Date: </label>
                                            <?php echo htmlspecialchars($row['RegDate']); ?>        
                                        </div>
                                        <div class="form-group">
                                            <label>Employee Id</label>
                                            <input type="text" class="form-control" id="empid" name="empid" value="<?php echo htmlspecialchars($row['EmpID']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name..." pattern="[A-Za-z ]+" title="letters only" value="<?php echo htmlspecialchars($row['FullName']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Please enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" value="<?php echo htmlspecialchars($row['MobileNumber']); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" name="update" id="update" value="Update">                           
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
           <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    <?php include_once('includes/footer2.php'); ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
