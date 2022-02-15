<?php
    // include('include/nav.php');
    include('sql/connection.php');
    include('helper/database_functions.php');
    include('helper/javascript_functions.php');
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

<body>
     <div class="container" id="container">
        <form action = "?" method = "POST" enctype="multipart/form-data">
            
            <p>
                <button type="button" style="width: 110px;border-radius: 2px; font-size:17;cursor:pointer;" class="btn btn-secondary" onclick="document.getElementById('file').click()">قم باختيار الملف</button>
                <input type="file"  name="file" id="file" style="display:none" /> 
            </p>
            <p> 
                <input type="submit" class="btn btn-secondary" id="upload" name="upload"  value="موافق" style=" width: 110px;cursor:pointer;border-radius: 2px; font-size:17;"/>  
            </p>
        </form>
    </div>
</body>





