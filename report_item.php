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
        body {
            text-align: right;
            background-color: LightGray;
        }

        .container {
            background-color: #5F9EA0;
            border-style: groove;

        }

        #form_input {
            text-align: right;
            border-radius: 5px;
        }

        #form_btn {
            text-align: right;
        }

        #from-date,
        #to-date {
            border-radius: 5px;

        }
    </style>

</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="row justify-content-start px-5 py-2">
                <h3> حركة مادة </h3>
            </div>
            <div class="row ">
                <div class="col-4">
                    <div class="row py-1">
                        <div class="col-md-4 text-center">
                            <input checked type="radio" name="radio_search" id="form1" value="items">
                            <label for="form1">المادة</label>

                        </div>
                        <div class="col-md-4 text-center">
                            <input type="radio" name="radio_search" id="form2" value="categories">
                            <label for="form2">الصنف</label>
                        </div>
                        <div class="col-md-4 text-center">
                            <input type="radio" name="radio_search" id="form3" value="accounts">
                            <label for="form3">العميل</label>
                        </div>
                    </div>

                    <div class="row justify-content-center py-2">
                        <div class="col-6">
                            <input type="text" class="text_search" name="text_search" id="text_search">
                        </div>
                        <div class="col-2">
                            <button type="button" name="search" id="search">بحث</button>
                        </div>

                    </div>

                </div>
                <div class="col-4">
                    <div class="row justify-content-center py-1 ">
                        <label for="from_date" class="col-3"> من تاريخ</label>
                        <div class="col-md-6">
                            <input type="date" name="from_date" id="from_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>

                    </div>
                    <div class="row justify-content-center py-1 ">
                        <label for="to_date" class="col-3">إلى تاريخ</label>
                        <div class="col-md-6 ">
                            <input type="date" name="to_date" id="to_date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>

            </div>

            <!-- <div class="row justify-content-start py-2">
                    <div class="col-md-2" id="form1">
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" type="radio" name="option" id="" value="">
                            <label class="form-check-label" for="buyer">المادة</label>
                        </div>
            
                    </div>
                    <div class="col-md-2" id="form2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="option" id="" value="">
                            <label class="form-check-label" for="seller">الصنف</label>
                        </div>
                    </div>
                    <div class="col-md-2" id="form3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="option" id="" value="">
                            <label class="form-check-label" for="item">العميل</label>
                        </div>
   
                    </div>
                    <div class="col-3"  id="form_input">
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-2" id="form_btn">
                        <button type="submit" class="btn btn-secondary" name="search">بحث</button>
                    </div>
        </div>
        <div class="row justify-content-center  py-2 ">
                    <label for="from_date">من تاريخ</label>
                    <div class="col-md-3">
                    <input type="date" name="from_date"  value=" " class="form-control">
                    </div>
                    <label for="to_date">إلى تاريخ</label>
                    <div class="col-md-3">
                    <input type="date" name="to_date" class="form-control" value=" ">
                    </div>
        </div> -->

            <div class="row justify-content-center py-2">
                <div class="col-11">
                    <table class=" table table-bordered table-hover text-center ">
                        <thead>
                            <tr>

                                <th colspan="3"></th>
                                <th colspan="2"> الإدخالات </th>

                                <th colspan="2">الإخراجات</th>
                                <th colspan="2">الرصيد</th>
                            </tr>
                            <tr>
                                <th> التاريخ </th>
                                <th> الفاتورة </th>
                                <th>اسم المادة </th>
                                <th> الكمية </th>
                                <th> السعر </th>
                                <th> الكمية </th>
                                <th> السعر </th>
                                <th> الكمية </th>
                                <th> السعر </th>
                            </tr>
                        </thead>
                        <tbody id='show'>
                            <?php
                            $select_items_using_id_query = "select DISTINCT items.code as item_code,
                                                            bills.code as bill_code,
                                                            bills.id as bill_id,
                                                            unit, date, buyer_id,seller_id,
                                                            category_id,
                                                            name,currency,
                                                            real_weight,real_price,
                                                            total_weight,total_price,
                                                            com_value,com_ratio
                                                             from bill_item, items,bills 
                                                             where items.id = bill_item.item_id and bills.id = bill_item.bill_id";
                            $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
                            while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
                                $category_name = get_value_from_table_using_id($con, 'categories', 'name', $row['category_id']);
                                // $buyer_name = get_name_from_table_using_id($con, 'accounts', $row['buyer_id']);
                                // $seller_name = get_name_from_table_using_id($con, 'accounts', $row['seller_id']);
                                echo "<tr ondblclick='window.open(\"com_bill_open.php?id=" . $row['bill_id'] . "\" , \"_self\")'>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['bill_code'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['real_weight'] . "</td>";
                                echo "<td>" . $row['real_price'] . "</td>";
                                $inbox_weight = $row['real_weight'];
                                $inbox_price = $row['real_price'];
                                $outbox_price = '0';
                                $outbox_weight = '0';
                                if ($row['buyer_id'] == 0)
                                    echo "<td>" . '0' . "</td>";
                                else{
                                    echo "<td>" . $row['real_weight'] . "</td>";
                                    $outbox_weight = $row['real_weight'];
                                }
                                if ($row['buyer_id'] == 0)
                                    echo "<td>" . '0' . "</td>";
                                else{
                                    echo "<td>" . $row['real_price'] . "</td>";
                                    $outbox_price = $row['real_price'];
                                }
                                echo "<td>" . ($inbox_weight - $outbox_weight) . "</td>";
                                echo "<td>" . ($inbox_price - $outbox_price) . "</td>";
                                echo "</tr>";

                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end py-2">
                <div class="col-2">
                    <button type="submit" name="close">إغلاق</button>
                    <button type="submit" name="print">طباعة</button>
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
                    radio_value_from_report_item: radio_value,
                    text_value_from_report_item: text_value,
                    from_date: from_date,
                    to_date: to_date
                },
                success: function(data) {
                    $('#show').fadeIn();
                    $('#show').html(data);
                }
            });

        });
    });
</script>