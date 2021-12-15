<?php
include('include/nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/open_file.css">
    <script src = "1.js"></script>
</head>
<body>
<form action="" method="post">
        <div class="center">
            <table name="table" border="1">
                <caption>حدد الملف الذي تريد فتحه ثم قم بالضغط على موافق</caption>
                <tr>
                    <th>اسم قاعدة البيانات</th>
                </tr>
            </table>
            <div>
                <h3>معلومات الملف</h3>
                <label name="file">الملف</label>
                <hr>
                <label name="database">قاعدة البيانات</label>
                <hr>
                <label name="server">المخدم</label>
                <hr>
            </div>
            <button type="submit" name="open" >فتح</button>
            <button type="button" name="new">جديد</button>
            <button type="button" name="close">إغلاق</button>
            <div id="new_text" hidden>
                <label for="" >اسم الملف</label>
                <input type="text"  name="file_name" required>
                <button type="button" name="add" id="add" onclick="test2()">إضافة</button>
                <div id = "initial_balance" hidden>
                     <label>الرصيد الافتتاحي</label>
                    <input type="text" name="initial_value">
                    <button type="submit" id="save" name="save">حفظ</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php
include('include/footer.php');
?>