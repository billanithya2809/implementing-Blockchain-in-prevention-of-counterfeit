<?php 
include('auth.php');
include('includes/header.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <?php include('message.php')?>
                <!-- Customer Need to check the license number the table is original or not -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Enter the Medicine License Number</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="code.php">
                            <div class="row">
                                <div class="text-center col-md-12 my-3">
                                    <input type="text" name="licenceNumber" class="form-control" placeholder="Enter License Number">
                                </div>
                                <div class="text-center col-md-12">
                                    <button type="submit" name="checkLicense" class="btn btn-primary">Check</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php if(isset($_SESSION['licenceNumber'])) : ?>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-center">Medicine Details</h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Medicine Name</th>
                                            <th>License Number</th>
                                            <th>Medicine Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <pre>
                                        <?php print_r($_SESSION['manufacturer'])?>
                                        </pre> -->
                                        <tr>
                                            <td><?=$_SESSION['licenceNumber']['name']?></td>
                                            <td><?=$_SESSION['licenceNumber']['licenceNumber']?></td>
                                            <td><?=$_SESSION['licenceNumber']['description']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Manufacturer ID</th>
                                            <th>Manufacturer Name</th>
                                            <th>Manufacturer Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?=$_SESSION['manufacturer']['id']?></td>
                                            <td><?=$_SESSION['manufacturer']['name']?></td>
                                            <td><?=$_SESSION['manufacturer']['email']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>