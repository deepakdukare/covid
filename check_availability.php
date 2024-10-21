<?php 
require_once("includes/config.php");

// Check availability for user mobile number
if (!empty($_POST["mobnumber"])) {
    $mnumber = mysqli_real_escape_string($con, $_POST["mobnumber"]); // Sanitize input

    $result = mysqli_query($con, "SELECT id FROM tblpatients WHERE MobileNumber='$mnumber'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<span style='color:red'>Mobile already exists. Please try with another mobile number or click on this <a href='registered-user-testing.php'>Registered Users</a></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green'>Mobile available for registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}

// Check availability for phlebotomist employee ID
if (!empty($_POST["employeeid"])) {
    $empid = mysqli_real_escape_string($con, $_POST["employeeid"]); // Sanitize input

    $result = mysqli_query($con, "SELECT id FROM tblphlebotomist WHERE EmpID='$empid'");
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo "<span style='color:red'>Employee ID already exists. Please try with another employee ID.</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style='color:green'>Employee ID available for registration.</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}
?>
