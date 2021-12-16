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
                <div class="md-4">
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات الحساب</legend>
                        <label for="account code">رمز الحساب</label>
                        <input name="account code" type="number">
                        <hr>
                        <label for="account name">الحساب</label>
                        <input type="text" name="account name">
                        <hr>
                        <label for="main account">الحساب الرئيسي</label>
                        <input type="text" name="main account">
                    </fieldset>
                    <fieldset class="border p-2">
                        <legend class="w-auto">الرصيد الافتتاحي</legend>
                        <label name="credit">له</label>
                        <input type="number" name="credit">
                        <hr>
                        <label name="debit">علينا</label>
                        <input type="number" name="debit">
                    </fieldset>
                    <button type="submit" name="add">إضافة</button>
                    <button type="submit" name="update">تعديل</button>
                    <button type="submit" name="delete">حذف</button>
                    <button type="button" name="close">إغلاق</button>
                </div>
                <div class="md-8">
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات التواصل </legend>
                        <label name="">المحافظة</label>
                        <input type="text" name="">
                        <hr> <label name="">المدينة</label>
                        <input type="text" name="city">
                        <hr> <label name="">مكان السكن</label>
                        <input type="text" name="location">
                        <hr> <label name="">الهاتف</label>
                        <input type="text" name="phone">
                    </fieldset>
                    <label name="">ملاحظات</label>
                    <textarea rows="3" type="text" name="notes"></textarea>
                    <hr>
                </div>

            </div>
        </div>
    </form>
</body>

</html>

<?php
include('include/footer.php');
?>