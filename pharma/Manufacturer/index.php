<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Manufacturer</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header">Total Medicine</div>
                <!-- Get Medicine Count from DB -->
                <?php 
                    $medicine = "SELECT * FROM medicine WHERE status = 1";
                    $medicine_run = mysqli_query($con, $medicine);
                    $medicine_count = mysqli_num_rows($medicine_run);
                ?>
                <div class="card-body"><h1 class="text-center"><?=$medicine_count?></h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-header">Total Users</div>
                <div class="card-body"><h1 class="text-center">45</h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-header">Total Feedback</div>
                <div class="card-body"><h1 class="text-center">12</h1></div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-header">Total Issues</div>
                <div class="card-body"><h1 class="text-center">9</h1></div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');

?>