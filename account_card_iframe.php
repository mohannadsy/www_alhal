<?php
    include('include/css.php'); 
    @include('sql/connection.php');
    include('sql/sql_queries.php');
    include('helper/config_functions.php');
    include('helper/operation_functions.php');
    include('helper/database_functions.php');
    include('helper/javascript_functions.php');
    include('helper/ready_queries_functions.php');
    include('helper/notification_functions.php');
    include('helper/html_functions.php');
    include('helper/links.php');
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

<?php
$select_last_next_account_query = selectND('accounts') .  ' order by id desc limit 1 ';
$select_last_next_account_exec = mysqli_query($con, $select_last_next_account_query);
$last_next_code = mysqli_fetch_array($select_last_next_account_exec)['code'];

$select_last_previous_account_query = selectND('accounts') . andWhereLarger('id', '3')  . ' limit 1 ';
$select_last_previous_account_exec = mysqli_query($con, $select_last_previous_account_query);
$last_previous_code = mysqli_fetch_array($select_last_previous_account_exec)['code'];

$current_account_code = get_auto_code($con, 'accounts', 'code', '', 'parent');
if (
    isset($_GET['id']) &&
    !isset($_POST['next']) &&
    !isset($_POST['last_next']) &&
    !isset($_POST['previous']) &&
    !isset($_POST['last_previous']) &&
    !isset($_POST['current']) && !isset($_POST['add']) && !isset($_POST['code'])
) {
    $current_account_code = get_value_from_table_using_id($con, 'accounts', 'code', $_GET['id']);
    // $current_account_code = $_GET['code'];
    $current_account_id_to_update_delete = $_GET['id'];
    $_POST['code'] = $current_account_code;
    $_POST['current'] = $current_account_code;
}
$next_account_code = $current_account_code;
if (isset($_POST['code']))
    $current_account_code = $_POST['code'];
$previous_account_code = 1;

// $accounts = [];
// $account_select = selectND('accounts');
// $account_exec = mysqli_query($con, $account_select);
// $account_rows = mysqli_num_rows($account_exec);
// if ($account_rows > 0)
//     while ($account_ = mysqli_fetch_array($account_exec)) {
//         $accounts[] = $account_;
//     }
// for ($i = 0; $i < count($accounts); $i++) {
//     if ($accounts[$i]['code'] == $current_account_code) {
//         // if (($i + 1) != count($accounts)){
//             @$next_account_code = $accounts[$i + 1]['code'];
//         // }
//         @$previous_account_code = $accounts[$i - 1]['code'];
//     }
// }
// if ($previous_account_code == 1) {
//     $previous_account_code = $accounts[count($accounts) - 1]['code'];
// }
$account = [];
$current_account_id_to_update_delete = getId($con, 'accounts', 'code', $current_account_code);
// if ($current_account_code < $next_account_code) {
$next_account_code_query = selectND('accounts') . andWhereLarger('id', $current_account_id_to_update_delete) . andWhereLarger('id', '3');
$next_account_code_exec = mysqli_query($con, $next_account_code_query);
@$next_account_code = mysqli_fetch_array($next_account_code_exec)['code'];
if ($next_account_code == null || $next_account_code == '')
    $next_account_code = get_auto_code($con, 'accounts', 'code', '', 'parent');
// }
// if ($current_account_code > $previous_account_code) {
if ($current_account_id_to_update_delete == null) {
    $current_account_id_to_update_delete = getId($con, 'accounts', 'code', $last_next_code);
    $previous_account_code = get_code_from_table_using_id($con, 'accounts', $current_account_id_to_update_delete);
} else {
    $previous_account_code_query = selectND('accounts') . andWhereSmaller('id', $current_account_id_to_update_delete) . andWhereLarger('id', '3')  . ' order by id desc';
    $previous_account_code_exec = mysqli_query($con, $previous_account_code_query);
    $previous_account_code = mysqli_fetch_array($previous_account_code_exec)['code'];
}
// }
if (isset($_POST['next'])) {
    $account_select = selectND('accounts') . andWhere('code', $next_account_code);
    $account_exec = mysqli_query($con, $account_select);
    $account_rows = mysqli_num_rows($account_exec);
    while ($account_ = mysqli_fetch_array($account_exec)) {
        $account[] = $account_;
    }
    $current_account_id_to_update_delete = getId($con, 'accounts', 'code', $next_account_code);
    delete_notifications();
}
if (isset($_POST['last_next'])) {
    $account_select = selectND('accounts') . andWhere('code', $last_next_code);
    $account_exec = mysqli_query($con, $account_select);
    $account_rows = mysqli_num_rows($account_exec);
    while ($account_ = mysqli_fetch_array($account_exec)) {
        $account[] = $account_;
    }
    $current_account_id_to_update_delete = getId($con, 'accounts', 'code', $last_next_code);
    delete_notifications();
}
if (isset($_POST['previous'])) {
    $account_select = selectND('accounts') . andWhere('code', $previous_account_code);
    $account_exec = mysqli_query($con, $account_select);
    $account_rows = mysqli_num_rows($account_exec);
    while ($account_ = mysqli_fetch_array($account_exec)) {
        $account[] = $account_;
    }
    $current_account_id_to_update_delete = getId($con, 'accounts', 'code', $previous_account_code);
    delete_notifications();
}

if (isset($_POST['last_previous'])) {
    $account_select = selectND('accounts') . andWhere('code', $last_previous_code);
    $account_exec = mysqli_query($con, $account_select);
    $account_rows = mysqli_num_rows($account_exec);
    while ($account_ = mysqli_fetch_array($account_exec)) {
        $account[] = $account_;
    }
    $current_account_id_to_update_delete = getId($con, 'accounts', 'code', $last_previous_code);
    delete_notifications();
}
$prefix = '';
if (isset($_POST['current']) || isset($_POST['update'])) {
    $account_select = selectND('accounts') . andWhere('code', $_POST['code']);
    $account_exec = mysqli_query($con, $account_select);
    $account_rows = mysqli_num_rows($account_exec);
    if ($account_rows > 0)
        while ($account_ = mysqli_fetch_array($account_exec)) {
            $account[] = $account_;
        }
    else {
        $select_code_using_account_id_query = "select id,code from accounts where id = '" . $_POST['account_id'] . "'";
        $select_code_using_account_id_exec = mysqli_query($con, $select_code_using_account_id_query);
        if ($row = mysqli_fetch_array($select_code_using_account_id_exec))
            $prefix = $row['code'];
        $_POST['code'] = get_auto_code($con, 'accounts', 'code', $prefix, 'child', 'account_id', $_POST['account_id']);
        $current_account_id_to_update_delete = getId($con, 'accounts', 'code', $_POST['code']);
    }
}


// message_box("current = $current_account_code , next = $next_account_code , previous = $previous_account_code , last_previous = $last_previous_code , last_next = $last_next_code");

?>

<body>
    <form action="" method="post">
        <div class="container" id="container">
            <div class="row py-2">
                <div class="col-8">
                    <h3 style=" margin-right:16px">بطاقة حساب</h3>
                </div>

               

            </div>
            <div class="row">

                <div id="account_col" class="col-md-6">
                    <h5 class=" " style=" margin-right:16px">معلومات الحساب</h5>
                    <div class="row ">
                        <div class="col-12">
                            <label for="code" class="col-form-label" id="lbl_code">رمز الحساب</label>
                            <div class="col-md-10 ">
                                <input readonly value="<?php
                                                        if (isset($_POST['next'])) echo $next_account_code;
                                                        elseif (isset($_POST['last_next'])) echo $last_next_code;
                                                        elseif (isset($_POST['previous'])) echo $previous_account_code;
                                                        elseif (isset($_POST['last_previous'])) echo $last_previous_code;
                                                        elseif (isset($_POST['current']) || isset($_POST['update'])) echo $_POST['code'];
                                                        else echo get_auto_code($con, 'accounts', 'code', '', 'parent'); ?>" type=" text" id="code" class="form-control" name="code">


                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label" id="lbl_account"> الحساب</label>
                            <div class="input-group col-md-10 has-validation">
                                <input id="name" name="name" type="text" class="form-control" placeholder=" اسم الحساب" value="<?php if (notempty($account)) echo $account[0]['name'] ?>">
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
                                    if (empty($account) && get_main_account_id_parent($con, $last_next_code) == $id) echo ' selected';
                                    if (isset($_GET['main_account']) && $_GET['main_account'] == $id) echo ' selected';
                                    if (notempty($account) && $id == $account[0]['account_id']) echo ' selected ';
                                    echo ">$value</option>";
                                }

                                ?>
                            </select>


                        </div>
                    </div>
                    <h5 class="" style=" margin-right:16px"> الرصيد الافتتاحي</h5>
                    <div class="row">
                        <div class="col-12">
                            <label for="maden" class="form-label" id="lbl_maden"> مدين</label>
                            <div class="input-group col-md-10">
                                <input type="number" name="maden" class="form-control" id="" value="<?php if (notempty($account)) echo $account[0]['maden'] ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="daen" class="form-label" id="lbl_daen"> دائن</label>
                            <div class="input-group col-md-10">
                                <input type="number" name="daen" class="form-control" id="" value="<?php if (notempty($account)) echo $account[0]['daen'] ?>">
                            </div>

                        </div>
                    </div>
                </div>

                <div id="connect_col" class="col-md-6 ">
                    <h5 class="">معلومات التواصل</h5>
                    <div class="row">
                        <div class="col-10">
                            <label for="" class="form-label">المحافظة </label>
                            <input type="text" class="form-control" name="state" id="" placeholder="" value="<?php if (notempty($account)) echo $account[0]['state'] ?>">

                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">المدينة</label>
                            <input type="text" class="form-control" name="city" id="" placeholder="" value="<?php if (notempty($account)) echo $account[0]['city'] ?>">

                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">مكان السكن</label>
                            <input type="text" class="form-control" name="location" id="" placeholder="" value="<?php if (notempty($account)) echo $account[0]['location'] ?>">

                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">الهاتف</label>
                            <input type="text" class="form-control" id="" name="phone" placeholder="" value="<?php if (notempty($account)) echo $account[0]['phone'] ?>">


                        </div>
                        <div class="col-10">
                            <label for="" class="form-label">ملاحظات </label>
                            <textarea rows="3" type="text" class="form-control" name="note"><?php if (notempty($account)) echo $account[0]['note'] ?></textarea>

                        </div>
                    </div>


                </div>
            </div>





            <div class="row justify-content-center py-3">
                <div class="col-md-8" id="button_col">

                    <button type="submit" id="btn-grp" class="btn btn-light" <?php if (notempty($account)) echo "disabled" ?> name="add">إضافة</button>
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
        // open_window_self('account_card.php?message_create=success');
        message_box('تم إنشاء الحساب بنجاح');
        open_window_self('account_card_iframe.php');
        // echo "<script>window.html.style('display:none')</script>";
        close_window();
    }
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
        if (account_id != '' && account_id != '0') {
            $.ajax({
                url: "search.php",
                method: "POST",
                data: {
                    account_id: account_id
                },
                success: function(data) {
                    // $('#code').fadeIn(data);
                    if ($('#code').val() == '') {
                        $('#code').val(data);
                        $('#next').prop('disabled', 'true');
                    }

                    // alert(data);
                }
            });
        }
    });
</script>
<script>
    document.getElementById('code').onkeyup = function(event) {
        if (event.keyCode == 13) {
            document.getElementById('current').click();
        }
    };
</script>