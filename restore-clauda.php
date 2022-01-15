<?php
    include('include/nav.php');
?>
<?php
// function restore_database($con , $sql_file_to_restore){
//     $file_name = $sql_file_to_restore;
//     $tmp_name = $_FILES['file']['tmp_name'];
//     $file_path_store = "restores/restore_" . $file_name;
//     $file_uploaded_extention = pathinfo($file_name, PATHINFO_EXTENSION);
//     if ($file_uploaded_extention === 'sql') {
//         move_uploaded_file($tmp_name, $file_path_store);
//         drop_all_tables($con);
//         import_database_tables($con , $file_name);
//         message_box('تم استعادة قاعدة البيانات بنجاح');
//     } else {
//         message_box('رجاءا اختار ملف sql');
//     }
// }
if (isset($_POST['upload'])) {
    restore_database($con , $_FILES['file']['name']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup...</title>
</head>
<body>
    <form action = "?" method = "POST" enctype="multipart/form-data">
       <p> <input type="file" name="file"/>  </p>
       <p> <input type="submit" name="upload" value="Add  File"/>  </p>


    </form>
</body>
</html>
