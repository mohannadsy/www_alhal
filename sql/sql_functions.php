<?php

function getSingleName($table)
{
    if($table.endswith('ies'))
    {
        return $table[0:(len($table)-3)] + "y";
    }
    return $table[0:(len($table)-1)];
}
    
function getStrFromList($lst)
{
    $result = '';
    for $l in $lst
        $result = $result + " " + $l + " ," ;
    $result = $result.rtrim(',');
    return $result;
}
    
function getKeysFromDictionary($dictionary)
{
    return ' ';
}

function getValuesFromDictionary($dictionary)
{
    return '';
}


    ?>