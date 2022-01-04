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
        }
        .container{
            background-color: #5F9EA0;
            border-style:groove;
               
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container">
            <div class="row py-2">
                <div class="col-8 " >
                    <div class="row py-2">
                        <label for="" class=" col-md-1 form-label"> الحساب</label>
                        <div class="col-md-4 has-validation">
                            <input class="account_auto form-control" type="text" name="account" id="" value="<?php if(isset($_POST['account'])) echo $_POST['account'] ?>"
                                    onclick="this.value=''" placeholder=" اسم الحساب" required >
                            <div class="invalid-feedback">اسم الحساب الخاص بك مطلوب</div>
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class=" col-md-1 form-label">العملة </label>
                        <div class="col-md-4">
                            <select name="currency" class="form-control">
                                <option value="syrian-bounds">ليرة سورية</option>
                            </select>
                        </div>
                    </div>
            
                </div>
                <div class="col-4">
                    <div class="row py-1">
                        <label for="from_date">من تاريخ</label>
                        <div class="col-md-7">
                            <input type="date" name="from_date" class="form-control" min="" max="" 
                                value="<?php if(isset($_POST['from_date'])) echo $_POST['from_date']; else echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="row ">
                        <label for="to_date">إلى تاريخ</label>
                        <div class="col-md-7">
                            <input type="date" name="to_date" class="form-control" id="" min="" max="" 
                                value="<?php if(isset($_POST['to_date'])) echo $_POST['to_date']; else echo date('Y-m-d') ?>">
                        </div>
                    </div>
                </div>
            </div>

            <?php
                if (isset($_POST['view'])) {
                    echo "<h2 class='text-center'> كشف حساب : " . $_POST['account'] . "</h2>";
                    
                }
                ?>
            <div class="row justify-content-center">
                <div class="col-10">
                
                    <table contenteditable='true' class="table table-bordered table-hover " name="table" id="tbl2">
                        <thead class="text-center">
                            <tr>
                                <th contenteditable='false'>التاريخ</th>
                                <th contenteditable='false'>مدين</th>
                                <th contenteditable='false'>دائن</th>
                                <th contenteditable='false'>الحساب المقابل</th>
                                <th contenteditable='false'>البيان</th>
                                <!-- <th contenteditable='false'>رقم الحركة</th>
                                <th contenteditable='false'>اسم الحركة</th> -->
                                <!-- <th contenteditable='false'>القيمة</th> -->
                                <th contenteditable='false'>رصيد الحركة</th>

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
                                    if($row['code_type'] == 'accounts') { // accounts -> رصيد افتتاحي
                                        $account_id = getId($con , 'accounts' , 'code' , $row['code_number']);
                                        $href_link = "account_card.php?id=$account_id";
                                    }
                                    if($row['code_type'] == 'bills') { // bills -> السطر تابع لفاتورة
                                        $bill_id = getId($con , 'bills' , 'code' , $row['code_number']);
                                        $href_link = "com_bill_open.php?id=$bill_id";
                                    }
                                    
                                    if($row['code_type'] == 'payment_bonds') { // bills -> السطر تابع لفاتورة
                                        $payment_bond_id = getId($con , 'payment_bonds' , 'code' , $row['code_number']);
                                        $href_link = "payment_bonds_open.php?id=$payment_bond_id";
                                    }
                                    
                                    if($row['code_type'] == 'bills') { // bills -> السطر تابع لفاتورة
                                        $bill_id = getId($con , 'bills' , 'code' , $row['code_number']);
                                        $href_link = "com_bill_open.php?id=$bill_id";
                                    }
                                    ///////////// End make links section //////////


                                    echo "<tr ondblclick='window.open(\"$href_link\" , \"_self\")'>";
                                    echo "<td>" . $row['date'] . "</td>";
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
            <div class="row justify-content-end py-2">
                <div class="col-3">
                    <button type="submit" class="btn btn-secondary" name="view">معاينة</button>
                    <button type="submit" name="" class="btn btn-secondary">طباعة</button>
                    <button type="submit"class="btn btn-secondary">إغلاق</button>
                    
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