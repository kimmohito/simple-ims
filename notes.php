
<?php

include 'action/database.php';


echo '<br>';

// Query 
$query = "SELECT * FROM notes";

$result = mysqli_query($connect, $query);

// if($result){
//     echo $result;
// }



include 'response.php';

echo '<form action="action/noteController.php" method="post">';

echo '<table border=1 style="margin-top: 10px;">';
    echo '<tr>
        <th>Id</th>
        <th>Notes</th>
        <th>Action</th>
    </tr>';
    while($row=mysqli_fetch_assoc($result)){
        echo '<tr>';
            echo '<td>'.$row['id'].'.</td>';
            echo '<td>';  
                if(isset($_GET['modal']) && $_GET['modal']=='delete' && $_GET['id']==$row['id']){
                    echo '<input type="number" name="id" value="'.$_GET['id'].'" hidden>';
                    echo $row['name'];
                }
                elseif(isset($_GET['modal']) && $_GET['modal']=='edit' && $_GET['id']==$row['id']){
                    echo '<input type="number" name="id" value="'.$_GET['id'].'" hidden>';
                    echo '<input type="text" name="name" placeholder="input name" value="'.$row['name'].'" />';
                }else{
                    echo $row['name'];
                }
            echo'</td>';
            echo '<td>';


                if(isset($_GET['modal']) && $_GET['modal']=='delete' && $_GET['id']==$row['id']){
                    echo '<button type="submit" name="cancel">Cancel</button>';
                    echo '<button type="submit" name="delete">Confirm</button>';
                }
                
                elseif(isset($_GET['modal']) && $_GET['modal']=='edit' && $_GET['id']==$row['id']){
                    echo '<button type="submit" name="cancel">Cancel</button>';
                    echo '<button type="submit" name="save">Save</button>';
                }
                
                else{
                    echo '<a href="?modal=edit&id='.$row['id'].'">Edit</a>';
                    echo '<a href="?modal=delete&id='.$row['id'].'">Delete</a>';
                }
            
                // <a href="?modal=edit&id='.$row['id'].'">Edit</a>
                // <a href="?modal=delete&id='.$row['id'].'">Delete</a>
                
            echo '</td>';
        echo '</tr>';
    }

echo '';


if(isset($_GET['modal'])){
    if($_GET['modal']=='create'){
        echo '<tr>
                <td></td>
                <td><input type="text" name="name" placeholder="input name"></td>
                <td><button type="submit" name="create">Create</button></td>
            </tr>';
    }
}else{
    echo '<tr>
        <td></td>
        <td></td>
        <td><a href="?modal=create">Create</a></td>
    </tr>';
}


echo '</table>';
echo '</form>';