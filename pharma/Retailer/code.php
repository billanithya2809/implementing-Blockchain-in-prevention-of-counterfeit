<?php 

include('authentication.php');

if(isset($_POST['buy-medicine'])){
    $medicine_id = $_POST['medicine_id'];
    $retailer_id = $_SESSION['auth_user']['user_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $quantity * $price;
    $status = 0;

    if(empty($quantity)){
        $_SESSION['message'] = "Quantity is required";
        $_SESSION['flag'] = "2";
        header('Location: buy-medicine.php?id='.$medicine_id);
    }else{
        $query = "INSERT INTO orders (medicine_id, retailer_id, quantity, price, total, status) VALUES ('$medicine_id', '$retailer_id', '$quantity', '$price', '$total', '$status')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            $_SESSION['message'] = "Medicine Ordered";
            $_SESSION['flag'] = "1";
            header('Location: buy-medicine.php?id='.$medicine_id);
        }else{
            $_SESSION['message'] = "Medicine Not Ordered";
            $_SESSION['flag'] = "2";
            header('Location: buy-medicine.php?id='.$medicine_id);
        }
    }
}

if(isset($_POST['cancel-order'])){
    $order_id = $_POST['order_id'];
    $query = "UPDATE orders SET status = 2 WHERE id = '$order_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Order Cancelled";
        $_SESSION['flag'] = "1";
        header('Location: my-order.php');
    }else{
        $_SESSION['message'] = "Order Not Cancelled";
        $_SESSION['flag'] = "2";
        header('Location: my-order.php');
    }
}

?>