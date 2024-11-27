<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Admin for Pharmacy</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <!-- //Total Users -->
                <div class="card-header">Total Users</div>
                <?php 
                    $user = "SELECT * FROM users WHERE status = 1";
                    $user_run = mysqli_query($con, $user);
                    $user_count = mysqli_num_rows($user_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$user_count?></h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <!-- No of Manufacturers -->
                <div class="card-header">Total Manufacturers</div>
                <?php 
                    $manufacturer = "SELECT * FROM users WHERE role_as = 2";
                    $manufacturer_run = mysqli_query($con, $manufacturer);
                    $manufacturer_count = mysqli_num_rows($manufacturer_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$manufacturer_count?></h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <!-- No of Medicines -->
                <div class="card-header">Total Medicines</div>
                <?php 
                    $medicine = "SELECT * FROM medicine WHERE status = 1";
                    $medicine_run = mysqli_query($con, $medicine);
                    $medicine_count = mysqli_num_rows($medicine_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$medicine_count?></h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <!-- No of Retailers -->
                <div class="card-header">Total Retailers</div>
                <?php 
                    $retailer = "SELECT * FROM users WHERE role_as = 3";
                    $retailer_run = mysqli_query($con, $retailer);
                    $retailer_count = mysqli_num_rows($retailer_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$retailer_count?></h1></div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');

?>