<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 pt-4">
            <?php include('message.php'); ?>
            <div class="card ">
                <div class="card-header">
                    <h5 class="">View Medicine
                        <a href="add_medicine.php" class="btn btn-primary float-end">Add Medicine</a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Licence Number</th>
                                <th>Manufacturer</th>
                                <th>Status</th>
                                <th>Buy</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    $category = "SELECT * FROM medicine WHERE status != 2";
                                    $category_run = mysqli_query($con, $category);
                                    if(mysqli_num_rows($category_run) > 0)
                                    { $i=1;
                                        foreach($category_run as $item)
                                        { ?>
                                            <tr>
                                                <!-- <pre>
                                                <pre> -->
                                                <td><?=$i++?></td>
                                                <td><?=$item['name'];?></td>
                                                <td><?=$item['licenceNumber'];?></td>
                                                <?php 
                                                    $manufacturer_id = $item['user_id'];
                                                    $manufacturer = "SELECT * FROM users WHERE id = '$manufacturer_id'";
                                                    $manufacturer_run = mysqli_query($con, $manufacturer);
                                                    $manufacturer_row = mysqli_fetch_array($manufacturer_run);
                                                ?>   
                                                <td><?=$manufacturer_row['name'];?></td>                                            
                                                <td><?=$item['status'] == 1 ? 'Visible' : 'Hidden';?></td>
                                                <td><a href="buy-medicine.php?id=<?=$item['id']?>" class="btn btn-sm btn-success" type="submit">Buy</a></td>
                                            </tr> <?php
                                        }
                                    } 
                                    else 
                                    { ?>
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                                <?php }?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>