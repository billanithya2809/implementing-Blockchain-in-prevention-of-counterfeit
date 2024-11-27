<?php
include('authentication.php');
include('includes/header.php');
?>

<div class="container-fluid px-4">
    <!-- <h4 class="mt-4">Add Category</h4> -->
    <!-- <ol class="breadcrumb mb-4">
        <a href="index.php" class="breadcrumb-item active">Dashboard</a>
        <a href="view-register.php"class="breadcrumb-item">Users</a>
        <a href="register-edit.php"class="breadcrumb-item">Edit</a>
    </ol> -->
    <div class="row">
        <div class="col-md-12 pt-4">
            <?php include('message.php');?>
            <div class="card">
                <div class="card-header">
                    <h5 class="">Add Medicine</h5>
                </div>
                <div class="card-body">
                    <!-- Multipart Form data -->
                    <form action="./code.php" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input name = "name" type="text" max="191" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Licence No</label>
                                <input name = "licenceNumber" type="text" max="191" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox"  name="status" width="70px" height="70px" id="">
                            </div>
                            <!-- Licence Documrnt -->
                            <div class="col-md-6 mb-3">
                                <label for="">Licence Document</label>
                                <input type="file" name="licence-document" id="">
                            </div>
                            <div class="text-center col-md-12 mb-3">
                                <button class="text-center btn btn-primary" name="add-medicine" type="submit">Save Medicine</button>
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