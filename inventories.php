
<?php

include '_header.php';

// Query 
$query = "SELECT * FROM inventories";
$result = mysqli_query($connect, $query);

// Main content
echo '<main class="m-auto mt-4 max-w-7xl">';
    echo '<div class="p-4 shadow-lg border border-gray-400 rounded-lg">';




        if(isset($_SESSION['user']) && $_SESSION['user']!=''){
            
            echo '<div class="flex justify-between mb-4">
                <div>
                    <div class="font-bold text-2xl py-1">
                        Inventories
                    </div>
                </div>
                <div>
                    <a href="?modal=create" class="block p-2 px-4 rounded-md bg-gray-800 text-white"><i class="ti ti-plus mr-2"></i>Add New Item</a>
                </div>
            </div>';
            
            echo '<table class="w-full table-auto text-center grid-gap-2 outline outline-1 outline-gray-400 overflow-hidden rounded-md">';
            echo '<tr class="bg-gray-800 text-white">
                    <th class="p-2">Id</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Created at</th>
                    <th class="p-2">Price</th>';
            if($_SESSION['user']['role']=='admin'){
                echo '<th class="p-2">Action</th>';
            }
            echo    '</tr>';
            foreach($result as $row){
                echo '<tr class="border-b border-gray-400 last:border-none">';
                    echo '<td class="p-1">'.$row['id'].'.</td>';
                    echo '<td class="p-1">'.$row['name'].'</td>';
                    echo '<td class="p-1">'.$row['quantity'].'</td>';
                    echo '<td class="p-1">'.$row['created_at'].'</td>';
                    echo '<td class="p-1">'.$row['price'].'</td>';

                    if($_SESSION['user']['role']=='admin'){
                        echo '<td class="p-1">
                            <a href="?modal=edit&id='.$row['id'].'" class="text-blue-400"><i class="ti ti-edit"></i></a>
                            <a href="?modal=delete&id='.$row['id'].'" class="text-red-400"><i class="ti ti-trash"></i></a>
                        </td>';
                    }

                echo '</tr>';
            }
        echo '</table>';
        }else{

            echo 'You cant view this content.';
        }




    echo '</div>';
echo '</main>';
// End of main content





    




if(isset($_GET['modal'])){

    
    echo '<div class="bg-black w-screen h-screen absolute top-0 opacity-60"></div>';

    echo '<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white rounded-lg overflow-hidden">';


    if($_GET['modal']=='create'){

        echo '
            <div class="p-4">
                <form action="action/inventoryController.php" method="post" class="m-0">
                    <div class="text-2xl">Create New Item</div>

                        <div class="mt-4">
                            <div class="text-sm font-bold text-gray-600">
                                Name:
                            </div>
                            <div>
                                <input type="text" name="name" placeholder="input name" class="p-2 bg-gray-200 w-full rounded-md border border-gray-400">
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="text-sm font-bold text-gray-600">
                                Quantity:
                            </div>
                            <div>
                                <input type="number" name="quantity" placeholder="input quantity" class="p-2 bg-gray-200 w-full rounded-md border border-gray-400">
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="text-sm font-bold text-gray-600">
                                Price:
                            </div>
                            <div>
                                <input type="text" name="price" placeholder="input price" class="p-2 bg-gray-200 w-full rounded-md border border-gray-400">
                            </div>
                        </div>

                    </div>
                    <div class="flex gap-2 justify-end bg-gray-200 p-2">
                        <button type="submit" name="cancel" class="p-2 px-4 bg-red-400 text-white hover:bg-red-500 rounded-md">
                            Cancel
                        </button>
                        <button type="submit" name="create" class="p-2 px-4 bg-green-400 text-white hover:bg-green-500 rounded-md">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        ';

    }

    if($_GET['modal']=='delete'){
        echo '
            <form action="action/inventoryController.php" method="post">
                <div style="border: solid 1px black;">
                
                    <h3>Delete Item</h3>
                    <p>Are you sure to delete item '.$_GET['id'].'?</p>
                    <input type="number" name="id" value="'.$_GET['id'].'" hidden>
                    <button type="submit" name="cancel">Cancel</button>
                    <button type="submit" name="delete">Confirm</button>
                </div>
            </form>
        ';
    }


    if($_GET['modal']=='edit'){

        $id = $_GET['id'];

        $query = "SELECT * FROM inventories WHERE id = '$id'";
    
        $result = mysqli_query($connect, $query);

        $row = mysqli_fetch_assoc($result);

        echo '
            <form action="action/inventoryController.php" method="post">
                <div style="border: solid 1px black;">
                    <h3>Edit Item '.$id.'</h3>
                    <input type="number" name="id" value="'.$_GET['id'].'" hidden>
                    <table>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="input name" value="'.$row['name'].'" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Quantity</label>
                            </td>
                            <td>
                                <input type="number" name="quantity" placeholder="input quantity" value="'.$row['quantity'].'" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Price</label>
                            </td>
                            <td>
                                <input type="text" name="price" placeholder="input price" value="'.$row['price'].'" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td style="float: right;">
                                <button type="submit" name="cancel">
                                    Cancel
                                </button>
                                <button type="submit" name="save">
                                    Save
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        ';
    }


    echo '</div>';
}


// if(isset($_GET['table'])){
//     $table = $_GET['table'];
// }else{
//     $table = 'inventories';
// }


// $query = "SHOW COLUMNS FROM ".$table;
// $result = mysqli_query($connect, $query);

// $query2 = "SELECT * FROM ".$table;
// $result2 = mysqli_query($connect, $query2);

// $query3 = "SHOW TABLES";
// $result3 = mysqli_query($connect, $query3);


// if(mysqli_num_rows($result) > 0){

//     echo 'Tables : ';
//     while($row3=mysqli_fetch_assoc($result3)){
//         echo '<a href="?table='.$row3['Tables_in_simple-ims'].'">'.$row3['Tables_in_simple-ims'].'</a>,  ';
//     }

//     echo '<table border="1">'; 

//         echo '<tr>';
//             $columns = [];
//             while($row=mysqli_fetch_assoc($result)){
//                 echo '<th>'.$row['Field'].'</th>';
//                 $columns[] = $row['Field'];
//             }
//         echo '</tr>';

//         while($row2=mysqli_fetch_assoc($result2)){
//             echo '<tr>';
//                 foreach($columns as $column){
//                     echo '<td>'.$row2[$column].'</td>';
//                 }
//             echo '</tr>';
//         }

//     echo '</table>';

// }


include '_footer.php';
?>