<?php
include('sql/connection.php');
include('helper/config_functions.php');
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
$db_name = 'souq1';
$db_query = "drop database $db_name;";
if ($db_name == "souq")
    echo "<script>alert('لا تستطيع حذف قاعدة البيانات الاساسية')</script>";
else {
    $db_execute = mysqli_query($con, $db_query);
    update_value_in_config('database' , 'souq');
    showMessage($db_execute);
}

?>