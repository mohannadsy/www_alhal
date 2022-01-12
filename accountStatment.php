<?php
include('include/nav.php');
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: right;
            background-color:LightGray;
            justify-content:center ;
        }
        .container{
            position: absolute;
            background-color: #5F9EA0;
            border-style:groove;
            border-radius: 25px;
            top:13% ;
            left:15%;
            font-size: 17px;
            padding: 5px;

        }
        #btn-grp{
            border-radius: 4px;
            text-align: center;
            margin: 1px;
            width: 80px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container">
        <div class="row justify-content-start px-5 py-2">
                    <h3> كشف حساب </h3>
                </div>
            <div class="row">
                <div class="col-3 "  >
                    <div class="row ">
                        <label for="" class=" col-md-3 form-label"> الحساب</label>
                        <div class="col-md-8  has-validation">
                            <input class="account_auto form-control " type="text" name="account" id="account_name" value="<?php if(isset($_POST['account'])) echo $_POST['account'] ?>"
                                    onclick="this.value=''" placeholder=" اسم الحساب"  required style="background-color: burlywood margin: left 5px;" >
                            <div class="invalid-feedback">اسم الحساب الخاص بك مطلوب</div>
                        </div>
                    </div>

                    <div class="row py-2">
                        <label for="" class=" col-md-3 form-label">العملة </label>
                        <div class="col-md-8">
                            <select name="currency" id="syrian-bounds"  class="form-control">
                                <option value="syrian-bounds" >ليرة سورية</option>
                            </select>
                        </div>
                    </div>
            
                </div>
                <div class="col-3 ">
                    <div class="row ">
                        <label for="from_date " >من تاريخ</label>
                        <div class="col-md-8">
                            <input type="date" name="from_date" id="from-date"  min="" max=""  class="form-control" 
                                value="<?php if(isset($_POST['from_date'])) echo $_POST['from_date']; else echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="row py-2">
                        <label for="to_date" >إلى تاريخ</label>
                        <div class="col-md-8">
                            <input type="date" name="to_date"  id="to-date" min="" max="" class="form-control" 
                                value="<?php if(isset($_POST['to_date'])) echo $_POST['to_date']; else echo date('Y-m-d') ?>">
                        </div>
                    </div>
                </div>
                <div class="col-4" >
                    <div class="row">
                            <label for="">نوع التقرير:</label>

                        <div class="col-3 text-right" >
                            <input type="radio" name=""  value="">
                            <label>مختصر</label>
                        </div>
                        <div class="col-4 text-right">
                            <input type="radio" name="" value="">
                            <label>تفصيلي</label>
                        </div>
                            

                        

                    </div>


                </div>
            </div>

            <?php
                if (isset($_POST['view'])) {
                    echo "<h2 class='text-center'> كشف حساب : " . $_POST['account'] . "</h2>";
                    
                }
                ?>
            <div class="row justify-content-center py-2">
                <div class="col-11">
                
                    <table contenteditable='true' class="table table-bordered table-hover " name="table" id="tbl2">
                        <thead class="text-center">
                            <tr>
                                <th contenteditable='false'>التاريخ</th>
                                <th contenteditable="false"> المستند</th>
                                <th contenteditable='false'>مدين</th>
                                <th contenteditable='false'>دائن</th>
                                <th contenteditable='false'>الحساب المقابل</th>
                                <th contenteditable='false'>رصيد الحركة</th>
                                <th contenteditable='false'>المادة</th>
                                <th contenteditable='false'> الوزن الصافي</th>
                                <th contenteditable='false'> الإفرادي</th>
                                <th contenteditable='false'>الإجمالي</th>
                                

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php

                            if (isset($_POST['view'])) {
                                $main_account_code = get_code_from_input($_POST['account']);
                                $select_main_accounta_id_using_code_query = "select id,code from accounts where code = '$main_account_code'";
                                $select_main_accounta_id_using_code_exec = mysqli_query($con, $select_main_accounta_id_using_code_query);
                                $main_account_id = 0;
                                if(mysqli_num_rows($select_main_accounta_id_using_code_exec) > 0)
                                $main_account_id = mysqli_fetch_row($select_main_accounta_id_using_code_exec)[0];
                                
                                $select_account_statements_query = select('account_statements').where('main_account_id' , $main_account_id)."
                                and date between '" . $_POST['from_date'] ."' and '". $_POST['to_date'] ."'";
                                $select_account_statements_exec = mysqli_query($con , $select_account_statements_query);
                                $current_currency = 0;
                                if(mysqli_num_rows($select_account_statements_exec) > 0)
                                while($row = mysqli_fetch_array($select_account_statements_exec)){
                                    $current_currency +=  ($row['maden'] - $row['daen']);
                                    /**
                                     * make links section
                                     */
                                    $href_link = 'accountStatment.php';
                                    $document_type = '';
                                    if($row['code_type'] == 'accounts') { // accounts -> رصيد افتتاحي
                                        $account_id = getId($con , 'accounts' , 'code' , $row['code_number']);
                                        $href_link = href_id(ACCOUNT_CARD , $account_id);
                                        $document_type = 'رصيد افتتاحي';
                                    }
                                    if($row['code_type'] == 'bills') { // bills -> السطر تابع لفاتورة
                                        $bill_id = getId($con , 'bills' , 'code' , $row['code_number']);
                                        $href_link = href_id(COM_BILL_OPEN , $bill_id);
                                        $document_type = 'فاتورة رقم ' . $row['code_number'];
                                    }
                                    if($row['code_type'] == 'mid_bonds') { // mid_bonds السطر تابع لسند قيد
                                        $bill_id = get_value_from_table_using_column($con , 'mid_bonds' , 'code' , $row['code_number'] , 'bill_id');
                                        $href_link = href_id(COM_BILL_OPEN , $bill_id);
                                        // $bill_code = get_code_from_table_using_id($con , 'bills' , $bill_id);
                                        $document_type = 'فاتورة رقم ' . $bill_id;
                                    }
                                    if($row['code_type'] == 'payment_bonds') { // تابع لسند الدفع
                                        $payment_bond_id = getId($con , 'payment_bonds' , 'code' , $row['code_number']);
                                        $href_link = href_id(PAYMENT_BONDS_OPEN , $payment_bond_id);
                                        $document_type = 'سند دفع رقم ' . $row['code_number'];;
                                    }
                                    
                                    if($row['code_type'] == 'catch_bonds') { // تابع لسند القبض
                                        $catch_bond_id = getId($con , 'catch_bonds' , 'code' , $row['code_number']);
                                        $href_link = href_id(CATCH_BONDS_OPEN , $catch_bond_id);
                                        $document_type = 'سند قبض رقم ' . $row['code_number'];;
                                    }
                                    
                                    ///////////// End make links section //////////


                                    echo "<tr ondblclick='window.open(\"$href_link\" , \"_self\")'>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $document_type . "</td>";
                                    echo "<td>" . $row['maden'] . "</td>";
                                    echo "<td>" . $row['daen'] . "</td>";
                                    $select_other_account_name_query = select('accounts' , ['id' , 'name']).where('id' , $row['other_account_id']);
                                    $select_other_account_name_exec = mysqli_query($con , $select_other_account_name_query);
                                    // echo "<td>" . $row['code_number'] . "</td>";
                                    echo "<td>" . mysqli_fetch_row($select_other_account_name_exec)[1] . "</td>";
                                    echo "<td>" . $row['note'] . "</td>";
                                    echo "<td>" . "$current_currency". "</td>";
                                    echo "</tr>";
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end py-3" style=" padding-left:150px; ">
                <label for="code" class="col-form-label" id="res_number"> المجموع</label>
                <div class="col-md-2">
                    <input readonly id="code" type="text" id="resault" class="form-control" name="" value="<?= @$total_payment?>">
                </div>
            </div>
            <div class="row justify-content-end py-2">
                <div class="col-4">
                    <button type="submit"  name="view" id="btn-grp">معاينة</button>
                    <button type="submit" name=""  id="btn-grp">طباعة</button>
                    <button type="submit" id="btn-grp">إغلاق</button>
                    
                </div>
            </div>


        </div>
    </form>
    <script src="js/scripts/accountStatment.js"></script>
</body>

</html>


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

        var tags = [
            <?php
            $query =  select('accounts');
            $query_exec = mysqli_query($con, $query);
            while ($row = mysqli_fetch_row($query_exec)) {
                echo "'$row[1] - $row[2]',";
            }
            ?>
        ];

        // Create autocomplete instances.
        $(function() {

            $(".account_auto").autocomplete({
                highlightClass: "bold-text",
                source: tags
            });

        });

    })(jQuery);
</script>