
<?php

include 'action/database.php';


echo '<br>';

// Query 
$query = "SELECT * FROM inventories";

$result = mysqli_query($connect, $query);

// if($result){
//     echo $result;
// }



include 'response.php';

echo '<table border=1 style="margin-top: 10px;">';
    echo '<tr>
        <th>Id</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Created at</th>
        <th>Price</th>
        <th>Action</th>
    </tr>';
    foreach($result as $row){
        echo '<tr>';
            echo '<td>'.$row['id'].'.</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['quantity'].'</td>';
            echo '<td>'.$row['created_at'].'</td>';
            echo '<td>'.$row['price'].'</td>';
            echo '<td>
                <a href="?modal=edit&id='.$row['id'].'">Edit</a>
                <a href="?modal=delete&id='.$row['id'].'">Delete</a>
            </td>';
        echo '</tr>';
    }
echo '</table>';



echo '<br>';

echo '<div>
    <a href="?modal=create">Create</a>
</div>';


echo '<br><br><br><br><br>';

if(isset($_GET['modal'])){


    if($_GET['modal']=='create'){
        echo '
            <form action="action/inventoryController.php" method="post">
                <div style="border: solid 1px black;">
                    <h3>Create New Item</h3>
                    <table>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="input name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Quantity</label>
                            </td>
                            <td>
                                <input type="number" name="quantity" placeholder="input quantity"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Price</label>
                            </td>
                            <td>
                                <input type="text" name="price" placeholder="input price">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td style="float: right;">
                                <button type="submit" name="cancel">
                                    Cancel
                                </button>
                                <button type="submit" name="create">
                                    Create
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
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


}


if(isset($_GET['table'])){
    $table = $_GET['table'];
}else{
    $table = 'inventories';
}


$query = "SHOW COLUMNS FROM ".$table;
$result = mysqli_query($connect, $query);

$query2 = "SELECT * FROM ".$table;
$result2 = mysqli_query($connect, $query2);

$query3 = "SHOW TABLES";
$result3 = mysqli_query($connect, $query3);


if(mysqli_num_rows($result) > 0){

    echo 'Tables : ';
    while($row3=mysqli_fetch_assoc($result3)){
        echo '<a href="?table='.$row3['Tables_in_simple-ims'].'">'.$row3['Tables_in_simple-ims'].'</a>,  ';
    }

    echo '<table border="1">'; 

        echo '<tr>';
            $columns = [];
            while($row=mysqli_fetch_assoc($result)){
                echo '<th>'.$row['Field'].'</th>';
                $columns[] = $row['Field'];
            }
        echo '</tr>';

        while($row2=mysqli_fetch_assoc($result2)){
            echo '<tr>';
                foreach($columns as $column){
                    echo '<td>'.$row2[$column].'</td>';
                }
            echo '</tr>';
        }

    echo '</table>';

}




/*

CRUD

R - Read


*/ 