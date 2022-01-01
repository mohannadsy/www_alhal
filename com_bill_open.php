<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles/com_bill.css">
</head>

<?php

$bill = [];
$seller = [];
$items = [];
if (isset($_GET['id'])) {
    $select_bill_using_id_query = selectWhereId('bills', $_GET['id']);
    $select_bill_using_id_exec = mysqli_query($con, $select_bill_using_id_query);
    $bill = mysqli_fetch_array($select_bill_using_id_exec);

    $select_seller_details_query = selectWhereId('accounts', $bill['seller_id']);
    $select_seller_details_exec = mysqli_query($con, $select_seller_details_query);
    $seller = mysqli_fetch_array($select_seller_details_exec);
}


?>


<body>
    <form action="" method="post">
        <div class="container">
            <label for="date">تاريخ الفاتورة</label>
            <input readonly type="date" name="date" id="date" value="<?= $bill['date'] ?>">
            <label for="">رقم الفاتورة</label>
            <input type="text" name="code" id="" value="<?= @$bill['code'] ?>" readonly>
            <div class="row" style="height:200px;">
                <div id='seller' class="col-6">
                    <div>
                        <label>البائع</label>
                        <!-- <div class="ui-widget"> -->
                        <input readonly id="seller" value="<?= @$seller['code'] . " - " . @$seller['name'] ?>" name="seller" class="account_auto" />

                    </div>
                    <div>
                        <label>طريقة الدفع </label>
                        <input disabled type="radio" name="seller_type_pay" value="cash" <?php if (@$bill['seller_type_pay'] == 'cash') echo 'checked' ?>>
                        <label>نقدي</label>
                        <input disabled type="radio" name="seller_type_pay" value="agel" <?php if (@$bill['seller_type_pay'] == 'agel') echo 'checked' ?>>
                        <label>آجل</label>
                    </div>
                    <div>
                        <label>ملاحظات</label>
                        <textarea readonly name="seller_note"><?= @$bill['seller_note'] ?></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label>المشتري</label>
                        <input type="text" name="buyer" class="account_auto">
                    </div>
                    <div>
                        <label>طريقة الدفع </label>
                        <input type="radio" name="buyer_type_pay" checked value="cash">
                        <label>نقدي</label>
                        <input type="radio" name="buyer_type_pay" value="agel">
                        <label>آجل</label>
                    </div>
                    <div>
                        <label>ملاحظات</label>
                        <textarea name="buyer_note"></textarea>
                    </div>
                </div>
            </div>
            <button hidden type="button" id="add_col">adding column</button>
            <button hidden type="button" id="add_row">adding Row</button>
            <div class="row justify-content-center">
                <table contenteditable='false' class="col-10 table table-hover table-bordered  text-center" name="table" id="tbl">
                    <thead class="text-center">
                        <tr>
                            <th contenteditable='false'>الرقم</th>
                            <th contenteditable='false'>المادة</th>
                            <th contenteditable='false'>الوحدة</th>
                            <!-- <th contenteditable='false'>عدد العبوات</th> -->
                            <th contenteditable='false'>وزن قائم</th>
                            <th contenteditable='false'>وزن الصافي</th>
                            <th contenteditable='false'> الإفرادي </th>
                            <th contenteditable='false'>الإجمالي </th>
                            <th id="notes" contenteditable='false'>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $select_items_using_id_query = "select DISTINCT * from bill_item, items where bill_id = '" . $bill['id'] . "'
                        and items.id = bill_item.item_id";
                        $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
                        $number = 1;
                        while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
                            echo "<tr>";
                            echo "<td>" . $number++ . "</td>";
                            echo "<td>" . $row['code'] . " - " . $row['name'] . "</td>";
                            echo "<td>" . $row['unit'] . "</td>";
                            echo "<td>" . $row['total_weight'] . "</td>";
                            echo "<td>" . $row['real_weight'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['total_item_price'] . "</td>";
                            echo "<td>" . $row['note'] . "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="">
                <label>الإجمالي</label>
                <input type="text" id="total_price" name="total_price" value="<?= @$bill['total_price'] ?>" readonly>
            </div>
            <div class="row justify-content-end">
                <label>الكمسيون</label>
                <input readonly type="text" id="com_ratio" name="com_ratio" value="<?= @$bill['com_ratio'] ?>">
                <label>قيمته</label>
                <input type="text" name="com_value" id="com_value" value="<?= @$bill['com_value'] ?>" readonly>
            </div>
            <div class="row justify-content-end">
                <label>الصافي</label>
                <input type="text" name="real_price" id="real_price" value="<?= @$bill['real_price'] ?>" readonly>
            </div>
            <div id='buttons' class="row justify-content-start">
                <div class="col-4">
                    <button type="submit" name="update">تعديل</button>
                    <select name="print_option" id="">
                        <optgroup>
                            <option value="">بائع</option>
                            <option value="">مشتري</option>
                        </optgroup>
                    </select>
                    <button type="button" name="print" onclick="printComPill(['seller' , 'nav' , 'buttons'])">طباعة</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>

<?php


if (isset($_POST['update'])) {


    $buyer_code = get_code_from_input($_POST['buyer']);
    $select_buyer_id_using_code_query = "select id,code from accounts where code = '$buyer_code'";
    $select_buyer_id_using_code_exec = mysqli_query($con, $select_buyer_id_using_code_query);
    $buyer_id = mysqli_fetch_row($select_buyer_id_using_code_exec)[0];
    $_POST['buyer_id'] = $buyer_id;

    /**
     * Buyer Section
     */

     $update_bill_query = updateWhereId('bills' , $bill['id'] , get_array_from_array($_POST , [
         'buyer_id' , 'buyer_type_pay' , 'buyer_note'
     ]));
     $update_bill_exec = mysqli_query($con , $update_bill_query);

     $current_bill_code = $bill['code'];

    if ($_POST['buyer_type_pay'] == 'cash') {
        // سند قيد
        $_POST['main_account_id'] = '1';
        $_POST['other_account_id'] = '3';
        $_POST['maden'] = $_POST['total_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب الصندوق
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'note', 'date', 'code_number', 'code_type', 'note'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

        // سند قيد
        $_POST['main_account_id'] = '3';
        $_POST['other_account_id'] = '1';
        $_POST['daen'] = $_POST['total_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب المبيعات
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'note', 'date', 'code_number', 'code_type', 'note'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

        // كشف حساب مشتري
        $_POST['code_number'] = $current_bill_code;
        $_POST['code_type'] = 'bills';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'daen', 'note', 'date', 'code_number', 'code_type', 'note'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
    }

    if ($_POST['buyer_type_pay'] == 'agel') {
        // سند قيد
        $_POST['main_account_id'] = $buyer_id;
        $_POST['other_account_id'] = '3';
        $_POST['maden'] = $_POST['total_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب المشتري
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'note', 'date', 'code_number', 'code_type', 'note'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

        // سند قيد
        $_POST['main_account_id'] = '3';
        $_POST['other_account_id'] = $buyer_id;
        $_POST['daen'] = $_POST['total_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب المبيعات
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'note', 'date', 'code_number', 'code_type', 'note'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
    }

    // open_window_self('com_bill_open.php?id='.$bill['id']);
}

?>

<?php
include('include/footer.php');
?>

<script>
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


        var tags_items = [
            <?php
            $query =  select('items');
            $query_exec = mysqli_query($con, $query);
            while ($row = mysqli_fetch_row($query_exec)) {
                echo "'$row[9] - $row[1]',";
            }
            ?>
        ];
        var tags = [
            <?php
            $query =  select('accounts') . " where id <> '1' and id <> '2' and id <> '3' and account_id <> '0'";
            $query_exec = mysqli_query($con, $query);
            while ($row = mysqli_fetch_row($query_exec)) {
                echo "'$row[1] - $row[2]',";
            }
            ?>
        ];

        // Create autocomplete instances.
        $(function() {

            $(".item_auto").autocomplete({
                source: tags_items
            });

            $(".account_auto").autocomplete({
                highlightClass: "bold-text",
                source: tags
            });

        });

    })(jQuery);
</script>