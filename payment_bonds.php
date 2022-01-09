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
    <link rel="stylesheet" href="css/styles/paymentBonds.css" media="print">
    <style>
        body {
            text-align: right;
            background-color: LightGray;
            position: relative;
        }

        .container {
            position: absolute;
            background-color: #5F9EA0;
            border-style: groove;
            border-radius: 25px;
            top:13% ;
            left:20%;
            width: 1000px ;
            height: 620px ;
            font-size: 17px;
            padding: 5px;

        }

        #res_number {
            column-width: 50px;
        }
        #res_num{
            padding-right: 125px;

        }
        h2,#inf_row{
            padding-right: 20px;
        }
        #btn-grp{
            border-radius: 4px;
            text-align: center;
            margin: 1px;
            width: 80px;
        }
    </style>
</head>

<body class="receipt">
    <form action="" method="post">
        <div class="container">
            <div class="row ">
                <div class="col-4" id="receipt_number1"  >
                    <h2> سند دفع</h2>
                </div>
                <div class="col-6 " id="receipt_number"  >
                    <div class="row" style=" padding-top: 10px;padding-right: 30px; ">
                        <label name=" "> رقم الإيصال</label>
                        <div class="col-md-3">
                            <input type="text" value="<?php echo get_auto_code($con, 'payment_bonds', 'code', '', 'parent') ?>" class="form-control" name="code" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-3" id="inf_row">
                <div id="account" class="col-sm-6 col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-6 col-md-3 col-form-label"> الحساب</label>
                        <div class="col-md-9" >
                            <input type="text" class="form-control" onclick="return this.value=''" name="main_account" id="main_account" value="<?= get_box_account($con) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-6 col-md-3 col-form-label ">التاريخ </label>
                        <div class="col-md-9" >
                            <input type="date" class="form-control" name="date" id="date" min="" max="" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
                <div id="currency_notes" class="col-sm-10 col-md-5">
                    <div class="form-group row">
                        <label class=" col-sm-6 col-md-3 col-form-label text-md-right">العملة </label>
                        <div class="col-md-8">
                            <select name="currency" class="form-control">
                                <option value="syrian-bounds">ليرة سورية</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-6 col-md-3 col-form-label text-md-right"> ملاحظات</label>
                        <div class="col-md-8">
                            <textarea rows="2" type="text" id="" class="form-control" name="notes"></textarea>
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
                    <input id="total" type="text" id="resault" class="form-control" name="total" >
                </div>
            </div>
            <div class="row justify-content-end  py-3 px-5">
                <div class="col-md-4" id='buttons'>
                    <button type="submit" class="" id="btn-grp" name="add">
                        إضافة
                    </button>
                    <button type="button" class="" id="btn-grp" name="print"
                     onclick="printBonds(['buttons', 'nav','currency_notes', 'account'])">
                        طباعة
                    </button>
                    <button type="button" class=" " id="btn-grp" name="close">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script src="js/scripts/paymentBonds.js"></script>
</body>

</html>

<?php
if (isset($_POST['add'])) {

    $main_account_code = get_code_from_input($_POST['main_account']);
    $main_account_id = getId($con, 'accounts', 'code', $main_account_code);

    foreach ($_POST['account'] as $key => $value) {
        if ($value != '' && $_POST['daen'][$key] != '') {
            $other_account_code = get_code_from_input($value);
            $other_account_id = getId($con, 'accounts', 'code', $other_account_code);
            $insert_payment_bond_query = insert('payment_bonds', [
                'main_account_id' => $main_account_id,
                'other_account_id' => $other_account_id,
                'daen' => $_POST['daen'][$key],
                'note' => $_POST['note'][$key],
                'code' => $_POST['code'],
                'date' => $_POST['date'],
                'currency' => $_POST['currency'],
                'main_note' => $_POST['notes']
            ]);
            $insert_payment_bond_exec = mysqli_query($con, $insert_payment_bond_query);
            /**
             * make account statements
             */
            // كشف حساب الصندوق
            $insert_account_statement_query = insert('account_statements', [
                'main_account_id' => $main_account_id,
                'other_account_id' => $other_account_id,
                'daen' => $_POST['daen'][$key],
                'note' => $_POST['note'][$key],
                'date' => $_POST['date'],
                'code_number' => $_POST['code'],
                'code_type' => 'payment_bonds'
            ]);
            message_box($insert_account_statement_query);
            $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);

            // كشف حساب القابض
            $insert_account_statement_query = insert('account_statements', [
                'main_account_id' => $other_account_id,
                'other_account_id' => $main_account_id,
                'maden' => $_POST['daen'][$key],
                'note' => $_POST['note'][$key],
                'date' => $_POST['date'],
                'code_number' => $_POST['code'],
                'code_type' => 'payment_bonds',
            ]);
            $insert_account_statement_exec = mysqli_query($con, $insert_account_statement_query);
        }
    }

    open_window_self('payment_bonds.php');
}
?>

<?php
include('include/footer.php');

?>
<script>
    let ids = ['number', 'daen', 'account', 'note'];
    let names = ['number[]', 'daen[]', 'account[]', 'note[]'];
    addRows('tbl', number_of_rows, names, ids);
</script>

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

        var tags = [
            <?php
            foreach (get_all_accounts($con) as $row) {
                echo print_account_to_tags_autocomplete($row);
            }
            ?>
        ];
        var tags_main_account = [
            <?php
            foreach (get_all_accounts_without_buying_selling($con) as $row) {
                echo print_account_to_tags_autocomplete($row);
            }
            ?>
        ];
        // Create autocomplete instances.
        $(function() {
            for (i = 0; i < document.getElementById('tbl').rows.length; i++) {
                $("#account_" + i).autocomplete({
                    highlightClass: "bold-text",
                    source: tags
                });
            }
        });
        $(function() {
            $("#main_account").autocomplete({
                highlightClass: "bold-text",
                source: tags_main_account
            });
        });

    })(jQuery);
</script>

<script>
    set_blur_to_input_ids_to_count_in_id('daen' , 'total' , number_of_rows);
</script>