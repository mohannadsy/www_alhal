<?php
include('include/nav.php');
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles/open_file.css">
    <style>

       
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container" >
            <div class="col-12">
                    <table name="table" class="table border table-hover" id="table">
                        <thead class="text-center">
                            <tr>
                                <th style="font-size: 23px;">اسم قاعدة البيانات</th>
                            </tr>
                        </thead>
                        <!-- Start Code Section -->
                        <?php
                        $select_db_query = "show databases like 'souq%';";
                        $select_db_execute = mysqli_query($con, $select_db_query);
                        while ($row = mysqli_fetch_row($select_db_execute)) {
                            echo "<tr>
                                    <td 
                                        id = '".$row[0]."' 
                                        onclick='get_selected_database(\"".$row[0]."\")'>" . str_replace('souq_' , '' , $row[0])  . "  
                                    </td>
                                </tr>";
                        }
                        ?>
                        <!-- End Code Section -->

                    </table>
            </div>
            <input type="hidden" name="selected_database" value="" id="selected_database"> 
            <!-- <div>
                <h3>معلومات الملف</h3>
                <label name="file">الملف</label>
                <hr>
                <label name="database">قاعدة البيانات</label>
                <hr>
                <label name="server">المخدم</label>
                <hr>
            </div> -->
            <div class="row py-2" id="new_text" hidden >
                <div class="col-8" style=" padding-right: 30px;">
                    <label for="">اسم الملف</label>
                    <input type="text" name="database_name">
                    <button type="submit" name="create_db" id="add" onclick="test2()">إضافة</button>
                </div>
            </div>
            <div class="row text-center ">
                <div class="col-12 ">
                    <button type="submit" name="open_db" id="btn-grp">فتح</button>
                    <button type="button" name="new_db" id="new" onclick="test1()">جديد</button>
                    <button type="submit" name="delete_db" id="btn-grp">حذف</button>
                    <button type="button" name="restore" id="btn-grp" hidden>استرجاع</button>
                </div>
            </div>
            
        </div>
    </form>

    <script src="js/scripts/open_file.js"></script>
</body>
</html>



<?php

if (isset($_POST['open_db']) && isset($_POST['selected_database'])) {
    $selected_database = trim($_POST['selected_database']);
    if(is_empty($selected_database))
        message_box('رجاءا حدد قاعدة بيانات');
    
    elseif ($selected_database == get_value_from_config('deafult_database')){
        message_box("لقد دخلت على قاعدة البيانات الافتراضية");
        update_value_in_config('database', $selected_database);
        open_window_self(INDEX);
    }
    else{
        message_box(" لقد دخلت على قاعدة البيانات " . $selected_database);
        update_value_in_config('database', $selected_database);
        open_window_self(INDEX);
    }
}

if (isset($_POST['create_db'])) {
    $database_name = $_POST['database_name'];
    if (is_not_empty($database_name)) {
        create_database($con , 'souq_'.$database_name);
        open_window_self('open_file.php');
    }
}

if(isset($_POST['delete_db'])){
    $selected_database = trim($_POST['selected_database']);
    if(is_empty($selected_database))
        message_box('رجاءا حدد قاعدة بيانات');
    elseif ($selected_database == get_value_from_config('deafult_database'))
        message_box("لا يمكنك حذف قاعدة البيانات الرئيسية");
    else{
        open_window_self_after_confirm('هل انت متأكد انك تريد حذف قاعدة البانات! لايمكنك التراجع عن هذه الخطوة!' , "open_file.php?delete_database=$selected_database");
    }
}
if(isset($_GET['delete_database'])){
    $selected_database = $_GET['delete_database'];
    drop_database($con , $selected_database);
    update_value_in_config('database', get_value_from_config('deafult_database'));
    open_window_self("open_file.php");
}

?>

<?php
include('include/footer.php');
?>