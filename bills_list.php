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
    <link rel="stylesheet" href="css/styles/bills_list.css">
</head>

<body>
    <form action="" method="POST">
        <div class="container-fluid">
                <div class="row justify-content-start px-5 py-3" id="header">
                    <h3 > قائمة الفواتير  </h3>
                </div>
            <div class="row py-4"   id="radio_row">
                <div>
                    <input name="search_bill" value="all_bills" id="all_bills" type="radio" checked />
                    <label class="radio_lbl" for="all_bills">جميع الفواتير</label>
                </div>
                                                             
                <div>
                    <input name="search_bill" value="not_sell_bills" id="not_sell_bills" type="radio" />
                    <label class="radio_lbl" for="not_sell_bills">الفواتير الغير مباعة</label>
                </div>
                
                <div>
                    <input name="search_bill" value="sell_bills" id="sell_bills"  type="radio" />
                    <label class="radio_lbl" for="sell_bills">الفواتير المباعة</label>
                </div>
               
                
                <!-- <button id="search" type="button" class="btn btn-primary">بحث</button> -->
        
                
            </div>
            <div class="row justify-content-center">
                <div class="col-10"  id="tableFixHead">
                    <table class="  table table-hover text-center">
                        <thead class="text-center bg-primary ">
                            <tr>
                                <th scope="col">رقم الفاتورة</th>
                                <th scope="col">البائع</th>
                                <th scope="col">الصافي</th>
                                <th scope="col">المشتري</th>
                                <th scope="col">الاجمالي</th>
                                <th scope="col">الحالة</th>
                                <th scope="col" >عمليات</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                            <?php
                            $select_all_bills_query = selectND('bills');
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
                                    echo "<td class=' text-white'><center> <div class='sold'> " . "مباعة" . "</div></center></td><td>
                                        <a href='com_bill.php?code=" . $row['code'] . "'><button type='button' class='btn btn-success'>عرض الفاتورة</button></a>
                                        </td>";
                                } else {
                                    echo "<td class='text-white' ><center> <div class='not_sold'>" . "غير مباعة" . "</div></center></td><td>
                                        <a href='com_bill.php?code=" . $row['code'] . "'><button type='button' class='btn btn-primary'>بيع الفاتورة</button></a>
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

<script>
    f1("help_file.php?bills_section");
</script>
