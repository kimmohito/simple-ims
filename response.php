<?php

$color = 'black';
$message = '';

if(isset($_GET['success']) || isset($_GET['error'])){

    $color = 'green';

    if($_GET['success']==1){
        $message = 'Successfully added new inventory into database.';
    }

    elseif($_GET['success']==2){
        $message = 'Successfully deleted one item from database.';
    }

    elseif($_GET['success']==3){
        $message = 'Successfully updated one item from database.';
    }

}

if(isset($_GET['error'])){

    $color = 'red';

    if($_GET['error']==1){
        $message = 'Failed to add new inventory into database.';
    }

    elseif($_GET['error']==2){
        $message = 'Failed to delete one item from database.';
    }

    
    elseif($_GET['error']==3){
        $message = 'Failed to update one item from database.';
    }


}



echo '<span style="color: '.$color.';">'.$message.'</span>';