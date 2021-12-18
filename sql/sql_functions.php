<?php

function getSingleName($table)
{
    if(strpos($table,"ies" , strlen($table)-4)== strlen($table)-3)
        return substr_replace($table,'y' , strlen($table)-3);
    else
    return rtrim($table,'s');

   
}
    
function getStrFromList($lst)
{
    $result = '';
    foreach( $lst as $l )   
       $result = $result . " " . $l . " ," ;
    $result = rtrim($result,',');
    return $result;
}
    
function getKeysFromDictionary($dictionary)
{
    $keys='';
    foreach($arr as $key => $value)
       $keys = $keys .' ' .$key;

    return $keys;
}

function getValuesFromDictionary($dictionary)
{
    $values ='';
    foreach($arr as $key => $value)
       $values = $values .' ' .$value;

    return $values;
    
}


    ?>