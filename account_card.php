<?php
include('include/nav.php');
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

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
            success_error_create_message('تم انشاء الحساب بنجاح', 'عئرا لم يتم انشاء الحساب بنجاح');
            success_error_update_message('تم تعديل الحساب بنجاح', 'عئرا لم يتم تعديل الحساب بنجاح');

            $account = [];
            if (isset($_GET['id'])) {
                $select_where_id = selectWhereId('accounts', $_GET['id']);
                $select_where_exec = mysqli_query($con, $select_where_id);
                $account = mysqli_fetch_array($select_where_exec);
            }
            ?>


            <div class="row g-3">
                <div class="col-md-6 col-lg-4">

                    <br>
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات الحساب</legend>

                        <label for="code">رمز الحساب</label>
                        <input id="code" name="code" type="text" readonly value="<?php
                                                                        if (isset($account['code'])) echo $account['code'];
                                                                        else
                                                                            echo get_auto_code($con, "accounts", "code", "" , "parent" ,'account_id', '0')  ?>">

                        <br><br><br>

                        <label for="name">الحساب</label>
                        <input type="text" name="name" value="<?php if (isset($account['name'])) echo $account['name'] ?>">

                        <br><br>

                        <label for="main account">الحساب الرئيسي</label>
                        <!-- <input type="text" name="account_id"> -->

                        <select name="account_id" id="account_id">
                            <option value="0">حساب رئيسي</option>
                            <?php
                            foreach (get_main_accounts($con) as $id => $value) {
                                echo "<option value='$id'";
                                if (isset($account['account_id']) && $id == $account['account_id']) echo ' selected ';
                                echo ">$value</option>";
                            }
                            ?>
                        </select>

                        <br><br>

                    </fieldset>


                    <fieldset class="border p-2">
                        <legend class="w-auto">الرصيد الافتتاحي</legend>

                        <label name="credit">له</label>
                        <input type="number" name="credit"
                        value="<?php if(isset($account['fund']) && $account['fund'] > 0) echo $account['fund'] ?>">

                        <br><br>

                        <label name="debit">علينا</label>
                        <input type="number" name="debit"
                        value="<?php if(isset($account['fund']) && $account['fund'] < 0) echo  trim($account['fund'] , '-') ?>">

                    </fieldset>

                    <button type="submit" class="btn btn-primary" name="add">إضافة</button>

                    <button type="submit" class="btn btn-primary" <?php if (!isset($account['name'])) echo "hidden" ?> name="update">تعديل</button>

                    <button type="submit" class="btn btn-primary" hidden name="delete">حذف</button>

                    <button type="button" class="btn btn-primary" name="close">إغلاق</button>

                </div>
                <div class="md-8">
                    <br>
                    <fieldset class="border p-2">
                        <legend class="w-auto">معلومات التواصل </legend>
                        <label name="">المحافظة</label>
                        <input type="text" name="state" 
                        value="<?php if(isset($account['state'])) echo $account['state'] ?>">

                        <br><br>

                        <label name="">المدينة</label>
                        <input type="text" name="city"
                        value="<?php if(isset($account['city'])) echo $account['city'] ?>">

                        <br><br>

                        <label name="">مكان السكن</label>
                        <input type="text" name="location"
                        value="<?php if(isset($account['location'])) echo $account['location'] ?>">

                        <br><br>

                        <label name="">الهاتف</label>
                        <input type="text" name="phone"
                        value="<?php if(isset($account['phone'])) echo $account['phone'] ?>">

                        <br><br>

                    </fieldset>

                    <label name="">ملاحظات</label>
                    <textarea rows="3" type="text" name="note"><?php if(isset($account['note'])) echo $account['note'] ?></textarea>
                    <hr>
                </div>

            </div>
        </div>
    </form>
</body>

</html>

<?php



if (isset($_POST['add'])) {
    $credit = 0;
    $debit = 0;
    if ($_POST['credit'] != '')
        $credit = $_POST['credit'];
    if($_POST['debit'] != '')
        $debit = $_POST['debit'];
    $_POST['fund'] = $credit-$debit;
    $accounts =  insert('accounts', get_array_from_array($_POST, [
        'name', 'account_id', 'phone', 'state',
        'city', 'location', 'note', 'code', 'fund'
    ]));

    $accounts_exec = mysqli_query($con, $accounts);
    if ($accounts_exec)
        open_window_self('account_card.php?message_create=success');
}

if (isset($_POST['update'])) {
    $credit = 0;
    $debit = 0;
    if ($_POST['credit'] != '')
        $credit = $_POST['credit'];
    if($_POST['debit'] != '')
        $debit = $_POST['debit'];
    $_POST['fund'] = $credit-$debit;
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

<!-- 
<script>
    function change_code(){
        var account_id = document.getElementById('account_id').value;
        document.getElementById('code').value = account_id +  "<?php // get_auto_code($con , 'accounts' , 'code' ,'' , 'child' ,  '4') ?>";
    }
</script> -->


<script>
    $(function(){
        $('#account_id').change(function(){
            var account_id = $(this).val();
            if(account_id != ''){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{account_id : account_id},
                    success:function(data){
                        // $('#code').fadeIn(data);
                        $('#code').val(data);
                        // alert(data);
                    }
                });
            }
        });
    });
</script>