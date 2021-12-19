<?php

function success_error_message($get , $value , $success , $error){
    if (isset($_GET[$get])) {
        if ($_GET[$get] == $value)
            echo "<div class='text-center alert-success'>$success</div>";
        if ($_GET[$get] != $value)
            echo "<div class='text-center alert-danger'>$error</div>";
    }
}

function success_error_create_message($success , $error){
    success_error_message('message_create' , 'success' , $success , $error);
}

function success_error_update_message($success , $error){
    success_error_message('message_update' , 'success' , $success , $error);
}

function success_error_delete_message($success , $error){
    success_error_message('message_delete' , 'success' , $success , $error);
}


?>