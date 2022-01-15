<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles/account_card.css">

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
            <div class="row">

                <div id="account_col" class="col-md-6">
                    <h4 class="mb-3 ">معلومات الحساب</h4>
                    <div class="row ">
                        <div class="col-12">
                            <label for="code" class="col-form-label" id="lbl_code">رمز الحساب</label>
                            <div class="col-md-10 ">
                                <input type="text" id="code" name="code" class="form-control" readonly value="<?php
                                                                                                                if (isset($account['code'])) echo $account['code'];
                                                                                                                else
                                                                                                                    echo get_auto_code($con, "accounts", "code", "", "parent", 'account_id', '0')  ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label" id="lbl_account"> الحساب</label>
                            <div class="input-group col-md-10 has-validation">
                                <input id="name" name="name" type="text" class="form-control" placeholder=" اسم الحساب" required value="<?php if (isset($account['name'])) echo $account['name'] ?>">
                                <div class="invalid-feedback">اسم الحساب الخاص بك مطلوب</div>
                            </div>

                        </div>
                        <div class="col-10 py-3">
                            <label for="account_id" class="form-label" id="lbl_main"> الحساب الرئيسي</label>

                            <select class="form-select" name="account_id" id="account_id" required>
                                <option value="0"> حساب رئيسي</option>
                                <?php
                                foreach (get_main_accounts($con) as $id => $value) {
                                    echo "<option value='$id'";
                                    if (isset($account['account_id']) && $id == $account['account_id']) echo ' selected ';
                                    if(isset($_GET['main_account']) && $_GET['main_account'] == $id) echo ' selected';
                                    echo ">$value</option>";
                                }
                                ?>
                            </select>


                        </div>
                    </div>
                    <h4 class="mb-3"> الرصيدالافتتاحي</h4>
                    <div class="row">
                        <div class="col-12">
                            <label for="maden" class="form-label" id="lbl_maden"> مدين</label>
                            <div class="input-group col-md-10">
                                <input type="number" name="maden" class="form-control" id="" value="<?php if (isset($account['maden']) && $account['maden'] > 0) echo $account['maden'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="daen" class="form-label" id="lbl_daen"> دائن</label>
                            <div class="input-group col-md-10">
                                <input type="number" name="daen" class="form-control" id="" value="<?php if (isset($account['daen']) && $account['daen'] < 0) echo  trim($account['daen'], '-') ?>">
                            </div>

                        </div>
                    </div>
                </div>

                <div id="connect_col" class="col-md-6 ">
                    <h4 class="mb-3">معلومات التواصل</h4>
                    <div class="row">
                        <div class="col-10">
                            <label for="" class="form-label">المحافظة </label>
                            <input type="text" class="form-control" name="state" id="" placeholder="" value="<?php if (isset($account['state'])) echo $account['state'] ?>">

                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">المدينة</label>
                            <input type="text" class="form-control" name="city" id="" placeholder="" value="<?php if (isset($account['city'])) echo $account['city'] ?>">

                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">مكان السكن</label>
                            <input type="text" class="form-control" name="location" id="" placeholder="" value="<?php if (isset($account['location'])) echo $account['location'] ?>">

                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">الهاتف</label>
                            <input type="text" class="form-control" id="" name="phone" placeholder="" value="<?php if (isset($account['phone'])) echo $account['phone'] ?>">


                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">ملاحظات </label>
                            <textarea rows="3" type="text" class="form-control" name="note"><?php if (isset($account['note'])) echo $account['note'] ?></textarea>

                        </div>
                    </div>


                </div>
            </div>





            <div class="row py-4">
                <div class="col-md-12" id="button_col">

                    <button type="submit" id="btn-grp" class="" <?php if (isset($account['name'])) echo "disabled" ?> name="add">إضافة</button>

                    <button type="submit" id="btn-grp" class="" <?php if (!isset($account['name'])) echo "disabled" ?> name="update">تعديل</button>

                    <button type="submit" id="btn-grp" class="" <?php if (!isset($account['name'])) echo "disabled" ?> name="delete">حذف</button>

                    <a href="ready.php"><button type="button" id="btn-grp" class="" name="close">إغلاق</button></a>
                </div>
            </div>

        </div>
    </form>
</body>

</html>

<?php



if (isset($_POST['add'])) {
    $accounts =  insert('accounts', get_array_from_array($_POST, [
        'name', 'account_id', 'phone', 'state', 'maden', 'daen',
        'city', 'location', 'note', 'code'
    ]));

    $accounts_exec = mysqli_query($con, $accounts);
    if ($_POST['maden'] != '' || $_POST['daen'] != '') {
        if ($_POST['maden'] == '') $_POST['maden'] = '0';
        if ($_POST['daen'] == '') $_POST['daen'] = '0';
        $_POST['code_number'] = $_POST['code'];
        $_POST['main_account_id'] = getId($con, 'accounts', 'code', $_POST['code']);
        $_POST['other_account_id'] = $_POST['main_account_id'];
        $_POST['code_type'] = 'accounts'; // accounts -> رصيد افتتاحي
        $_POST['date'] = date('Y-m-d');
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'daen', 'note', 'date', 'code_number', 'code_type'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
    }
    if ($accounts_exec) {
        if ($_POST['account_id'] != '0')
            set_local_storage('account_card_code_name', $_POST['code'] . " - " . $_POST['name']);
        open_window_self('account_card.php?message_create=success&main_account=' . $_POST['account_id']);
        close_window();
    }
}

if (isset($_POST['update'])) {
    $accounts =  updateWhereId('accounts', $_GET['id'], get_array_from_array($_POST, [
        'name', 'account_id', 'phone', 'state',
        'city', 'location', 'note', 'code', 'maden', 'daen'
    ]));

    $accounts_exec = mysqli_query($con, $accounts);
    if ($accounts_exec)
        open_window_self('account_card.php?id=' . $_GET['id'] . '&message_update=success');
}

?>


<?php
include('include/footer.php');
?>


<script>
    $(function() {
        $('#account_id').change(function() {
            var account_id = $(this).val();
            if (account_id != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        account_id: account_id
                    },
                    success: function(data) {
                        // $('#code').fadeIn(data);
                        $('#code').val(data);
                        // alert(data);
                    }
                });
            }
        });
    });
    $(document).ready(function() {
            var account_id = $('#account_id').val();
            if (account_id != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        account_id: account_id
                    },
                    success: function(data) {
                        // $('#code').fadeIn(data);
                        $('#code').val(data);
                        // alert(data);
                    }
                });
            }
        });
</script>