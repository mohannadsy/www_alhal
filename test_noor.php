<?php
include('include/nav.php');
?>

<?php


$users = [
    "name" => "noor",
    "email" => "noor@gmail",
    "city" =>"lattakia",
    "account" =>"1",
    "phone" =>"099453"
] ;
$user = ['name' , 'phone' ];

function test($dic_value,$arr)
{
    $result_array=[];
    foreach ($arr as $key)
    {
        foreach ($dic_value as $_key=>$value)
        {

            if($key==$_key)
            array_push($result_array,[$_key =>$value]);
              
        }

    }
return $result_array;

}

$tables = ['users' , 'phones' , 'roles'];
$columns = ['id' , 'name' , 'phone'];




##############################Nour#
//echo select('users' , $columns);
//echo selectWithTable('items','categories');
// echo  insert('users',$users);
// echo update('users',$users);
// echo delete('users');
// echo delete('users') . where ('id', '2');
// echo selectWhereId('users','1');
// echo(addColumn('users','n','int'));
//echo(search('users','id','1'));
//echo updateWhereId('users','1',$users);
//print_r(test($users,$user));

?>

<br>
<a href="item_movment.php"> item_movment </a>
<br>
<a href="comission_movment.php"> comission_movment </a>
<br>
<a href="report_item.php"> report_item </a>
<br>
<a href="report_comission.php"> report_comission </a>
<br>
<a href="help_file.php"> help_file </a>
<br>
<a href="about.php"> about </a>

<?php
include('include/footer.php');
?>
