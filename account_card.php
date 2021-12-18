<?php
include('include/nav.php');
?>

<!DOCTYPE html>
<html>
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
                    <br>
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات الحساب</legend>
                        <label for="code">رمز الحساب</label>
                        <input name="code" type="text" readonly 
                                value="<?php echo get_auto_code($con , "accounts" , "code" , get_value_from_config("prefix_code" , "account"))  ?>">
                        <br><br>
                        <label for="name">الحساب</label>
                        <input type="text" name="name">
                        <br><br>
                        <label for="main account">الحساب الرئيسي</label>
                        <input type="text" name="account_id">
                        <br><br>
                    </fieldset>
                    <fieldset class="border p-2">
                        <legend class="w-auto">الرصيد الافتتاحي</legend>
                        <label name="credit">له</label>
                        <input type="number" name="credit">
                        <br><br>
                        <label name="debit">علينا</label>
                        <input type="number" name="debit">
                    </fieldset>
                    <button type="submit" name="add">إضافة</button>
                    <button type="submit" hidden name="update">تعديل</button>
                    <button type="submit" hidden name="delete">حذف</button>
                    <button type="button" name="close">إغلاق</button>
                </div>
                <div class="md-8">
                    <br>
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات التواصل </legend>
                        <label name="">المحافظة</label>
                        <input type="text" name="state">
                        <br><br> <label name="">المدينة</label>
                        <input type="text" name="city">
                        <br><br> <label name="">مكان السكن</label>
                        <input type="text" name="location">
                        <br><br> <label name="">الهاتف</label>
                        <input type="text" name="phone">
                        <br><br>
                    </fieldset>
                    <label name="">ملاحظات</label>
                    <textarea rows="3" type="text" name="note"></textarea>
                    <hr>
                </div>

            </div>
        </div>
    </form>
</body>

</html>

<?php
echo insert('clients' , get_array_from_array($_POST , ['name','account_id'])) . '<br>';
echo insert('addresses' , get_array_from_array($_POST , ['state','city' , 'location'])) . '<br>';
echo insert('accounts' , get_array_from_array($_POST , ['code','dept'])) . '<br>';
?>


<?php
include('include/footer.php');
?>