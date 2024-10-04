<?php

include 'database.php';

if(isset($_POST['create'])){

    $name = $_POST['name'];

    $query = "INSERT INTO notes (name) VALUES ('$name')";

    $result = mysqli_query($connect, $query);

    if($result){
        header('location: ../notes.php?success=1');
        exit();
    }else{
        header('location: ../notes.php?error=1');
        exit();
    }

}


if(isset($_POST['delete'])){

    $id = $_POST['id'];

    $query = "DELETE FROM notes WHERE id = '$id'";

    $result = mysqli_query($connect, $query);

    if($result){
        header('location: ../notes.php?success=2');
        exit();
    }else{
        header('location: ../notes.php?error=2');
        exit();
    }

}

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $name = $_POST['name'];

    $query = "UPDATE notes SET name = '$name' WHERE id = '$id';";

    $result = mysqli_query($connect, $query);

    if($result){
        header('location: ../notes.php?success=3');
        exit();
    }else{
        header('location: ../notes.php?error=3');
        exit();
    }

}




header('location: ../notes.php');