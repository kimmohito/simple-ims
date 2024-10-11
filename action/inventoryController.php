<?php

include 'database.php';


echo 'here!';
echo $_POST['name'];

echo $_POST['create'];

if(isset($_POST['create'])){

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];


    $var = $_POST['price'];

    echo $_POST['name'];

    /*
        Date today: 04 - 10 - 2024

        Y - 2024
        y - 24
        F - October
        M - Oct
        m - 10
        D - Fri
        d - 04
    */ 
    $created_at = date('Y-m-d'); 

    $query = "INSERT INTO inventories (name, quantity, created_at, price) VALUES ('$name', '$quantity', '$created_at', '$price')";

    $result = mysqli_query($connect, $query);

    if($result){
        header('location: ../inventories.php?success=1');
        exit();
    }else{
        header('location: ../inventories.php?error=1');
        exit();
    }


}


if(isset($_POST['delete'])){

    $id = $_POST['id'];

    $query = "DELETE FROM inventories WHERE id = '$id'";

    $result = mysqli_query($connect, $query);

    if($result){
        header('location: ../inventories.php?success=2');
        exit();
    }else{
        header('location: ../inventories.php?error=2');
        exit();
    }

}

if(isset($_POST['save'])){

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $id = $_POST['id'];

    $query = "UPDATE inventories SET name = '$name', quantity = '$quantity', price = '$price' WHERE id = '$id';";

    $result = mysqli_query($connect, $query);

    if($result){
        header('location: ../inventories.php?success=3');
        exit();
    }else{
        header('location: ../inventories.php?error=3');
        exit();
    }

}




header('location: ../inventories.php');