
<?php

include '_header.php';



// Query 
$query = "SELECT * FROM notes";
$result = mysqli_query($connect, $query);

// Main content
echo '<main class="m-auto mt-4 max-w-7xl">';
    echo '<div class="p-4 shadow-lg border border-gray-400 rounded-lg">';

        echo '<div class="flex justify-between mb-4">
            <div>
                <div class="font-bold text-2xl py-1">
                    Profile
                </div>
            </div>
        </div>';


        if(isset($_SESSION['user']) && $_SESSION['user']!=''){

            $id = $_SESSION['user']['id'];

            $query = "SELECT profile FROM users WHERE id='$id'";
            $result = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($result);

            echo '<img src="'.$row['profile'].'" class="w-40">';
        }
    
        echo '<form action="action/profileController.php" method="post" enctype="multipart/form-data">
            <input type="file" name="profile" id="profile">
            <button type="submit" name="update" class="p-2 text-white bg-green-400" value="'.$_SESSION['user']['id'].'">Update</button>
        </form>
        
        
        
        ';


        
        echo '<a href="action/logout.php" class="p-2 px-4 rounded-md duration-300 bg-red-500 hover:bg-red-400">Logout</a>';

    echo '</div>';
echo '</main>';
// End of main content





