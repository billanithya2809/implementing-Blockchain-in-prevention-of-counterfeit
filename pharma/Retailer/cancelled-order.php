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
                    <h5 class="">Cancelled Order
                    </h5>
                </div>
                <div class="card-body">
                <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Order ID</th>
                                <th>Medicine Name</th>
                                <th>Manufacturer</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Order Date</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    $user_id = $_SESSION['auth_user']['user_id'];
                                    $orders = "SELECT * FROM orders WHERE retailer_id = $user_id AND status = 2";
                                    $orders_run = mysqli_query($con, $orders);
                                    if(mysqli_num_rows($orders_run) > 0)
                                    { $i=1;
                                        foreach($orders_run as $item)
                                        { ?>
                                            <tr>
                                                <!-- <pre>
                                                    print_r($item);
                                                <pre> -->
                                                <td><?=$i++?></td>
                                                <td><?=$item['id'];?></td>
                                                <?php 
                                                    $medice = "SELECT * FROM medicine WHERE id = '{$item['medicine_id']}' ";
                                                    $medice_run = mysqli_query($con, $medice);
                                                    $medice_row = mysqli_fetch_array($medice_run);
                                                    $manufacturer_id = ($medice_row['user_id']);
                                                ?>
                                                <td><?=$medice_row['name'];?></td>
                                                <?php 
                                                    // $manufacturer_id = $item[$medice_row['user_id']];
                                                    $manufacturer = "SELECT * FROM users WHERE id = '$manufacturer_id'";
                                                    $manufacturer_run = mysqli_query($con, $manufacturer);
                                                    $manufacturer_row = mysqli_fetch_array($manufacturer_run);
                                                ?>   
                                                <td><?=$manufacturer_row['name'];?></td>                                            
                                                <td><?=$item['quantity'];?></td>
                                                <td><?=$item['price'];?></td>
                                                <td><?=$item['date'];?></td>
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
include('includes/scripts.php');
include('includes/footer.php');
?>