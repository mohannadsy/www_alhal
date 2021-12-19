<?php
include('include/nav.php');
?>

<!DOCTYPE html>
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
        <div class="container">
            <div class="row">
            <div class="col-md-6" >
            <div class="row">
                <div class="col-md-6" >
                 <label for="code">رمز المادة<label>
                 <input type="number" name="code"></div>
                 <div class="col-md-6" >
                 <label for="name">المادة</label>
                 <input type="text" name="name"></div>
                 <label for="unit">وحدة القياس</label>
                 <input type="text" name="unit"></div>
            </div>
            <div class="row">
            <div class="col-md-6" >
                   <label for="category">الصنف</label>
                   <input type="text" name="category"></div>
                   <div class="col-md-6" >
                   <label for="note">ملاحظات</label>
                    <textarea type="text" name="note"></textarea></div>
            </div>
            <div class="row py-5">            
                    <button type="submit" name="view items">استعراض المواد</button>
                    <button type="submit" name="add">إضافة</button>
                    <button type="submit" name="update">تعديل</button>
                    <button type="submit" name="delete">حذف</button>
                    <button type="button" name="close">إغلاق</button>
            </div>
</div>
<div class="col-md-6" ></div>
       </div>
        </div>
    </form>

</body>

</html>

<?php
include('include/footer.php');
?>