<?php

function message_box($message){
    echo "<script>alert('$message')</script>";
}

function open_window_self($window){
    echo "<script>window.open('$window' , '_self')</script>";
}
function open_window_blank($window){
    echo "<script>window.open('$window' , '_blank')</script>";
}

function open_window_self_id($window , $id){
    echo "<script>window.open('$window?id=$id' , '_self')</script>";
}
function open_window_self_code($window , $code){
    echo "<script>window.open('$window?code=$code' , '_self')</script>";
}

function href_id($window , $id){
    return "$window?id=$id";
}
function href_code($window , $code){
    return "$window?code=$code";
}

function open_window_self_after_confirm($message , $path){
    echo "<script>
            if(confirm('$message'))
                window.open('$path' , '_self');
        </script>";
}

function set_local_storage($key , $value){
    echo "<script>
        if(localStorage) {
            localStorage.setItem('$key' , '$value');
        }
        </script>";
}

function close_window(){
    echo "<script>window.close()</script>";
}


function do_script($script){
    echo "<script>$script</script>";
}