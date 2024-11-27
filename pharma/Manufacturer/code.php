<?php 

include('authentication.php');

//Add Medicine
if(isset($_POST['add-medicine'])){
    $name = $_POST['name'];
    $licenceNumber = $_POST['licenceNumber'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0;
    $licence_document = $_FILES['licence-document']['name'];
    $licence_document_tmp = $_FILES['licence-document']['tmp_name'];
    $user_id =  $_SESSION['auth_user']['user_id'];

    if(empty($name) || empty($licenceNumber) || empty($description) || empty($licence_document)){
        $_SESSION['message'] = "All fields are required";
        $_SESSION['flag'] = "2";
        header('Location: add_medicine.php');
    }else{
        $query = "INSERT INTO medicine (name, licenceNumber, description, status, licence_document, user_id) VALUES ('$name', '$licenceNumber', '$description', '$status', '$licence_document', $user_id)";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            move_uploaded_file($licence_document_tmp, "upload/".$licence_document);
            $_SESSION['message'] = "Medicine Added";
            $_SESSION['flag'] = "1";
            header('Location: add_medicine.php');
        }else{
            $_SESSION['message'] = "Medicine Not Added";
            $_SESSION['flag'] = "2";
            header('Location: add_medicine.php');
        }
    }
}

//Edit Medicine
if(isset($_POST['edit-medicine'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $licenceNumber = $_POST['licenceNumber'];
    $description = $_POST['description'];
    $status = isset($_POST['status']) ? 1 : 0;
    $licence_document = $_FILES['licence-document']['name'];
    $licence_document_tmp = $_FILES['licence-document']['tmp_name'];

    if(empty($name) || empty($licenceNumber) || empty($description)){
        $_SESSION['message'] = "All fields are required";
        $_SESSION['flag'] = "2";
        header('Location: edit_medicine.php?id='.$id);
    }else{
        if(empty($licence_document)){
            $query = "UPDATE medicine SET name = '$name', licenceNumber = '$licenceNumber', description = '$description', status = '$status' WHERE id = '$id'";
        }else{
            $query = "UPDATE medicine SET name = '$name', licenceNumber = '$licenceNumber', description = '$description', status = '$status', licence_document = '$licence_document' WHERE id = '$id'";
        }
        $query_run = mysqli_query($con, $query);

        if($query_run){
            if(!empty($licence_document)){
                move_uploaded_file($licence_document_tmp, "upload/".$licence_document);
            }
            $_SESSION['message'] = "Medicine Updated";
            $_SESSION['flag'] = "1";
            header('Location: edit_medicine.php?id='.$id);
        }else{
            $_SESSION['message'] = "Medicine Not Updated";
            $_SESSION['flag'] = "2";
            header('Location: edit_medicine.php?id='.$id);
        }
    }
}

//Delete Medicine
if(isset($_POST['medicine_delete'])){
    $id = $_POST['user_id'];

    $query = "UPDATE medicine SET status = 2 WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Medicine Deleted";
        $_SESSION['flag'] = "1";
        header('Location: view_medicine.php');
    }else{
        $_SESSION['message'] = "Medicine Not Deleted";
        $_SESSION['flag'] = "2";
        header('Location: view_medicine.php');
    }
}

//Delete Permanent
if(isset($_POST['medicine_delete_permanent'])){
    $id = $_POST['id'];

    $query = "DELETE FROM medicine WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Medicine Deleted Permanently";
        $_SESSION['flag'] = "1";
        header('Location: deleted_medicine.php');
    }else{
        $_SESSION['message'] = "Medicine Not Deleted Permanently";
        $_SESSION['flag'] = "2";
        header('Location: deleted_medicine.php');
    }
}

//Medicine Revoke
if(isset($_POST['medicine_revoke'])){
    $id = $_POST['id'];

    $query = "UPDATE medicine SET status = 1 WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Medicine Revoke";
        $_SESSION['flag'] = "1";
        header('Location: deleted_medicine.php');
    }else{
        $_SESSION['message'] = "Medicine Not Revoke";
        $_SESSION['flag'] = "2";
        header('Location: deleted_medicine.php');
    }
}


?>