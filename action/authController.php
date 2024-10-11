<?php

include 'database.php';


if(isset($_POST['register'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    $confirm_password = $_POST['confirm-password'];


    if($password!=$confirm_password){
        header('Location: ../register.php?error=5');
        exit();
    }

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $query);

    $count = mysqli_num_rows($result);

    if($count!=0){
        header('Location: ../register.php?error=6');
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
    $result = mysqli_query($connect, $query);

    header('Location: ../login.php?success=4');
    exit();

}



if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);

    if($count==0){
        header('Location: ../login.php?error=7');
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    if(!password_verify($password, $row['password'])){
        header('Location: ../login.php?error=8');
        exit();
    }

    session_start();

    $_SESSION['user']=[
        'id' => $row['id'],
        'profile' => $row['profile'],
        'name' => $row['name'],
        'email' => $row['email'],
        'role' => $row['role'],
    ];
    header('Location: ../inventories.php?success=5');
    exit();

}