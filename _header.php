<?php
    include 'action/database.php';
    include 'response.php';
    include 'middleware/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <!-- <link href="assets/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.css" rel="stylesheet" /> -->
</head>
<body class="bg-gray-200">

<div class="max-w-7xl m-auto bg-gray-800 text-white flex justify-between rounded-lg p-2 mt-4">
    <div class="flex">
        <div>
            <div class="font-bold p-2">
                SIMPLE-IMS
            </div>
        </div>
        <div class="hidden md:flex gap-2">
            <a href="index.php" class="p-2 px-4 rounded-md duration-300 hover:bg-sky-400">
                <i class="ti ti-dashboard mr-2"></i>Dashboard
                <!-- <i class="fab fa-github mr-2"></i> -->
            </a>
            <a href="inventories.php" class="p-2 px-4 rounded-md duration-300 hover:bg-sky-400">
                <i class="ti ti-building-warehouse mr-2"></i>Inventories
            </a>
            <a href="notes.php" class="p-2 px-4 rounded-md duration-300 hover:bg-sky-400">
                <i class="ti ti-note mr-2"></i>Notes
            </a>
        </div>
    </div>

    <div class="flex">

        <?php

            if(isset($_SESSION['user']) && $_SESSION['user']!=''){


                $id = $_SESSION['user']['id'];

                $query = "SELECT profile FROM users WHERE id='$id'";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($result);

                echo '<a href="profile.php" class="rounded-md duration-300 hover:bg-sky-400 flex">
                        <span><img src="'.$row['profile'].'" class="h-[40px] rounded-full"/></span>
                        <span class="m-2">'.$_SESSION['user']['name'].'</span>
                    </a>';
            }else{
                echo '<a href="login.php" class="p-2 px-4 rounded-md duration-300 hover:bg-sky-400">Login</a>';
            }
        ?>

    </div>

    <!-- <nav class="p-4 bg-gray-800 text-white">
        <a href="index.php">Dashboard</a>
        <a href="inventory.php">Inventory</a>
        <a href="notes.php">Notes</a>
    </nav> -->
</div>
<div class="md:hidden grid mx-4 bg-gray-600 text-white rounded-b-md p-2 gap-2">
    <a href="index.php" class="p-2 px-4 rounded-md duration-300 hover:bg-sky-400">
        Dashboard
    </a>
    <a href="inventories.php" class="p-2 px-4 rounded-md duration-300 hover:bg-sky-400">
        Inventories
    </a>
    <a href="notes.php" class="p-2 px-4 rounded-md duration-300 hover:bg-sky-400">
        Notes
    </a>
</div>




    
