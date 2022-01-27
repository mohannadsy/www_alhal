<?php

function update_value_in_config($key , $value , $in_key = ''){
    $json = json_decode(file_get_contents('config.json') , true);
    if($in_key != '')
        $json[$key][$in_key] = $value;
    else
        $json[$key] = $value;
    file_put_contents('config.json' , json_encode($json));
}


function get_value_from_config($key , $in_key = ""){
    $json = json_decode(file_get_contents('config.json') , true);
    if($in_key != "")
        return $json[$key][$in_key];
    return $json[$key];
}

function update_value_in_setting($key , $value){
    $json = json_decode(file_get_contents('setting.json') , true);
    $json[$key] = $value;
    file_put_contents('setting.json' , json_encode($json));
}

function get_value_from_setting($key , $in_key = ""){
    $json = json_decode(file_get_contents('setting.json') , true);
    if($in_key != "")
        return $json[$key][$in_key];
    return $json[$key];
}

?>