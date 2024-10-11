<?php

$color = 'black';
$message = '';

if(isset($_GET['success'])){

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

    
    elseif($_GET['success']==4){
        $message = 'Successfully registered. You can login now.';
    }

    elseif($_GET['success']==5){
        $message = 'Successfully login!';
    }

    elseif($_GET['success']==6){
        $message = 'Successfully Logout!';
    }

    elseif($_GET['success']==7){
        $message = 'Successfully Update your profile!';
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

    elseif($_GET['error']==4){
        $message = 'You cant use underscore inside notes.';
    }

    
    elseif($_GET['error']==5){
        $message = 'Password does not match.';
    }

    elseif($_GET['error']==6){
        $message = 'Email has been taken.';
    }

    
    elseif($_GET['error']==7){
        $message = 'Email does not exist! Please register.';
    }

    elseif($_GET['error']==8){
        $message = 'Credentials does not match! Please try again.';
    }

    
    elseif($_GET['error']==9){
        $message = 'Failed to upload your profile';
    }
}



echo '<span style="color: '.$color.';">'.$message.'</span>';