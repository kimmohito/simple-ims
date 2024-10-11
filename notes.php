
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


        echo '<form action="action/noteController.php" method="post">';

            echo '<div class="grid grid-cols-4 gap-4">';

            
            while($row=mysqli_fetch_assoc($result)){
                echo '<div class="border border-yellow-300 bg-yellow-200 rounded-md flex">';
                
                if(isset($_GET['modal']) && $_GET['modal']=='delete' && $_GET['id']==$row['id']){
                    echo '<input type="number" name="id" value="'.$_GET['id'].'" hidden>';
                    echo '<span class="p-2 px-4 w-full">'.$row['name'].'</span>';
                    echo '<button type="submit" name="delete"><i class="ti ti-trash mr-2"></i></button>';
                }
                elseif(isset($_GET['modal']) && $_GET['modal']=='edit' && $_GET['id']==$row['id']){
                    echo '<input type="number" name="id" value="'.$_GET['id'].'" hidden>';
                    echo '<input type="text" name="name" placeholder="input name" value="'.$row['name'].'" class="w-full p-2 px-4 bg-transparent" />';
                    echo '<a href="?modal=delete&id='.$row['id'].'" class="pt-3"><i class="ti ti-trash"></i></a>';
                    echo '<button type="submit" name="save"><i class="ti ti-device-floppy mr-2"></i></button>';
                }else{
                    echo '<a href="?modal=edit&id='.$row['id'].'" class="p-2 px-4 w-full flex justify-between">
                        <span>'.strip_tags($row['name']).'</span>
                        <i class="ti ti-edit py-1"></i>
                    </a>';
                }
                
                echo '</div>';
            }

            echo '</div>';

        echo '</form>';


        
        echo '<form action="action/noteController.php" method="post">';

        echo '<table>';

        
        if(isset($_GET['modal'])){
            if($_GET['modal']=='create'){
                echo '<tr>
                        <td></td>
                        <td><input type="text" name="name" placeholder="input name"></td>
                        <td><button type="submit" name="create">Create</button></td>
                    </tr>';
            }
        }else{
        }
        
        
        echo '</table>';
        echo '</form>';



    echo '</div>';
echo '</main>';
// End of main content





