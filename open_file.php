<?php
include('include/nav.php');
include('helper/javascript_functions.php');
include('helper/database_functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/styles/open_file.css"> -->
</head>

<body>
    <form action="" method="post">
        <div class="center">
            <table name="table" class="table border">
                <tr>
                    <th>اسم قاعدة البيانات</th>
                </tr>
                <!-- Start Code Section -->
                <?php
                $select_db_query = "show databases like 'souq%';";
                $select_db_execute = mysqli_query($con, $select_db_query);
                while ($row = mysqli_fetch_row($select_db_execute)) {
                    echo "<tr><td>" . $row[0] . "</td></tr>";
                }
                ?>
                <!-- End Code Section -->

            </table>
            <input type="hidden" name="selected_database" value="souq">
            <div>
                <h3>معلومات الملف</h3>
                <label name="file">الملف</label>
                <hr>
                <label name="database">قاعدة البيانات</label>
                <hr>
                <label name="server">المخدم</label>
                <hr>
            </div>
            <button type="submit" name="open_db">فتح</button>
            <button type="button" name="new_db" id="new" onclick="test1()">جديد</button>
            <button type="button" name="close">إغلاق</button>
            <div id="new_text" hidden>
                <label for="">اسم الملف</label>
                <input type="text" name="database_name">
                <button type="submit" name="create_db" id="add" onclick="test2()">إضافة</button>
            </div>
        </div>
    </form>

    <script src="js/scripts/open_file.js"></script>
</body>

</html>



<?php
echo print_r($_POST);
if (isset($_POST['open_db']) && isset($_POST['selected_database'])) {
    $selected_database = $_POST['selected_database'];
    if ($selected_database == 'souq')
        message_box("لقد دخلت على قاعدة البيانات الافتراضية");
    update_value_in_config('database', $selected_database);
}

if (isset($_POST['create_db'])) {
    $database_name = $_POST['database_name'];
    if (trim($database_name != '')) {
        create_database($con , $database_name);
    }
}

?>

<?php
include('include/footer.php');
?>