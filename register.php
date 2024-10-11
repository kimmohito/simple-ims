
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
                Register
            </div>
        </div>
    </div>';

    echo '<form action="action/authController.php" method="post">
    
        <label>Email</label><br>
        <input type="email" name="email"><br>

        <label>Password</label><br>
        <input type="password" name="password"><br>

        <label>Confirm Password</label><br>
        <input type="password" name="confirm-password"><br>

        <button type="submit" name="register" class="bg-green-500 text-white p-2">Register</button>
    
    </form>';


    echo '</div>';
echo '</main>';
// End of main content





