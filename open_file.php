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
            <div class="col-12" id="table">
                    <table name="table" class="table" >
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
            <br>
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
            <div class="row py-2 mb-3" id="new_text" hidden  style=" padding-right: 30px;">
                    <label for="" class="mt-2">اسم الملف</label>
                    <div class="col-4">
                    <input type="text" class="form-control" name="database_name">

                    </div>
                    
                    <button type="submit" name="create_db" class="btn btn-light" id="add" onclick="test2()">إضافة</button>
            </div>
            <div class="row text-center ">
                <div class="col-12 ">
                    <button type="submit" name="open_db" class="btn btn-light" id="btn-grp">فتح</button>
                    <button type="button" name="new_db" class="btn btn-light" id="new" onclick="test1()">جديد</button>
                    <button type="submit" name="delete_db" class="btn btn-light" id="btn-grp">حذف</button>
                    <a href="index.php"><button type="button" id="btn-grp" class="btn btn-light" name="close">إغلاق</button></a>
                    <button type="button" name="restore" class="btn btn-light"  id="btn-grp" hidden>استرجاع</button>
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
        message_box("لقد دخلت الى قاعدة البيانات الافتراضية");
        update_value_in_config('database', $selected_database);
        open_window_self(INDEX);
    }
    else{
        message_box(" لقد دخلت الى قاعدة البيانات " . $selected_database);
        update_value_in_config('database', 'souq_'.$selected_database);
        open_window_self(INDEX);
    }
}

if (isset($_POST['create_db'])) {
    $database_name = $_POST['database_name'];
    if (is_not_empty($database_name)) {
        create_database($con , 'souq_'. str_replace(' ' , '_' , $database_name));
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
        open_window_self_after_confirm('هل انت متأكد انك تريد حذف قاعدة البانات! لايمكنك التراجع عن هذه الخطوة!' , "open_file.php?delete_database=souq_$selected_database");
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


<script>
    f1("help_file.php?file_section");
</script>
