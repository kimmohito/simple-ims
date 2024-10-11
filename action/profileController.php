<?php

include 'database.php';

$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["profile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["update"])) {

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        header('Location: ../profile.php?error=9');
        exit();
    }

    // // Check if file already exists
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    //     header('Location: ../profile.php?error=9');
    //     exit();
    // }

    // Check file size
    if ($_FILES["profile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        header('Location: ../profile.php?error=9');
        exit();
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        header('Location: ../profile.php?error=9');
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        header('Location: ../profile.php?error=9');
        exit();
        // if everything is ok, try to upload file
    } else {

        unlink('../img/'.basename($_FILES["profile"]["name"]));


        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["profile"]["name"])) . " has been uploaded.";    

            $id = $_POST["update"];

            $profile = "img/".basename($_FILES["profile"]["name"]);

            $query = "UPDATE users SET profile='$profile' WHERE id='$id'";

            $result = mysqli_query($connect, $query);

            header('Location: ../profile.php?success=7');
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
            header('Location: ../profile.php?error=9');
            exit();
        }
    }

}
