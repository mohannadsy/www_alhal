<?php

function message_box($message){
    echo "<script>alert('$message')</script>";
}

function open_window_self($window){
    echo "<script>window.open('$window' , '_self')</script>";
}

?>