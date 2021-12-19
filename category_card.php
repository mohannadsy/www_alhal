<?php
include('include/nav.php');
?>
<html dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>

        <form action="" method="post"> 
            
            <label for="name">اسم الصنف</label>
            <input type="text" name="name" id="">
            <br><br>
            <label for="code">رمز الصنف</label>
            <input type="text" name="code" id="">
            <br><br>
            <label for="note"> ملاحظات</label>
            <input type="text" name="note" id="">
            <br><br>
            <div>
                <button type="submit" name="add">إضافة</button>
                <button type="submit" name="update">تعديل</button>
                <button type="submit" name="delete">حذف</button>
                <button type="button" name="close">إغلاق</button>
            </div>


        </form>
        
    </body>
</html>
<?php
include('include/footer.php');
?>