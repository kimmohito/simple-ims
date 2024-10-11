
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
                Login
            </div>
        </div>
    </div>';

    echo '<form action="action/authController.php" method="post">
    
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="submit" name="login">Login</button>
    
    </form>';


    echo '</div>';
echo '</main>';
// End of main content





