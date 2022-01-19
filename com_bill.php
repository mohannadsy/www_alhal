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


<?php
$select_last_next_bill_query = selectND('bills') . ' order by code desc limit 1 ';
$select_last_next_bill_exec = mysqli_query($con, $select_last_next_bill_query);
$last_next_code = mysqli_fetch_array($select_last_next_bill_exec)['code'];

$select_last_previous_bill_query = selectND('bills') . ' limit 1 ';
$select_last_previous_bill_exec = mysqli_query($con, $select_last_previous_bill_query);
$last_previous_code = mysqli_fetch_array($select_last_previous_bill_exec)['code'];

$current_bill_code = get_auto_code($con, 'bills', 'code', '', 'parent');
if (isset($_GET['code']) &&
        !isset($_POST['next']) &&
        !isset($_POST['last_next']) &&
        !isset($_POST['previous']) &&
        !isset($_POST['last_previous']) &&
        !isset($_POST['current']) ) 
    {
    // $current_bill_code = get_value_from_table_using_id($con, 'bills', 'code', $_GET['id']);
    $current_bill_code = $_GET['code'];
    $_POST['code'] = $current_bill_code;
    $_POST['current'] = $current_bill_code;
}
$next_bill_code = $current_bill_code;
if (isset($_POST['code']))
    $current_bill_code = $_POST['code'];
$previous_bill_code = 1;
$current_bill_code_for_item_search = $current_bill_code;
if ($current_bill_code < $next_bill_code) {
    $next_bill_code_query = selectND('bills') . andWhereLarger('code', $current_bill_code);
    $next_bill_code_exec = mysqli_query($con, $next_bill_code_query);
    $next_bill_code = mysqli_fetch_array($next_bill_code_exec)['code'];
}
if ($current_bill_code > $previous_bill_code) {
    $previous_bill_code_query = selectND('bills') . andWhereSmaller('code', $current_bill_code) . ' order by code desc';
    $previous_bill_code_exec = mysqli_query($con, $previous_bill_code_query);
    $previous_bill_code = mysqli_fetch_array($previous_bill_code_exec)['code'];
}
$bill = [];
if (isset($_POST['next'])) {
    $bill_select = selectND('bills') . andWhere('code', $next_bill_code);
    $bill_exec = mysqli_query($con, $bill_select);
    $bill_rows = mysqli_num_rows($bill_exec);
    while ($bill_ = mysqli_fetch_array($bill_exec)) {
        $bill[] = $bill_;
    }
    $current_bill_code_for_item_search = $next_bill_code;
}
if (isset($_POST['last_next'])) {
    $bill_select = selectND('bills') . andWhere('code', $last_next_code);
    $bill_exec = mysqli_query($con, $bill_select);
    $bill_rows = mysqli_num_rows($bill_exec);
    while ($bill_ = mysqli_fetch_array($bill_exec)) {
        $bill[] = $bill_;
    }
    $current_bill_code_for_item_search = $last_next_code;
}
if (isset($_POST['previous'])) {
    $bill_select = selectND('bills') . andWhere('code', $previous_bill_code);
    $bill_exec = mysqli_query($con, $bill_select);
    $bill_rows = mysqli_num_rows($bill_exec);
    while ($bill_ = mysqli_fetch_array($bill_exec)) {
        $bill[] = $bill_;
    }
    $current_bill_code_for_item_search = $previous_bill_code;
}

if (isset($_POST['last_previous'])) {
    $bill_select = selectND('bills') . andWhere('code', $last_previous_code);
    $bill_exec = mysqli_query($con, $bill_select);
    $bill_rows = mysqli_num_rows($bill_exec);
    while ($bill_ = mysqli_fetch_array($bill_exec)) {
        $bill[] = $bill_;
    }
    $current_bill_code_for_item_search = $last_previous_code;
}
if (isset($_POST['current']) || isset($_POST['update']) || isset($_POST['print_seller']) || isset($_POST['print_buyer'])) {
    $bill_select = selectND('bills') . andWhere('code', $_POST['code']);
    $bill_exec = mysqli_query($con, $bill_select);
    $bill_rows = mysqli_num_rows($bill_exec);
    if ($bill_rows > 0)
        while ($bill_ = mysqli_fetch_array($bill_exec)) {
            $bill[] = $bill_;
        }
    else {
        $_POST['code'] = get_auto_code($con, 'bills', 'code', '', 'parent');
        $current_bill_code_for_item_search = $_POST['code'];
    }
}

// message_box("current = $current_bill_code , next = $next_bill_code , previous = $previous_bill_code , last_previous = $last_previous_code , last_next = $last_next_code");
?>


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
                        <div class="col-7">
                            <input type="date" name="date" id="date" value="<?php if (empty($bill)) echo date('Y-m-d');
                                                                            else echo $bill[0]['date'] ?>" class="form-control" style="padding:2px">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <label for="" class="col-5">رقم الفاتورة</label>
                        <div class="col-7">
                            <input type="number" name="code" id="code" value="<?php if (($next_bill_code == '' && isset($_POST['next'])) ||
                                                                                    (isset($_POST['previous']) && $previous_bill_code == '') ||
                                                                                    (!isset($_POST['code']))
                                                                                )
                                                                                    echo get_auto_code($con, 'bills', 'code', '', 'parent');
                                                                                elseif (isset($_POST['next'])) echo $next_bill_code;
                                                                                elseif (isset($_POST['last_next'])) echo $last_next_code;
                                                                                elseif (isset($_POST['previous'])) echo $previous_bill_code;
                                                                                elseif (isset($_POST['last_previous'])) echo $last_previous_code;
                                                                                elseif (isset($_POST['current']) || isset($_POST['update'])) echo $_POST['code']; ?>" class="form-control" style="padding:2px">
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
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <label class="col-2">البائع</label>
                        <!-- <div class="ui-widget"> -->
                        <div class="col-4">
                            <input onblur="check_account_to_insert(tags_accounts , this.value ,'seller' , 'modal_account_card_button')" id="seller" id="seller" name="seller" class="account_auto form-control" style="padding:2px" value="<?php if (notempty($bill)) echo get_name_and_code_from_table_using_id($con, 'accounts', $bill[0]['seller_id'])  ?>" />
                            <!-- </div> -->
                        </div>

                    </div>
                    <div class="row">
                        <label class="col-2">طريقة الدفع </label>
                        <div class="col-2">
                            <input type="radio" name="seller_type_pay" checked value="cash">
                            <label>نقدي</label>
                        </div>
                        <div class="col-2">
                            <input type="radio" name="seller_type_pay" <?php if (notempty($bill)) if ($bill[0]['seller_type_pay'] == 'agel') echo 'checked' ?> value="agel">
                            <label>آجل</label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-2">ملاحظات</label>
                        <div class="col-4">
                            <textarea name="seller_note" class="form-control"><?php if (notempty($bill)) echo $bill[0]['seller_note'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label class="col-2">المشتري</label>
                        <div class="col-4">
                            <input onblur="check_account_to_insert(tags_accounts , this.value ,this.id , 'modal_account_card_button')" type="text" name="buyer" class="account_auto form-control" id="buyer" style="padding:2px" value="<?php if (notempty($bill)) if ($bill[0]['buyer_id'] > 0) echo get_name_and_code_from_table_using_id($con, 'accounts', $bill[0]['buyer_id'])  ?>">

                        </div>
                    </div>

                    <div class="row">
                        <label class="col-2">طريقة الدفع </label>
                        <div class="coi-2">
                            <input type="radio" name="buyer_type_pay" checked value="cash">
                            <label>نقدي</label>
                        </div>
                        <div class="col-2">
                            <input type="radio" name="buyer_type_pay" <?php if (notempty($bill)) if ($bill[0]['buyer_type_pay'] == 'agel') echo 'checked' ?> value="agel">
                            <label>آجل</label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-2">ملاحظات</label>
                        <div class="col-4">
                            <textarea name="buyer_note" class="form-control"><?php if (notempty($bill)) echo $bill[0]['buyer_note'] ?></textarea>
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
                    <input type="text" id="total_price" name="total_price" readonly class="form-control" style="padding:2px" value="<?php if (notempty($bill)) echo $bill[0]['total_price'];
                                                                                                                                    else echo '0' ?>">
                </div>
            </div>
            <div class="row justify-content-end px-5">
                <label>الكمسيون</label>
                <div class="col-1">
                    <input onblur="count_total_price()" onfocus="this.value = ''" type="number" id="com_ratio" name="com_ratio" class="form-control" style="padding:2px" value="<?php if (notempty($bill)) echo $bill[0]['com_ratio'] ?>">
                </div>
                <label>قيمته</label>
                <div class="col-1">
                    <input type="text" name="com_value" id="com_value" readonly class="form-control" style="padding:2px" value="<?php if (notempty($bill)) echo $bill[0]['com_value'];
                                                                                                                                else echo '0' ?>">
                </div>
            </div>
            <div class="row justify-content-end px-5">
                <label class="col-1">الصافي</label>
                <div class="col-2">
                    <input type="text" name="real_price" id="real_price" readonly class="form-control" style="padding:2px" value="<?php if (notempty($bill)) echo $bill[0]['real_price'];
                                                                                                                                    else echo '0' ?>">
                </div>
            </div>
            <div id='buttons' class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" <?php if (notempty($bill)) echo 'hidden' ?> name="save" id="btn-grp">حفظ</button>
                    <button type="submit" <?php if (empty($bill)) echo 'hidden' ?> name="update" id="btn-grp">تعديل</button>
                    <button type="submit" onclick="return confirm('هل تريد بالتأكيد حذف هذه الفاتورة ؟')"  <?php if (empty($bill)) echo 'hidden' ?> name="delete" id="btn-grp">حذف</button>
                    <!-- <select name="print_option" id="">
                        <optgroup>
                            <option value="">بائع</option>
                            <option value="">مشتري</option>
                        </optgroup>
                    </select>
                    <button type="button" name="print" onclick="printComPill(['seller' , 'nav' , 'buttons'])">طباعة</button> -->

                    <!-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        طباعة
                    </a>
                    <input type="checkbox" name="" id="">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> -->

                        <!-- <a class="dropdown-item" href="" name="print_buyer" onclick="printComPill(['seller' , 'nav' , 'buttons'])">فاتورة المشتري</a> -->
                        <!-- <button type="submit" class="dropdown-item" name="print_seller">فاتورة بائع</button>
                        <button type="submit" class="dropdown-item" name="print_buyer">فاتورة مشتري</button> -->
                        <button type="submit" name="print_seller">طباعة بائع</button>
                        <button type="submit" name="print_buyer">طباعة مشتري</button>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </form>
    <script src="js/scripts/com_bill.js"></script>
    <script src="js/iframeResizer.min.js"></script>
</body>

</html>


<!-- ADD TO BILL -->
<?php


if (isset($_POST['save']) || isset($_POST['print_seller']) || isset($_POST['print_buyer'])) {


    if (empty($bill) && $_POST['seller'] != '') {
        // get seller id from seller code

        $seller_code = get_code_from_input($_POST['seller']);
        $select_seller_id_using_code_query = "select id,code from accounts where code = '$seller_code'";
        $select_seller_id_using_code_exec = mysqli_query($con, $select_seller_id_using_code_query);
        $seller_id = mysqli_fetch_row($select_seller_id_using_code_exec)[0];

        $_POST['seller_id'] = $seller_id;

        // get buyer id from buyer code
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
        $_POST['note'] = $_POST['seller_note'] . "  " . $_POST['buyer_note'];
        // make mid_bonds bonds
        if ($_POST['seller_type_pay'] == 'cash') {
            // سند قيد
            $_POST['main_account_id'] = '1';
            $_POST['other_account_id'] = '2';
            $_POST['daen'] = $_POST['real_price'];
            $_POST['bill_id'] = $current_bill_id;
            $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
            $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
            ]));
            $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
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
            $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'note', 'code'
            ]));
            $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
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
            $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'note', 'code'
            ]));
            $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
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
            $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
            ]));
            $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
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
                $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                    'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'code', 'note'
                ]));
                $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
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
                $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                    'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
                ]));
                $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
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
                $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                    'main_account_id', 'other_account_id', 'bill_id', 'maden', 'date', 'note', 'code'
                ]));
                $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
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
                $insert_mid_bonds_query = insert('mid_bonds', get_array_from_array($_POST, [
                    'main_account_id', 'other_account_id', 'bill_id', 'daen', 'date', 'note', 'code'
                ]));
                $insert_mid_bonds_exec = mysqli_query($con, $insert_mid_bonds_query);
                // كشف حساب المبيعات
                $_POST['code_number'] = $_POST['code'];
                $_POST['code_type'] = 'mid_bonds';
                $insert_account_statement_query = insert('account_statements', get_array_from_array($_POST, [
                    'main_account_id', 'other_account_id', 'daen', 'note', 'date', 'code_number', 'code_type'
                ]));
                $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
            }
        }
    }
    if (isset($_POST['print_seller']) && $_POST['seller'] != '') {
        open_window_blank("print.php?code=" . $current_bill_code . "&print_type=seller");
        open_window_self_code(COM_BILL , $current_bill_code);
        
    }
    if (isset($_POST['print_buyer']) && $_POST['buyer'] != '') {
        open_window_blank("print.php?code=" . $current_bill_code . '&print_type=buyer');
        open_window_self_code(COM_BILL , $current_bill_code);
    }
    open_window_self(COM_BILL);
}

?>

<!-- UPDATE TO BILL -->
<?php

if (isset($_POST['update'])) {
    // get seller id from seller code

    $current_bill_id_to_update = get_value_from_table_using_column($con, 'bills', 'code', $_POST['code'], 'id');

    $seller_code = get_code_from_input($_POST['seller']);
    $select_seller_id_using_code_query = "select id,code from accounts where code = '$seller_code'";
    $select_seller_id_using_code_exec = mysqli_query($con, $select_seller_id_using_code_query);
    $seller_id = mysqli_fetch_row($select_seller_id_using_code_exec)[0];

    $_POST['seller_id'] = $seller_id;

    // get buyer id from buyer code
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

    // make bill Update
    $update_bill_query = updateWhereId('bills', $current_bill_id_to_update, get_array_from_array($_POST, [
        'code', 'date', 'seller_id', 'seller_type_pay', 'seller_note',
        'buyer_id', 'buyer_type_pay', 'buyer_note', 'total_price', 'real_price', 'com_ratio', 'com_value'
    ]));
    $update_bill_exec = mysqli_query($con, $update_bill_query);

    $current_bill_code = $_POST['code'];

    // delete items from item_bill and re insert them
    $force_delete_bill_items_query = forceDelete('bill_item').where('bill_id', $current_bill_id_to_update);
    $force_delete_bill_items_exec = mysqli_query($con , $force_delete_bill_items_query);
    foreach ($_POST['items'] as $key => $item) {
        if ($item != '') {
            $item_code = get_code_from_input($_POST['items'][$key]);
            $select_item_id_from_code_query = "select id,code from items where code = '$item_code'";
            $select_item_id_from_code_exec = mysqli_query($con, $select_item_id_from_code_query);
            $item_id = mysqli_fetch_row($select_item_id_from_code_exec)[0];
            $insert_bill_item_query = insert('bill_item', [
                'bill_id' => $current_bill_id_to_update,
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

    $select_mid_bonds_query = select('mid_bonds') . where('bill_id', $current_bill_id_to_update);
    $select_mid_bonds_exec = mysqli_query($con, $select_mid_bonds_query);
    $mid_bonds = [];
    while ($mid_bond = mysqli_fetch_array($select_mid_bonds_exec)) {
        $mid_bonds[] = $mid_bond;
    }
    $_POST['main_account_id'] = '2';
    $_POST['other_account_id'] = '1';

    // make mid_bonds bonds
    if ($_POST['seller_type_pay'] == 'cash') {
        // سند قيد
        $_POST['daen'] = $_POST['real_price'];
        $_POST['bill_id'] = $current_bill_id_to_update;
        $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'date', 'note'
        ])) . where('code', $mid_bonds[0]['code']);
        $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
        // كشف حساب صندوق
        $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'note', 'date'
        ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[0]['code']);
        $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);

        // سند قيد
        $_POST['maden'] = $_POST['real_price'];
        $_POST['note'] = $_POST['seller_note'];
        $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'date', 'note'
        ])) . where('code', $mid_bonds[1]['code']);
        $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
        // كشف حساب مشتريات
        $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'note', 'date'
        ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[1]['code']);;
        $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);

        // كشف حساب البائع
        $_POST['maden'] = $_POST['daen'] = $_POST['real_price'];
        $_POST['main_account_id'] = $seller_id;
        $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'maden', 'note', 'date'
        ])) . where('code_type', 'bills') . andWhere('code_number', $current_bill_id_to_update);
        $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);
    }

    if ($_POST['seller_type_pay'] == 'agel') {
        // سند قيد
        $_POST['main_account_id'] = $seller_id;
        $_POST['other_account_id'] = '2';
        $_POST['note'] = $_POST['seller_note'];
        $_POST['daen'] = $_POST['real_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'date', 'note'
        ])) . where('code', $mid_bonds[0]['code']);
        $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
        // كشف حساب البائع
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'note', 'date'
        ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[0]['code']);;;
        $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);

        // سند قيد
        $_POST['main_account_id'] = '2';
        $_POST['other_account_id'] = $seller_id;
        $_POST['maden'] = $_POST['real_price'];
        $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
        $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'daen', 'date', 'note'
        ])) . where('code', $mid_bonds[1]['code']);
        $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
        // كشف حساب مشتريات
        $_POST['code_number'] = $_POST['code'];
        $_POST['code_type'] = 'mid_bonds';
        $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
            'main_account_id', 'other_account_id', 'maden', 'note', 'date'
        ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[1]['code']);
        $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);
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
            $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'maden', 'date', 'note'
            ])) . where('code', $mid_bonds[2]['code']);;
            $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
            // كشف حساب الصندوق
            $_POST['code_number'] = $_POST['code'];
            $_POST['code_type'] = 'mid_bonds';
            $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'maden', 'note', 'date'
            ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[2]['code']);
            $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);

            // سند قيد
            $_POST['main_account_id'] = '3';
            $_POST['other_account_id'] = '1';
            $_POST['daen'] = $_POST['total_price'];
            $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
            $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'daen', 'date', 'note'
            ])) . where('code', $mid_bonds[3]['code']);
            $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
            // كشف حساب المبيعات
            $_POST['code_number'] = $_POST['code'];
            $_POST['code_type'] = 'mid_bonds';
            $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'daen', 'note', 'date'
            ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[3]['code']);;
            $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);

            // كشف حساب مشتري
            $_POST['code_number'] = $current_bill_code;
            $_POST['main_account_id'] = $buyer_id;
            $_POST['code_type'] = 'bills';
            $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'maden', 'daen', 'note', 'date'
            ])) . where('code_type', 'bills') . andWhere('code_number', $current_bill_id_to_update);
            $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);
        }

        if ($_POST['buyer_type_pay'] == 'agel') {
            // سند قيد
            $_POST['main_account_id'] = $buyer_id;
            $_POST['note'] = $_POST['buyer_note'];
            $_POST['other_account_id'] = '3';
            $_POST['maden'] = $_POST['total_price'];
            $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
            $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'maden', 'date', 'note'
            ])) . where('code', $mid_bonds[2]['code']);;
            $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
            // كشف حساب المشتري
            $_POST['code_number'] = $_POST['code'];
            $_POST['code_type'] = 'mid_bonds';
            $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'maden', 'note', 'date'
            ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[3]['code']);;
            $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);

            // سند قيد
            $_POST['main_account_id'] = '3';
            $_POST['other_account_id'] = $buyer_id;
            $_POST['daen'] = $_POST['total_price'];
            $_POST['code'] = get_auto_code($con, 'mid_bonds', 'code', '', 'parent');
            $update_mid_bonds_query = update('mid_bonds', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'daen', 'date', 'note'
            ])) . where('code', $mid_bonds[3]['code']);;
            $update_mid_bonds_exec = mysqli_query($con, $update_mid_bonds_query);
            // كشف حساب المبيعات
            $_POST['code_number'] = $_POST['code'];
            $_POST['code_type'] = 'mid_bonds';
            $update_account_statement_query = update('account_statements', get_array_from_array($_POST, [
                'main_account_id', 'other_account_id', 'daen', 'note', 'date'
            ])) . where('code_type', 'mid_bonds') . andWhere('code_number', $mid_bonds[3]['code']);
            $update_account_statement_exec = mysqli_query($con, $update_account_statement_query);
        }
    }
    // open_window_self_id(COM_BILL , $current_bill_id_to_update);
}

?>

<!-- DELETE BILL -->
<?php
if (isset($_POST['delete'])) {
    // Delete Bill
    $delete_bill_query = delete('bills').where('code' , $current_bill_code);
    $delete_bill_exec = mysqli_query($con , $delete_bill_query);
    
    // Delete Bill_item
    $current_bill_id_to_delete = getId($con , 'bills' , 'code' , $current_bill_code);
    $delete_bill_item_query = delete('bill_item').where('bill_id' , $current_bill_id_to_delete);
    $delete_bill_item_exec = mysqli_query($con , $delete_bill_item_query);

    // Delete mid_bonds after git codes from it
    $select_mid_bonds_query = select('mid_bonds') . where('bill_id', $current_bill_id_to_delete);
    $select_mid_bonds_exec = mysqli_query($con, $select_mid_bonds_query);
    $mid_bonds = [];
    while ($mid_bond = mysqli_fetch_array($select_mid_bonds_exec)) {
        $mid_bonds[] = $mid_bond;
    }
    $delete_mid_bonds_query = delete('mid_bonds').where('bill_id' , $current_bill_id_to_delete);    
    $delete_mid_bonds_exec = mysqli_query($con , $delete_mid_bonds_query);

    // Delete account_statement
    $delete_account_statement_query = delete('account_statements').where('code_type' , 'bills').andWhere('code_number' , $current_bill_id_to_delete);
    $delete_account_statement_exec = mysqli_query($con , $delete_account_statement_query);
    foreach($mid_bonds as $mid_bond){
        $delete_account_statement_query = delete('account_statements').where('code_type' , 'mid_bonds').andWhere('code_number' , $mid_bond['code']);
        $delete_account_statement_exec = mysqli_query($con , $delete_account_statement_query);
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

<!-- Add values to table if next or previous -->
<?php

$current_bill_id_to_search = getId($con, 'bills', 'code', $current_bill_code_for_item_search);
$select_items_using_id_query = "select DISTINCT * from bill_item, items where bill_id = '" . $current_bill_id_to_search . "'
and items.id = bill_item.item_id";
$select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
$items = [];
while ($item = mysqli_fetch_array($select_items_using_id_exec)) {
    $items[] = $item;
}
for ($i = 0; $i < 5; $i++)
    if (isset($items[$i]))
        echo "<script>
        document.getElementById('items_' + $i).value = '" . @get_name_and_code_from_table_using_id($con, 'items', $items[$i]['item_id']) . "';
        document.getElementById('units_' + $i).value = '" . @$items[$i]['unit'] . "';
        document.getElementById('total_weights_' + $i).value = '" . @$items[$i]['total_weight'] . "';
        document.getElementById('real_weights_' + $i).value = '" . @$items[$i]['real_weight'] . "';
        document.getElementById('prices_' + $i).value = '" . @$items[$i]['price'] . "';
        document.getElementById('total_item_prices_' + $i).value = '" . @$items[$i]['total_item_price'] . "';
        document.getElementById('note_' + $i).value = '" . @$items[$i]['bill_item_note'] . "';
</script>"
?>


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
<script>
    document.getElementById('code').onkeyup = function(event) {
        if (event.keyCode == 13) {
            document.getElementById('current').click();
        }
    };
</script>
<!-- End chec worng insertion -->