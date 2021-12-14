<?php
include('sql/connection.php');
include('helper/config_functions.php');
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
function importDatabaseTables($con , $filePath){
    // Connect & select the database
 
    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$con->query($templine)){
                $error .= 'Error importing query "<b>' . $templine . '</b>": ' . $con->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}
/*
if(isset($_POST['create_db'])){}
*/
// $file =  file_get_contents("C:\Users\ASUS\Desktop\souq.sql" ,false , null);
// $db_name = $_POST['db_name'];
$db_name = 'souq1';
$sql_path = get_value_from_config('sql_path');
$db_query = "create database $db_name;";
$db_execute = mysqli_query($con, $db_query);
showMessage($db_execute);
update_value_in_config('database' , $db_name);
$con = mysqli_connect($host,$user,$pass,$db_name) or die('Connection Failed');
importDatabaseTables($con , $sql_path);

?>