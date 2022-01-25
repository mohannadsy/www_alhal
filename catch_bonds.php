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
    <link rel="stylesheet" href="css/styles/catch_bonds.css">
    <style>
       
    </style>
</head>

<button hidden id="modal_account_card_button" class="login-trigger" href="#" data-target="#modal_account_card" data-toggle="modal">Account Card</button>
<div id="modal_account_card" class="modal fade" role="dialog">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title col-11">بطاقة حساب</h4>
                <button onclick="" type="button" data-dismiss="modal" class="close" aria-label="Close" style=" margin-right: 10px;">
                    <span aria-hidden="true" >&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <iframe id="iframe_account_card" src="account_card.php#form" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>


<?php
$select_last_next_catch_bonds_query = selectND('catch_bonds') . ' order by code desc limit 1 ';
$select_last_next_catch_bonds_exec = mysqli_query($con, $select_last_next_catch_bonds_query);
$last_next_code = mysqli_fetch_array($select_last_next_catch_bonds_exec)['code'];

$select_last_previous_catch_bonds_query = selectND('catch_bonds') . ' limit 1 ';
$select_last_previous_catch_bonds_exec = mysqli_query($con, $select_last_previous_catch_bonds_query);
$last_previous_code = mysqli_fetch_array($select_last_previous_catch_bonds_exec)['code'];

$current_catch_code = get_auto_code($con, 'catch_bonds', 'code', '', 'parent');
if (
    isset($_GET['id']) &&
    !isset($_POST['next']) &&
    !isset($_POST['last_next']) &&
    !isset($_POST['previous']) &&
    !isset($_POST['last_previous']) &&
    !isset($_POST['current'])
) {
    $current_catch_code = get_value_from_table_using_id($con, 'catch_bonds', 'code', $_GET['id']);
    $_POST['code'] = $current_catch_code;
    $_POST['current'] = $current_catch_code;
}
$next_catch_code = $current_catch_code;

if (isset($_POST['code']))
    $current_catch_code = $_POST['code'];

$previous_catch_code = 1;
if ($current_catch_code < $next_catch_code) {
    $next_catch_code_query = selectND('catch_bonds') . andWhereLarger('code', $current_catch_code);
    $next_catch_code_exec = mysqli_query($con, $next_catch_code_query);
    $next_catch_code = mysqli_fetch_array($next_catch_code_exec)['code'];
}
if ($current_catch_code > $previous_catch_code) {
    $previous_catch_code_query = selectND('catch_bonds') . andWhereSmaller('code', $current_catch_code) . ' order by code desc';
    $previous_catch_code_exec = mysqli_query($con, $previous_catch_code_query);
    $previous_catch_code = mysqli_fetch_array($previous_catch_code_exec)['code'];
}
$catch_bonds = [];
if (isset($_POST['next'])) {
    $catch_bond_select = selectND('catch_bonds') . andWhere('code', $next_catch_code);
    $catch_bond_exec = mysqli_query($con, $catch_bond_select);
    $catch_bond_rows = mysqli_num_rows($catch_bond_exec);
    while ($catch_bond = mysqli_fetch_array($catch_bond_exec)) {
        $catch_bonds[] = $catch_bond;
    }
}
if (isset($_POST['last_next'])) {
    $catch_bond_select = selectND('catch_bonds') . andWhere('code', $last_next_code);
    $catch_bond_exec = mysqli_query($con, $catch_bond_select);
    $catch_bond_rows = mysqli_num_rows($catch_bond_exec);
    while ($catch_bond = mysqli_fetch_array($catch_bond_exec)) {
        $catch_bonds[] = $catch_bond;
    }
}
if (isset($_POST['previous'])) {
    $catch_bond_select = selectND('catch_bonds') . andWhere('code', $previous_catch_code);
    $catch_bond_exec = mysqli_query($con, $catch_bond_select);
    $catch_bond_rows = mysqli_num_rows($catch_bond_exec);
    while ($catch_bond = mysqli_fetch_array($catch_bond_exec)) {
        $catch_bonds[] = $catch_bond;
    }
}

if (isset($_POST['last_previous'])) {
    $catch_bond_select = selectND('catch_bonds') . andWhere('code', $last_previous_code);
    $catch_bond_exec = mysqli_query($con, $catch_bond_select);
    $catch_bond_rows = mysqli_num_rows($catch_bond_exec);
    while ($catch_bond = mysqli_fetch_array($catch_bond_exec)) {
        $catch_bonds[] = $catch_bond;
    }
}
if (isset($_POST['current']) || isset($_POST['update']) || isset($_POST['print'])) {
    $catch_bond_select = selectND('catch_bonds') . andWhere('code', $_POST['code']);
    $catch_bond_exec = mysqli_query($con, $catch_bond_select);
    $catch_bond_rows = mysqli_num_rows($catch_bond_exec);
    if ($catch_bond_rows > 0)
        while ($catch_bond = mysqli_fetch_array($catch_bond_exec)) {
            $catch_bonds[] = $catch_bond;
        }
    else {
        $_POST['code'] = get_auto_code($con, 'catch_bonds', 'code', '', 'parent');
    }
}

// message_box($current_catch_code);
// message_box($next_catch_code);
// message_box($previous_catch_code);
?>

<body class="receipt">
    <form action="" method="post">
        <div class="container">
            <div class="row ">
                <div class="col-4" id="receipt_number1">
                    <h2> سند قبض</h2>
                </div>
                <div class="col-3 " id="receipt_number">
                    <div class="row" style=" padding-top: 10px;padding-right: 30px; ">
                        <label name=" "> رقم الإيصال</label>

                        <div class="col-md-6">
                            <input type="number" id="code" value="<?php if (($next_catch_code == '' && isset($_POST['next'])) ||
                                                                        (isset($_POST['previous']) && $previous_catch_code == '') ||
                                                                        (!isset($_POST['code']))
                                                                    )
                                                                        echo get_auto_code($con, 'catch_bonds', 'code', '', 'parent');
                                                                    elseif (isset($_POST['next'])) echo $next_catch_code;
                                                                    elseif (isset($_POST['last_next'])) echo $last_next_code;
                                                                    elseif (isset($_POST['previous'])) echo $previous_catch_code;
                                                                    elseif (isset($_POST['last_previous'])) echo $last_previous_code;
                                                                    elseif (isset($_POST['current']) || isset($_POST['update'])) echo $_POST['code'];
                                                                    ?>" class="form-control" name="code">
                        </div>

                    </div>

                </div>
                <div class="col-4 text-end">
                    <div class="row justify-content-end" style="padding-top: 10px;">
                        <button name="last_previous" id="last_previous">
                            << </button>
                                <button name="previous" id="previous">
                                    < </button>
                                        <button name="next" id="next"> > </button>
                                        <button name="last_next" id="last_next"> >> </button>
                                        <button name="current" id="current" hidden></button>
                    </div>
                </div>
            </div>

            <div class="row py-3" id="inf_row">
                <div id="account" class="col-sm-6 col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-6 col-md-3 col-form-label"> الحساب</label>
                        <div class="col-md-9">
                            <input onblur="check_account_to_insert(tags_accounts , this.value ,this.id , 'modal_account_card_button')" type="text" class="form-control" onclick="return this.value=''" name="main_account" id="main_account" value="<?php if (empty($catch_bonds)) echo get_box_account($con);
                                                                                                                                                                                                                                                    else echo get_name_and_code_from_table_using_id($con, 'accounts', $catch_bonds[0]['main_account_id']); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-6 col-md-3 col-form-label ">التاريخ </label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="date" id="date" min="" max="" value="<?php if (empty($catch_bonds)) echo date('Y-m-d');
                                                                                                                else echo $catch_bonds[0]['date'] ?>">
                        </div>
                    </div>
                </div>
                <div id="currency_notes" class="col-sm-10 col-md-5">
                    <div class="form-group row">
                        <label class=" col-sm-6 col-md-3 col-form-label text-md-right">العملة </label>
                        <div class="col-md-8">
                            <input name="currency" id="currency" class="form-control" value="ليرة سورية" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-6 col-md-3 col-form-label text-md-right"> ملاحظات</label>
                        <div class="col-md-8">
                            <textarea rows="2" type="text" id="" class="form-control" name="notes"><?php if (empty($catch_bonds)) echo '';
                                                                                                    else echo $catch_bonds[0]['main_note']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row " style=" padding-right: 20px;">
                <div class="col-11">
                    <table id="tbl" class=" text-center table table-bordered table-hover">
                        <thead class="text-center ">
                            <tr>
                                <th scope="col">رقم</th>
                                <th scope="col">مدين</th>
                                <th scope="col">الحساب </th>
                                <th scope="col">ملاحظات</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end" style="padding-left:70px ;">
                <label for="total" class="col-form-label" id="res_number"> المجموع</label>
                <div class="col-md-3" style="padding-left: 60px;">
                    <input id="total" type="text" id="resault" class="form-control" name="total">
                </div>
            </div>
            <div class="row justify-content-end  py-3 px-5">
                <div class="col-md-5" id='buttons'>
                    <button type="submit" class="" id="btn-grp" name="add" <?php if (!empty($catch_bonds)) echo 'disabled'; ?>>
                        إضافة
                    </button>
                    <button type="submit" class="" id="btn-grp" name="print">
                        طباعة
                    </button>
                    <button class="" id="btn-grp" name="update" <?php if (empty($catch_bonds)) echo 'disabled'; ?>>
                        تعديل
                    </button>

                    <button onclick="return confirm('هل انت متأكد انك تريد حذف السند ؟')" class=" " id="btn-grp" name="delete" <?php if (empty($catch_bonds)) echo 'disabled'; ?>>
                        حذف
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script src="js/scripts/catchBonds.js"></script>
</body>

</html>

<?php
if (isset($_POST['add']) || isset($_POST['print'])) {
    if (empty($catch_bonds)) {
        $main_account_code = get_code_from_input($_POST['main_account']);
        $main_account_id = getId($con, 'accounts', 'code', $main_account_code);

        $_POST['code'] = get_auto_code($con, 'catch_bonds', 'code', '', 'parent');

        foreach ($_POST['account'] as $key => $value) {
            if ($value != '' && $_POST['maden'][$key] != '') {
                $other_account_code = get_code_from_input($value);
                $other_account_id = getId($con, 'accounts', 'code', $other_account_code);
                $insert_catch_bond_query = insert('catch_bonds', [
                    'main_account_id' => $main_account_id,
                    'other_account_id' => $other_account_id,
                    'maden' => $_POST['maden'][$key],
                    'note' => $_POST['note'][$key],
                    'code' => $_POST['code'],
                    'date' => $_POST['date'],
                    'currency' => $_POST['currency'],
                    'main_note' => $_POST['notes']
                ]);
                $insert_catch_bond_exec = mysqli_query($con, $insert_catch_bond_query);
                /**
                 * make account statements
                 */
                // كشف حساب الصندوق
                $insert_account_statement_query = insert('account_statements', [
                    'main_account_id' => $main_account_id,
                    'other_account_id' => $other_account_id,
                    'maden' => $_POST['maden'][$key],
                    'note' => $_POST['note'][$key],
                    'date' => $_POST['date'],
                    'code_number' => $_POST['code'],
                    'code_type' => 'catch_bonds'
                ]);
                message_box($insert_account_statement_query);
                $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

                // كشف حساب القابض
                $insert_account_statement_query = insert('account_statements', [
                    'main_account_id' => $other_account_id,
                    'other_account_id' => $main_account_id,
                    'daen' => $_POST['maden'][$key],
                    'note' => $_POST['note'][$key],
                    'date' => $_POST['date'],
                    'code_number' => $_POST['code'],
                    'code_type' => 'catch_bonds',
                ]);
                $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
            }
        }
    }
    if (isset($_POST['print'])) {
        open_window_blank("print.php?catch_code=" . $current_catch_code);
        open_window_self_id('catch_bonds.php' , getId($con , 'catch_bonds' , 'code' , $current_catch_code));
    }
    clear_local_storage('account_card_code_name');
    open_window_self('catch_bonds.php');
}

if (isset($_POST['update'])) {

    $main_account_code = get_code_from_input($_POST['main_account']);
    $main_account_id = getId($con, 'accounts', 'code', $main_account_code);
    $catch_bond_ids = getIds($con, 'catch_bonds', 'code', $_POST['code']);
    foreach ($_POST['account'] as $key => $value) {
        if ($value != '' && $_POST['maden'][$key] != '') {
            $other_account_code = get_code_from_input($value);
            $other_account_id = getId($con, 'accounts', 'code', $other_account_code);
            $update_catch_bond_query = update('catch_bonds', [
                'main_account_id' => $main_account_id,
                'other_account_id' => $other_account_id,
                'maden' => $_POST['maden'][$key],
                'note' => $_POST['note'][$key],
                'date' => $_POST['date'],
                'currency' => $_POST['currency'],
                'main_note' => $_POST['notes']
            ]) . where('code', $_POST['code']) . andWhere('id', $catch_bond_ids[$key]);
            $update_catch_bond_exec = mysqli_query($con, $update_catch_bond_query);
            /**
             * make account statements
             */
            // كشف حساب الدافع
            $update_account_statement_query = update('account_statements', [
                'main_account_id' => $main_account_id,
                'other_account_id' => $other_account_id,
                'maden' => $_POST['maden'][$key],
                'note' => $_POST['note'][$key],
                'date' => $_POST['date']
            ]) . where('code_number', $_POST['code']) . andWhere('code_type', 'catch_bonds') . andWhere('main_account_id', $main_account_id);
            message_box($update_account_statement_query);
            $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);

            // كشف حساب القابض
            $update_account_statement_query = update('account_statements', [
                'main_account_id' => $other_account_id,
                'other_account_id' => $main_account_id,
                'daen' => $_POST['maden'][$key],
                'note' => $_POST['note'][$key],
                'date' => $_POST['date'],
            ]) . where('code_number', $_POST['code']) . andWhere('code_type', 'catch_bonds') . andWhere('main_account_id', $main_account_id);;
            $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);
        }
    }
    do_script("document.getElementById('current').click()");
}

if (isset($_POST['delete'])) {
    $delete_catch_bond_query = delete('catch_bonds') . where('code', $_POST['code']);
    $delete_catch_bond_exec = mysqli_query($con, $delete_catch_bond_query);
    $delete_account_statements_query = delete('account_statements') . where('code_number', $_POST['code']) . andWhere('code_type', 'catch_bonds');
    $delete_account_statements_exec = mysqli_query($con, $delete_account_statements_query);
    echo "<script>document.getElementById('next').click()</script>";
}
?>

<?php
include('include/footer.php');

?>
<script>
    let ids = ['number', 'maden', 'account', 'note'];
    let names = ['number[]', 'maden[]', 'account[]', 'note[]'];
    addRows('tbl', number_of_rows, names, ids);

    for (var i = 0; i < number_of_rows; i++) {
        $('#maden_' + i).prop('type', 'number');
    }
</script>

<script>
    var tags_accounts = [
        <?php
        foreach (get_all_accounts_without_buying_selling_main_accounts($con) as $row) {
            echo print_account_to_tags_autocomplete($row);
        }
        ?>
    ];
    (function($) {

        // Custom autocomplete instance.
        $.widget("app.autocomplete", $.ui.autocomplete, {

            // Which class get's applied to matched text in the menu items.
            options: {
                highlightClass: "ui-state-highlight"
            },

            _renderItem: function(ul, item) {

                // Replace the matched text with a custom span. This
                // span uses the class found in the "highlightClass" option.
                var re = new RegExp("(" + this.term + ")", "gi"),
                    cls = this.options.highlightClass,
                    template = "<span class='" + cls + "'>$1</span>",
                    label = item.label.replace(re, template),
                    $li = $("<li/>").appendTo(ul);

                // Create and return the custom menu item content.
                $("<a/>").attr("href", "#")
                    .html(label)
                    .appendTo($li);

                return $li;

            }

        });

        // Create autocomplete instances.
        $(function() {
            for (i = 0; i < document.getElementById('tbl').rows.length; i++) {
                $("#account_" + i).autocomplete({
                    highlightClass: "bold-text",
                    source: tags_accounts
                });
            }
        });
        $(function() {
            $("#main_account").autocomplete({
                highlightClass: "bold-text",
                source: tags_accounts
            });
        });

    })(jQuery);
</script>

<!-- Add values to table if next or previous -->
<?php
for ($i = 0; $i < 5; $i++)
    echo "<script>
        document.getElementById('maden_' + $i).value = '" . @$catch_bonds[$i]['maden'] . "';
        document.getElementById('account_' + $i).value = '" . @get_name_and_code_from_table_using_id($con, 'accounts', $catch_bonds[$i]['other_account_id']) . "';
        document.getElementById('note_' + $i).value = '" . @$catch_bonds[$i]['note'] . "';
</script>"
?>
<script>
    document.getElementById('total').value = count_sum_ids('maden', number_of_rows);
    set_blur_to_input_ids_to_count_in_id('maden', 'total', number_of_rows);
</script>

<script>
    document.getElementById('code').onkeyup = function(event) {
        if (event.keyCode == 13) {
            document.getElementById('current').click();
        }
    };
</script>



<!-- Check wrong insertion -->
<script>
    $('#iframe_account_card').load(function() {
        $('#iframe_account_card').contents().find('#nav').hide();
        $('#iframe_account_card').contents().find('#container').css( {"margin-top":"-10%","margin-left":"-17%"});
    });
</script>
<script>
    function check_account_to_insert(tags_accounts, value, id, button_id_to_fire = '') {
        if (!tags_accounts.includes(value) && value != '') {
            if (confirm('هذا العميل غير موجود في قاعدة البيانات ! هل تريد انشاء بطاقة حساب له ؟')) {
                $('#iframe_account_card').contents().find('#name').val(value);
                document.getElementById(button_id_to_fire).click();
            }
            document.getElementById(id).value = '';
        }
    }
    $('input').focus(function() {
        if (localStorage.getItem('account_card_code_name') != null)
            if (!tags_accounts.includes(localStorage.getItem('account_card_code_name'))) {
                tags_accounts.push(localStorage.getItem('account_card_code_name'));
            }
    });
    $(document).ready(function() {
        for (i = 0; i < document.getElementById('tbl').rows.length; i++) {
            $('#account_' + i).blur(function() {
                check_account_to_insert(tags_accounts, this.value, this.id, 'modal_account_card_button');
            });
        }
    })
</script>

<!-- End chec worng insertion -->