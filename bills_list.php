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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles/bills_list.css">
</head>

<body>
    <form action="" method="POST">
        <div class="container-fluid">
            <div class="row py-4">

                <div class="col-4">
                    <label for="all_bills">جميع الفواتير</label>
                    <input name="search_bill" value="all_bills" id="all_bills" type="radio" checked />

                    <label for="not_sell_bills">الفواتير الغير مباعة</label>
                    <input name="search_bill" value="not_sell_bills" id="not_sell_bills" type="radio" />
                    
                    <label for="sell_bills">الفواتير المباعة</label>
                    <input name="search_bill" value="sell_bills" id="sell_bills"  type="radio" />
                    
                    <!-- <button id="search" type="button" class="btn btn-primary">بحث</button> -->

                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <table class=" text-center table table-bordered table-hover">
                        <thead class="text-center bg-primary ">
                            <tr>
                                <th scope="col">رقم الفاتورة</th>
                                <th scope="col">البائع</th>
                                <th scope="col">الصافي</th>
                                <th scope="col">الشاري</th>
                                <th scope="col">الاجمالي</th>
                                <th scope="col">الحالة</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                            <?php
                            $select_all_bills_query = select('bills');
                            $select_all_bills_exec = mysqli_query($con, $select_all_bills_query);
                            while ($row = mysqli_fetch_array($select_all_bills_exec)) {
                                echo "<tr>";
                                echo "<td>" . $row['code'] . "</td>";
                                $select_seller_query = selectWhereId('accounts', $row['seller_id']);
                                $select_seller_exec = mysqli_query($con, $select_seller_query);
                                $seller = mysqli_fetch_array($select_seller_exec);
                                echo "<td>" . $seller['code'] . " - " . $seller['name'] . "</td>";
                                echo "<td>" . $row['real_price'] . "</td>";

                                if ($row['buyer_id'] != '0') {
                                    $select_buyer_query = selectWhereId('accounts', $row['buyer_id']);
                                    $select_buyer_exec = mysqli_query($con, $select_buyer_query);
                                    $buyer = mysqli_fetch_array($select_buyer_exec);
                                    echo "<td>" . $buyer['code'] . " - " . $buyer['name'] . "</td>";
                                } else {
                                    echo "<td>" . "لا يوجد مشتري" . "</td>";
                                }
                                echo "<td>" . $row['total_price'] . "</td>";
                                if ($row['buyer_id'] != '0') {
                                    echo "<td style='background-color:green'>" . "مباعة" . "</td><td>
                                        <a href='com_bill_open.php?id=" . $row['id'] . "'><button type='button' class='btn btn-success'>عرض الفاتورة</button></a>
                                        </td>";
                                } else {
                                    echo "<td style='background-color:red'>" . "غير مباعة" . "</td><td>
                                        <a href='com_bill_open.php?id=" . $row['id'] . "'><button type='button' class='btn btn-primary'>بيع الفاتورة</button></a>
                                        </td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-11 offset-8 ">
                    <button type="button" class="btn btn-primary" name="close">
                        إغلاق

                    </button>

                </div>
            </div>
        </div>
    </form>
    <div id="show"></div>
</body>

</html>

<?php
include('include/footer.php');
?>


<script>
    $(function() {
        $('input[name=search_bill]').click(function() {
            var radio_bill_value = $('input[name=search_bill]:checked').val();
            $.ajax({
                url: "search.php",
                method: "POST",
                data: {
                    radio_bill_value: radio_bill_value
                },
                success: function(data) {
                    $('#show').fadeIn();
                    $('#show').html(data);
                }
            });
        });
    });
</script>