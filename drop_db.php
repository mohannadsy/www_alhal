<?php
include('sql/connection.php');
?>

<?php
function showMessage($test)
{
    $success_msg = "تم حذف قاعدة البيانات بنجاح";
    $error_msg = "لم يتم حذف قاعدة البيانات";
    if ($test)
        echo "<script>alert('$success_msg')</script>";
    else
        echo "<script>alert('$error_msg')</script>";
}
// $db_name = $_POST['db_name'];
$db_name = 'souq2';
$db_query = "drop database $db_name;";
$db_execute = mysqli_query($con, $db_query);
showMessage($db_execute);

?>