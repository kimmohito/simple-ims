
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
                    Notes
                </div>
            </div>
            <div>
                <a href="?modal=create" class="block p-2 px-4 rounded-md bg-gray-800 text-white"><i class="ti ti-plus mr-2"></i>New Notes</a>
            </div>
        </div>';


        echo "INDEX!!";

        // +6011-11110470
        $name = "muhammad ali bin abu";

        echo ucwords($name);

        $var = "AYAM GORENG TEPUNG!";

        $newVar = str_replace('T', 'J', $var);

        echo $newVar;


    echo '</div>';
echo '</main>';
// End of main content





