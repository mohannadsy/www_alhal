<?php

function update_value_in_config($key , $value){
    $json = json_decode(file_get_contents('config.json') , true);
    $json[$key] = $value;
    file_put_contents('config.json' , json_encode($json));
}

function get_value_from_config($key){
    $json = json_decode(file_get_contents('config.json') , true);
    return $json[$key];
}

?>