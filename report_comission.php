<?php
include('include/nav.php');
?>


<?php
    if (isset($_POST['print'])) {
        @open_window_blank("print.php?comission_report=comission_report&from_date=" . $_POST['from_date'] . "&to_date=" . $_POST['to_date'] . "&radio_value=" . $_POST['radio_search'] . "&text_value=" . $_POST['text_search']);
    }
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles/report_comission.css">
    <title>Document</title>
</head>


<body>
    <div class="container-fluid">
        <form action="" method="post">
            <div class="row justify-content-start px-5 py-2">
                <h3> حركة كمسيون </h3>
            </div>
            <div class="row ">
                <div class="col-3">
                    <div class="row justify-content-end py-2"  id="radio_row">
                        <div class="col-md-4 text-left" >
                            <input checked type="radio" name="radio_search" id="form1" value="items">
                            <label for="form1" name="">المادة</label>

                        </div>
                        <div class="col-md-4 text-center">
                            <input type="radio" name="radio_search" id="form2" value="categories">
                            <label for="form2" name="">الصنف</label>
                        </div>
                        <div class="col-md-4 text-right" >
                            <input type="radio" name="radio_search" id="form3" value="accounts">
                            <label for="form3" name="">العميل</label>
                        </div>
                    </div>

                    <div class="row justify-content-center" id="search_row">
                        <div >
                            <input onclick="return this.value=''" type="text" class="form-control" name="text_search" id="text_search">
                        </div>
                        <div >
                            <button class= "btn" type="button" id="search" name="search">بحث</button>
                        </div>

                    </div>


                </div>
                <div class="col-4" id="date_row">
                    <div class="row justify-content-start py-1">
                        <label for="from_date">من تاريخ</label>
                        <div class="col-md-5">
                            <input class="form-control" type="date" name="from_date" id="from_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <label for="to_date">إلى تاريخ</label>
                        <div class="col-md-5">
                            <input class="form-control" type="date" name="to_date" id="to_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center py-4 ">
                <div class="col-11"  id="tableFixHead">
                    <table class=" table table-bordered table-hover text-center ">
                        <thead>
                            <tr>
                                <th>رقم الفاتورة </th>
                                <th>تاريخ الفاتورة </th>
                                <th>اسم المادة </th>
                                <th> الصنف </th>
                                <th>الوحدة </th>
                                <!-- <th>العملة </th> -->
                                <th> المشتري </th>
                                <th>البائع </th>
                                <th>قيمة الكمسيون </th>
                                <th>الاجمالي</th>
                            </tr>
                        </thead>
                        <tbody id='show'>
                            <?php
                            $total_comission = '0';
                            $total_bill = '0';
                            $real_bill = '0';
                            $select_items_using_id_query = "select DISTINCT items.code as item_code,
                                                            bills.code as bill_code,
                                                            bills.id as bill_id,total_item_price,
                                                            unit, date, buyer_id,seller_id,
                                                            name,currency,com_ratio,
                                                            com_value,category_id
                                                             from bill_item, items,bills 
                                                             where items.id = bill_item.item_id and bills.id = bill_item.bill_id";
                            $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
                            $counter_for_com_id = 0;
                            while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
                                $category_name = get_value_from_table_using_id($con, 'categories', 'name', $row['category_id']);
                                $buyer_name = get_name_from_table_using_id($con, 'accounts', $row['buyer_id']);
                                $seller_name = get_name_from_table_using_id($con, 'accounts', $row['seller_id']);
                                $bill_code = get_value_from_table_using_id($con, 'bills', 'code', $row['bill_id']);
                                echo "<tr ondblclick='window.open(\"com_bill.php?code=" . $bill_code . "\" , \"_self\")'>";
                                echo "<td>" . $row['bill_code'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $category_name . "</td>";
                                echo "<td>" . $row['unit'] . "</td>";
                                // echo "<td>" . $row['currency'] . "</td>";
                                echo "<td>" . $buyer_name . "</td>";
                                echo "<td>" . $seller_name . "</td>";
                                $current_com_value = ($row['com_ratio'] / 100) * $row['total_item_price'];
                                echo "<td id='com_" . $counter_for_com_id++ . "'>" . $current_com_value . "</td>";
                                echo "<td>".$row['total_item_price']."</td>";
                                echo "</tr>";
                                $total_comission += $current_com_value;
                                $total_bill += $row['total_item_price'];
                            }
                            $real_bill = $total_bill - $total_comission;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-start " id="total_row">
                <div class="px-1">
                    <label for="">إجمالي الفواتير: </label>
                    <input  type="text" readonly id="total_bill" value="<?= $total_bill ?>">
                </div>

                <div class="px-1">
                    <label for="">قيمة الكمسيون: </label>
                    <input type="text" readonly id="total_comission" value="<?= $total_comission ?>">
                </div>

                <div>
                    <label for="" class="px-1">صافي الفواتير: </label>
                    <input type="text" readonly id="real_bill" value="<?= $real_bill ?>">
                </div>
            </div>
            <div class="row justify-content-end py-2">
                <div class="col-2">
                    <button type="submit" name="print">طباعة</button>
                    <button type="submit" name="close">إغلاق</button>
                </div>
            </div>

        </form>
    </div>
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


        var tags_items = [
            <?php
            $query =  select('items');
            $query_exec = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($query_exec)) {
                echo "'" . $row['code'] . " - " . $row['name'] . "',";
            }
            ?>
        ];
        var tags_catergories = [
            <?php
            $query =  select('categories');
            $query_exec = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($query_exec)) {
                echo "'" . $row['code'] . " - " . $row['name'] . "',";
            }
            ?>
        ];
        var tags_accounts = [
            <?php
            $query =  select('accounts') . whereNotEqual('account_id', 0);
            $query_exec = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($query_exec)) {
                echo "'" . $row['code'] . " - " . $row['name'] . "',";
            }
            ?>
        ];

        // Create autocomplete instances.
        $(function() {
            if ($('input[name=radio_search]:checked').val() == 'items')
                $(".text_search").autocomplete({
                    source: tags_items
                });
            if ($('input[name=radio_search]:checked').val() == 'accounts')
                $(".text_search").autocomplete({
                    source: tags_accounts
                });
            if ($('input[name=radio_search]:checked').val() == 'categories')
                $(".text_search").autocomplete({
                    highlightClass: "bold-text",
                    source: tags_catergories
                });

        });

        $('input[name=radio_search]').click(function() {
            $(".text_search").val('');
            if ($('input[name=radio_search]:checked').val() == 'items')
                $(".text_search").autocomplete({
                    source: tags_items
                });
            if ($('input[name=radio_search]:checked').val() == 'accounts')
                $(".text_search").autocomplete({
                    source: tags_accounts
                });
            if ($('input[name=radio_search]:checked').val() == 'categories')
                $(".text_search").autocomplete({
                    highlightClass: "bold-text",
                    source: tags_catergories
                });
        });
    })(jQuery);
</script>
<script>
    $(function() {
        $('#search').click(function() {
            var radio_value = $('input[name=radio_search]:checked').val();
            var text_value = $('#text_search').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            $.ajax({
                url: "search.php",
                method: "POST",
                data: {
                    radio_value: radio_value,
                    text_value: text_value,
                    from_date: from_date,
                    to_date: to_date
                },
                success: function(data) {
                    $('#show').fadeIn();
                    $('#show').html(data);
                    if (document.getElementById('total_hidden_comission') == null)
                        $('#total_comission').val('0');
                    else
                        $('#total_comission').val(document.getElementById('total_hidden_comission').value);

                    if (document.getElementById('total_hidden_bill') == null)
                        $('#total_bill').val('0');
                    else
                        $('#total_bill').val(document.getElementById('total_hidden_bill').value);

                    if (document.getElementById('real_hidden_bill') == null)
                        $('#real_bill').val('0');
                    else
                        $('#real_bill').val(document.getElementById('real_hidden_bill').value);
                }
            });

        });
    });
</script>