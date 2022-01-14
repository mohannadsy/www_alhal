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
    <link rel="stylesheet" href="css/styles/print_com_bill.css" media="print">
    <!-- <link rel="stylesheet" href="css/styles/com_bill.css"> -->
    <style>
        body {
            background-color: LightGray;
            text-align: right;
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container-fluide {
            position: absolute;
            border-style: groove;
            top: 5%;
            width: 1200px;
            /* height: 700px ; */
            border-radius: 25px;
            border-style: groove;
            background-color: #5F9EA0;
            font-size: 19px;
        }

        td input {
            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
        }

        table {
            width: 60%;
        }

        #btn-grp {
            border-radius: 5px;
            margin: 6px;
            width: 80px;
        }
        #iframe_item_card {
            background-color: red;
        }
    </style>
</head>



<button hidden id="modal_account_card_button" class="login-trigger" href="#" data-target="#modal_account_card" data-toggle="modal">Account Card</button>
<div id="modal_account_card" class="modal fade" role="dialog">
    <div class="modal-dialog" style="min-width: 1000px">

        <div class="modal-content" style="min-height: 600px;">
            <div class="modal-body">
                <button onclick="" data-dismiss="modal" class="close">&times;</button>
                <h4>Account Card</h4>
                <iframe id="iframe_account_card" src="account_card.php#form" frameborder="0" style="min-width: 900px;min-height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>

<button hidden id="modal_item_card_button" class="login-trigger" href="#" data-target="#modal_item_card" data-toggle="modal">Account Card</button>
<div id="modal_item_card" class="modal fade" role="dialog">
    <div class="modal-dialog" style="min-width: 1000px">

        <div class="modal-content" style="min-height: 600px;">
            <div class="modal-body">
                <button onclick="" data-dismiss="modal" class="close">&times;</button>
                <h4>Item Card</h4>
                <iframe id="iframe_item_card" src="item_card.php#form" frameborder="0" style="min-width: 900px;min-height: 500px;"></iframe>
            </div>
        </div>
    </div>
</div>


<body id='body'>
    <form action="" method="post">
        <div id="contextmenu" class="container-fluide">
            <div class="row py-4">
                <div class="col-4">
                    <h2>فاتورة كمسيون</h2>
                </div>
                <div class="col-3">
                    <div class="row">
                        <label for="date" class="col-5">تاريخ الفاتورة</label>
                        <div class="col-6">
                            <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" style="padding:2px">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <label for="" class="col-5">رقم الفاتورة</label>
                        <div class="col-6">
                            <input type="text" name="code" id="code" value="<?php echo get_auto_code($con, 'bills', 'code', '', 'parent') ?>" readonly class="form-control" style="padding:2px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <label class="col-2">البائع</label>
                        <!-- <div class="ui-widget"> -->
                        <div class="col-4">
                            <input onblur="check_account_to_insert(tags_accounts , this.value ,'seller' , 'modal_account_card_button')" required id="seller" id="seller" name="seller" class="account_auto form-control" style="padding:2px" />
                            <!-- </div> -->
                            <input type="hidden" name="seller_id" value="6">
                        </div>

                    </div>
                    <div class="row">
                        <label class="col-2">طريقة الدفع </label>
                        <div class="col-2">
                            <input type="radio" name="seller_type_pay" checked value="cash">
                            <label>نقدي</label>
                        </div>
                        <div class="col-2">
                            <input type="radio" name="seller_type_pay" value="agel">
                            <label>آجل</label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-2">ملاحظات</label>
                        <div class="col-4">
                            <textarea name="seller_note" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="col-2">المشتري</label>
                        <div class="col-4">
                            <input onblur="check_account_to_insert(tags_accounts , this.value ,this.id , 'modal_account_card_button')" type="text" name="buyer" class="account_auto form-control" id="buyer" style="padding:2px">
                            <input type="hidden" name="buyer_id" value="7">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-2">طريقة الدفع </label>
                        <div class="coi-2">
                            <input type="radio" name="buyer_type_pay" checked value="cash">
                            <label>نقدي</label>
                        </div>
                        <div class="col-2">
                            <input type="radio" name="buyer_type_pay" value="agel">
                            <label>آجل</label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-2">ملاحظات</label>
                        <div class="col-4">
                            <textarea name="buyer_note" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button hidden type="button" id="add_col">adding column</button>
            <button type="button" id="add_row">adding Row</button>

            <div class="row justify-content-center">
                <div class="col-12">
                    <table contenteditable='false' class=" table table-hover table-bordered  text-center" name="table" id="tbl">
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
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end px-5">
                <label class="col-1">الإجمالي</label>
                <div class="col-2">
                    <input type="text" id="total_price" name="total_price" value="0" readonly class="form-control" style="padding:2px">
                </div>
            </div>
            <div class="row justify-content-end px-5">
                <label>الكمسيون</label>
                <div class="col-1">
                    <input onblur="count_total_price()" onfocus="this.value = ''" type="text" id="com_ratio" name="com_ratio" value="0" class="form-control" style="padding:2px">
                </div>
                <label>قيمته</label>
                <div class="col-1">
                    <input type="text" name="com_value" id="com_value" value="0" readonly class="form-control" style="padding:2px">
                </div>
            </div>
            <div class="row justify-content-end px-5">
                <label class="col-1">الصافي</label>
                <div class="col-2">
                    <input type="text" name="real_price" id="real_price" value="0" readonly class="form-control" style="padding:2px">
                </div>
            </div>
            <div id='buttons' class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" name="save" id="btn-grp">حفظ</button>
                    <button type="submit" name="modify" id="btn-grp">تعديل</button>
                    <button type="submit" name="delete" id="btn-grp">حذف</button>
                    <!-- <select name="print_option" id="">
                        <optgroup>
                            <option value="">بائع</option>
                            <option value="">مشتري</option>
                        </optgroup>
                    </select>
                    <button type="button" name="print" onclick="printComPill(['seller' , 'nav' , 'buttons'])">طباعة</button> -->

                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        طباعة
                    </a>
                    <input type="checkbox" name="" id="">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="" onclick="printComPill(['seller' , 'nav' , 'buttons'])">فاتورة البائع</a>
                        <a class="dropdown-item" href="" onclick="printComPill(['seller' , 'nav' , 'buttons'])">فاتورة المشتري</a>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <script src="js/scripts/com_bill.js"></script>
    <script src="js/iframeResizer.min.js"></script>
</body>

</html>

<?php


if (isset($_POST['save'])) {


    $_POST['note'] = $_POST['seller_note'] . "  " . $_POST['buyer_note'];
    // get seller id from seller code

    // $seller_code = substr($_POST['seller'] , 0 , strpos($_POST['seller'] , '-')-1);
    $seller_code = get_code_from_input($_POST['seller']);
    $select_seller_id_using_code_query = "select id,code from accounts where code = '$seller_code'";
    $select_seller_id_using_code_exec = mysqli_query($con, $select_seller_id_using_code_query);
    $seller_id = mysqli_fetch_row($select_seller_id_using_code_exec)[0];

    $_POST['seller_id'] = $seller_id;

    // get buyer id from buyer code
    // $buyer_code = substr($_POST['buyer'] , 0 , strpos($_POST['buyer'] , '-')-1);

    if (trim($_POST['buyer']) != '') {
        $buyer_code = get_code_from_input($_POST['buyer']);
        $select_buyer_id_using_code_query = "select id,code from accounts where code = '$buyer_code'";
        $select_buyer_id_using_code_exec = mysqli_query($con, $select_buyer_id_using_code_query);
        $buyer_id = mysqli_fetch_row($select_buyer_id_using_code_exec)[0];


        $_POST['buyer_id'] = $buyer_id;
    } else {
        $_POST['buyer_id'] = '0';
        $_POST['buyer_type_pay'] = null;
        $_POST['buyer_note'] = null;
    }

    // make bill insertion
    $insert_bill_query = insert('bills', get_array_from_array($_POST, [
        'code', 'date', 'seller_id', 'seller_type_pay', 'seller_note',
        'buyer_id', 'buyer_type_pay', 'buyer_note', 'total_price', 'real_price', 'com_ratio', 'com_value'
    ]));
    $insert_bill_exec = mysqli_query($con, $insert_bill_query);

    // insert all items to bill_item table
    $select_last_bill_id_query = select('bills', 'max(id)');
    $select_last_bill_id_exec = mysqli_query($con, $select_last_bill_id_query);
    $current_bill_id = mysqli_fetch_row($select_last_bill_id_exec)[0];
    $current_bill_code = $_POST['code'];

    foreach ($_POST['items'] as $key => $item) {
        if ($item != '') {
            // $item_code = substr($_POST['items'][$key] , 0 , 5);
            $item_code = get_code_from_input($_POST['items'][$key]);
            $select_item_id_from_code_query = "select id,code from items where code = '$item_code'";
            $select_item_id_from_code_exec = mysqli_query($con, $select_item_id_from_code_query);
            $item_id = mysqli_fetch_row($select_item_id_from_code_exec)[0];
            $insert_bill_item_query = insert('bill_item', [
                'bill_id' => $current_bill_id,
                'item_id' => $item_id,
                'total_weight' => $_POST['total_weights'][$key],
                'real_weight' => $_POST['real_weights'][$key],
                'price' => $_POST['prices'][$key],
                'total_item_price' => $_POST['total_item_prices'][$key],
                'bill_item_note' => $_POST['note'][$key]

            ]);
            $insert_bill_item_exec = mysqli_query($con, $insert_bill_item_query);
        }
    }

    // make mid bonds
    if ($_POST['seller_type_pay'] == 'cash') {
        // سند قيد
        $_POST['main_account_id'] = '1';
        $_POST['other_account_id'] = '2';
        $_POST['daen'] = $_POST['real_price'];
        $_POST['bill_id'] = $current_bill_id;
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب صندوق
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'note', 'date', 'code_number', 'code_type'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

        // سند قيد
        $_POST['main_account_id'] = '2';
        $_POST['other_account_id'] = '1';
        $_POST['maden'] = $_POST['real_price'];
        $_POST['note'] = $_POST['seller_note'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب مشتريات
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'note', 'date', 'code_number', 'code_type'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

        // كشف حساب البائع
        $_POST['code_number'] = $current_bill_id;
        $_POST['code_type'] = 'bills';
        $_POST['maden'] = $_POST['daen'] = $_POST['real_price'];
        $_POST['main_account_id'] = $seller_id;
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'maden', 'note', 'date', 'code_number', 'code_type',
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
    }

    if ($_POST['seller_type_pay'] == 'agel') {
        // سند قيد
        $_POST['main_account_id'] = $seller_id;
        $_POST['other_account_id'] = '2';
        $_POST['note'] = $_POST['seller_note'];
        $_POST['daen'] = $_POST['real_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب البائع
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'note', 'date', 'code_number', 'code_type',
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

        // سند قيد
        $_POST['main_account_id'] = '2';
        $_POST['other_account_id'] = $seller_id;
        $_POST['maden'] = $_POST['real_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
        ]));
        $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
        // كشف حساب مشتريات
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'note', 'date', 'code_number', 'code_type'
        ]));
        $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
    }



    /**
     * Buyer Section
     */


    if (trim($_POST['buyer']) != '') {
        if ($_POST['buyer_type_pay'] == 'cash') {
            // سند قيد
            $_POST['main_account_id'] = '1';
            $_POST['other_account_id'] = '3';
            $_POST['note'] = $_POST['buyer_note'];
            $_POST['maden'] = $_POST['total_price'];
            $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
            $insert_mid_bond_query = insert('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'code', 'note'
            ]));
            $insert_mid_bond_exec = mysqli_query($con, $insert_mid_bond_query);
            // كشف حساب الصندوق
            $_POST['code_number'] = $_POST['code'];
            $_POST['code_type'] = 'mid_bonds';
            $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'maden', 'note', 'date', 'code_number', 'code_type',
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
                'main_account_id', 'other_account_id', 'daen', 'note', 'date', 'code_number', 'code_type',
            ]));
            $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

            // كشف حساب مشتري
            $_POST['code_number'] = $current_bill_code;
            $_POST['main_account_id'] = $buyer_id;
            $_POST['code_type'] = 'bills';
            $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'maden', 'daen', 'note', 'date', 'code_number', 'code_type',
            ]));
            $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
        }

        if ($_POST['buyer_type_pay'] == 'agel') {
            // سند قيد
            $_POST['main_account_id'] = $buyer_id;
            $_POST['note'] = $_POST['buyer_note'];
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
                'main_account_id', 'other_account_id', 'maden', 'note', 'date', 'code_number', 'code_type',
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
                'main_account_id', 'other_account_id', 'daen', 'note', 'date', 'code_number', 'code_type'
            ]));
            $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
        }
    }
    open_window_self(COM_BILL);
}

?>

<?php
include('include/footer.php');
?>

<script>
    var tags_items = [
        <?php
        $query =  selectND('items');
        $query_exec = mysqli_query($con, $query);
        while ($row = mysqli_fetch_row($query_exec)) {
            echo "'$row[9] - $row[1]',";
        }
        ?>
    ];
    var tags_accounts = [
        <?php
        $query =  selectND('accounts') . " and id <> '1' and id <> '2' and id <> '3' and account_id <> '0'";
        $query_exec = mysqli_query($con, $query);
        while ($row = mysqli_fetch_row($query_exec)) {
            echo "'$row[1] - $row[2]',";
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

            $(".item_auto").autocomplete({
                source: tags_items
            });

            $(".account_auto").autocomplete({
                highlightClass: "bold-text",
                source: tags_accounts
            });

        });

    })(jQuery);
</script>


<!-- Check wrong insertion -->
<script>
    $('#iframe_account_card').load(function() {
        $('#iframe_account_card').contents().find('#nav').hide();
        // $('#iframe_account_card').css({'background-color': red})
    });
    $('#iframe_item_card').load(function() {
        $('#iframe_item_card').contents().find('#nav').hide();
        // $('#iframe_item_card').height($(window).height());
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

    function check_item_to_insert(tags_items, value, id, button_id_to_fire = '') {
        if (!tags_items.includes(value) && value != '') {
            if (confirm('هذه المادة غير موجودة في قاعدة البيانات ! هل تريد اضافتها ؟')) {
                $('#iframe_item_card').contents().find('#name').val(value);
                document.getElementById(button_id_to_fire).click();
            }
            document.getElementById(id).value = '';
        }
    }
    $(document).ready(function() {
        for (let i = 0; i < document.getElementById('tbl').rows.length - 1; i++) {
            $(`#items_${i}`).blur(function() {
                check_item_to_insert(tags_items, this.value, this.id, 'modal_item_card_button');
            });

        }
    });
    $('input').focus(function() {
        if (localStorage.getItem('account_card_code_name') != null)
        if (!tags_accounts.includes(localStorage.getItem('account_card_code_name'))) {
            tags_accounts.push(localStorage.getItem('account_card_code_name'));
        }
        if (localStorage.getItem('item_card_code_name') != null)
        if (!tags_items.includes(localStorage.getItem('item_card_code_name'))) {
            tags_items.push(localStorage.getItem('item_card_code_name'));
        }
    });
</script>

<!-- End chec worng insertion -->