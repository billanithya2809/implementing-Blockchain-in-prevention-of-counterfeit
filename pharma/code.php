<?php 
include('Admin/config/dbcon.php');
session_start();
if(isset($_POST['checkLicense']))
{
    $licenseNumber = $_POST['licenceNumber'];
    $query = "SELECT * FROM medicine WHERE licenceNumber = '$licenseNumber';";
    $query_run = mysqli_query($con, $query);
    //Store the data in Session
    // $_SESSION['licenceNumber'] += $row;
    if(mysqli_num_rows($query_run) > 0)
    {
        //GET MEDICINE DETAILS
        $row = mysqli_fetch_assoc($query_run);
        //Store the data in Session
        $_SESSION['licenceNumber'] = $row;
        $manufacturer_id = $row['user_id'];
        $query = "SELECT * FROM users WHERE id = '$manufacturer_id';";
        $query_run_man = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($query_run_man);
        $_SESSION['manufacturer'] = $row;
        $_SESSION['message'] = "License Number is Valid";
        $_SESSION['flag'] = "1";
        header('Location: index.php');
    }
    else
    {
        $_SESSION['message'] = "License Number is Invalid";
        $_SESSION['flag'] = "2";
        header('Location: index.php');
    }
}
?>