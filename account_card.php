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

            <!-- Messages Section -->
            <?php
            success_error_create_message('تم انشاء الحساب بنجاح' , 'عئرا لم يتم انشاء الحساب بنجاح');
            success_error_update_message('تم تعديل الحساب بنجاح' , 'عئرا لم يتم تعديل الحساب بنجاح');

            $account = [];
            if (isset($_GET['id'])) {
                $select_where_id = selectWhereId('accounts', $_GET['id']);
                $select_where_exec = mysqli_query($con, $select_where_id);
                $account = mysqli_fetch_array($select_where_exec);
            }
            ?>


            <div class="row">
                <div class="md-4">

                    <br>
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات الحساب</legend>

                        <label for="code">رمز الحساب</label>
                        <input name="code" type="text" readonly value="<?php
                                                                        if (isset($account['code'])) echo $account['code'];
                                                                        else
                                                                            echo get_auto_code($con, "accounts", "code", get_value_from_config("prefix_code", "account"))  ?>">

                        <br><br>

                        <label for="name">الحساب</label>
                        <input type="text" name="name" value="<?php if (isset($account['name'])) echo $account['name'] ?>">

                        <br><br>

                        <label for="main account">الحساب الرئيسي</label>
                        <!-- <input type="text" name="account_id"> -->

                        <select name="account_id" id="">
                            <option value="0">حساب رئيسي جديد</option>
                            <?php
                            foreach (get_main_accounts($con) as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                            }
                            ?>
                        </select>

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

                    <button type="submit" <?php if (!isset($account['name'])) echo "hidden" ?> name="update">تعديل</button>

                    <button type="submit" hidden name="delete">حذف</button>

                    <button type="button" name="close">إغلاق</button>

                </div>
                <div class="md-8">
                    <br>
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات التواصل </legend>
                        <label name="">المحافظة</label>
                        <input type="text" name="state">

                        <br><br>

                        <label name="">المدينة</label>
                        <input type="text" name="city">

                        <br><br>

                        <label name="">مكان السكن</label>
                        <input type="text" name="location">

                        <br><br>

                        <label name="">الهاتف</label>
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



if (isset($_POST['add'])) {
    $_POST['fund'] = 0;
    if ($_POST['credit'] == '')
        $_POST['fund'] = '-' . $_POST['debit'];
    else
        $_POST['fund'] = $_POST['credit'];
    $accounts =  insert('accounts', get_array_from_array($_POST, [
        'name', 'account_id', 'phone', 'state',
        'city', 'location', 'note', 'code', 'fund'
    ]));

    $accounts_exec = mysqli_query($con, $accounts);
    if ($accounts_exec)
        open_window_self('account_card.php?message_create=success');
}

if (isset($_POST['update'])) {
    $_POST['fund'] = 0;
    if ($_POST['credit'] == '')
        $_POST['fund'] = '-' . $_POST['debit'];
    else
        $_POST['fund'] = $_POST['credit'];
    $accounts =  updateWhereId('accounts', $_GET['id'], get_array_from_array($_POST, [
        'name', 'account_id', 'phone', 'state',
        'city', 'location', 'note', 'code', 'fund'
    ]));

    $accounts_exec = mysqli_query($con, $accounts);
    if ($accounts_exec)
        open_window_self('account_card.php?id=' . $_GET['id'] . '&message_update=success');
}



?>


<?php
include('include/footer.php');
?>