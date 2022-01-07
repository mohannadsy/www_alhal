<?php

function message_box($message){
    echo "<script>alert('$message')</script>";
}

function open_window_self($window){
    echo "<script>window.open('$window' , '_self')</script>";
}

function open_window_self_id($window , $id){
    echo "<script>window.open('$window?id=$id' , '_self')</script>";
}

function href_id($window , $id){
    return "$window?id=$id";
}

function open_window_self_after_confirm($message , $path){
    echo "<script>
            if(confirm('$message'))
                window.open('$path' , '_self');
        </script>";
}

?>