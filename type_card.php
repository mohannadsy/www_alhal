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
            
            <label for="">اسم الصنف</label>
            <input type="text" name="category_name" id="">
            <br><br>
            <label for="">رمز الصنف</label>
            <input type="text" name="category_code" id="">
            <br><br>
            <label for=""> ملاحظات</label>
            <input type="text" name="notes" id="">
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