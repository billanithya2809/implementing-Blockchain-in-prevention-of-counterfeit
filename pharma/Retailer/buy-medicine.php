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
                    <h5 class="">Buy Medicine
                    </h5>
                </div>
                <div class="card-body">
                    <?php
                        $id = $_GET['id'];
                        $medicine = "SELECT * FROM medicine WHERE id = '$id'";
                        $medicine_run = mysqli_query($con, $medicine);
                        $medicine_row = mysqli_fetch_array($medicine_run);
                        $manufacturer_id = $medicine_row['user_id'];
                        $manufacturer = "SELECT * FROM users WHERE id = '$manufacturer_id'";
                        $manufacturer_run = mysqli_query($con, $manufacturer);
                        $manufacturer_row = mysqli_fetch_array($manufacturer_run);
                    ?>
                    <form method="post" action="code.php">
                        <div class="row">
                            <!-- Medicine ID -->
                            <input type="hidden" name="medicine_id" value="<?=$medicine_row['id']?>">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input value="<?=$medicine_row['name']?>" name = "name" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">License Number</label>
                                <input value="<?=$medicine_row['licenceNumber']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea value="<?=$medicine_row['description']?>" name="description" id="" class="form-control" rows="4" readonly><?=$medicine_row['description']?></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer</label>
                                <input value="<?=$manufacturer_row['name']?>" name = "name" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Email</label>
                                <input value="<?=$manufacturer_row['email']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Phone</label>
                                <input value="<?=$manufacturer_row['phone']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Address</label>
                                <input value="<?=$manufacturer_row['address']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer City</label>
                                <input value="<?=$manufacturer_row['city']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer State</label>
                                <input value="<?=$manufacturer_row['state']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>  
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Country</label>
                                <input value="<?=$manufacturer_row['country']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Zip</label>
                                <input value="<?=$manufacturer_row['zip']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Status</label>
                                <input value="<?=$manufacturer_row['status']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Created At</label>
                                <input value="<?=$manufacturer_row['created_at']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Manufacturer Updated At</label>
                                <input value="<?=$manufacturer_row['updated_at']?>" name = "licenceNumber" type="text" max="191" class="form-control" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Number of Stocks</label>
                                <input required value="" name = "quantity" type="text" max="191" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Price</label>
                                <input required value="" name = "price" type="text" max="191" class="form-control">
                            </div>
                            <div class="text-center col-md-12 mb-3">
                                <button class="text-center btn btn-primary" name="buy-medicine" type="submit">Buy Medicine</button>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>