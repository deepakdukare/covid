<?php 
//DB connection
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['submit'])){
    //getting post values
    $mnumber = $_POST['mobilenumber'];
    $testtype = $_POST['testtype'];
    $timeslot = $_POST['birthdaytime'];
    $orderno = mt_rand(100000000, 999999999);
    $query = "INSERT INTO tbltestrecord(PatientMobileNumber, TestType, TestTimeSlot, OrderNumber) VALUES ('$mnumber', '$testtype', '$timeslot', '$orderno');";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<script>alert("Your test request submitted successfully. Order number is " + "' . $orderno . '")</script>';
        echo "<script>window.location.href='registered-user-testing.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";  
        echo "<script>window.location.href='registered-user-testing.php'</script>";
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
    <title>Covid-19 Testing Management System</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-color: #f8f9fa; /* Light background color */
            font-family: 'Nunito', sans-serif;
        }
        label {
            font-size: 16px;
            font-weight: bold;
            color: #343a40; /* Dark Gray */
        }
        .card {
            border-radius: 8px; /* Slightly rounded corners */
            border: none; /* Remove default border */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin-bottom: 20px; /* Spacing between cards */
        }
        .btn-primary {
            background-color: #007bff; /* Light Blue */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #004085; /* Dark border on hover */
        }
        .container-fluid {
            margin-top: 20px; /* Spacing at the top */
        }
        h1, h3 {
            color: #004085; /* Deep Blue for headings */
        }
        .form-control {
            border-radius: 4px; /* Rounded input fields */
            border: 1px solid #ced4da; /* Light border */
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include_once('includes/sidebar.php');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once('includes/topbar.php');?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Covid19-Testing | Already Registered Users</h1>
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Registered Mobile Number</label>
                                            <input type="text" class="form-control" id="regmobilenumber" name="regmobilenumber" placeholder="Please enter your registered mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required="true" maxlength="10">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" name="search" value="Search">                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <?php if(isset($_POST['search'])) { ?>
                        <h3 align="center" style="color:red">Results against mobile number "<?php echo $_POST['regmobilenumber'];?>"</h3>
                        <hr />
                        <?php
                        $mnumber = intval($_POST['regmobilenumber']);
                        $sql = mysqli_query($con, "SELECT * FROM tblpatients WHERE MobileNumber='$mnumber'");
                        $row = mysqli_num_rows($sql);
                        if($row > 0) {
                            while ($result = mysqli_fetch_array($sql)) {
                        ?>
                        <form name="newtesting" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['FullName']; ?>" readonly="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php echo $result['MobileNumber']; ?>" readonly="true">
                                            </div>
                                            <div class="form-group">
                                                <label>DOB (yyyy-mm-dd)</label>
                                                <input type="text" class="form-control" id="dob" name="dob" readonly="true" value="<?php echo $result['DateOfBirth']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Any Govt Issued ID</label>
                                                <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" value="<?php echo $result['GovtIssuedId']; ?>" readonly="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Govt Issued ID Number</label>
                                                <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" value="<?php echo $result['GovtIssuedIdNo']; ?>" readonly="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" id="address" name="address" readonly="true"><?php echo $result['FullAddress']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" id="state" name="state" value="<?php echo $result['State']; ?>" readonly="true">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Testing Information</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Test Type</label>
                                                <select class="form-control" id="testtype" name="testtype" required="true">
                                                    <option value="">Select</option> 
                                                    <option value="Antigen">Antigen</option>  
                                                    <option value="RT-PCR">RT-PCR</option>   
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Time Slot for Test</label>
                                                <input type="datetime-local" class="form-control" id="birthdaytime" name="birthdaytime" required="true">                                        
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit">                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php } } else { ?>
                            <h4 align="center" style="color:red">No record found against this mobile number</h4>
                        <?php } } ?>
                </div>
            </div>
            <?php include_once('includes/footer.php');?>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
