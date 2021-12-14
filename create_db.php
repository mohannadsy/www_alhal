<?php
include('sql/connection.php');
?>

<?php
function showMessage($test)
{
    $success_msg = "تم انشاء قاعدة البيانات بنجاح";
    $error_msg = "لم يتم انشاء قاعدة البيانات. قم بتغيير اسم قاعدة البيانات";
    if ($test)
        echo "<script>alert('$success_msg')</script>";
    else
        echo "<script>alert('$error_msg')</script>";
}


// $file =  file_get_contents("C:\Users\ASUS\Desktop\souq.sql" ,false , null);
// $db_name = $_POST['db_name'];
$db_name = 'souq';
$db_query = "create database $db_name;";
$db_execute = mysqli_query($con, $db_query);
showMessage($db_execute);

?>