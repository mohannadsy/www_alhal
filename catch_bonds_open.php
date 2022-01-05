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
        }

        .container {
            background-color: #5F9EA0;
            border-style: groove;
            /* width: 50%; */
            margin-top: 5%;
        }

        #res_number {
            column-width: 50px;
        }
    </style>
</head>

<?php
$catch_bond = [];
if (isset($_GET['id'])) {
    $select_catch_bond_query = selectWhereId('catch_bonds' , $_GET['id']);
    $select_catch_bond_exec = mysqli_query($con , $select_catch_bond_query);
    $catch_bond = mysqli_fetch_array($select_catch_bond_exec);
}
?>

<body class="receipt">
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-4" id="receipt_number1">
                    <h2> سند قبض</h2>
                </div>
                <div class="col-6" id="receipt_number">
                    <div class="row justify-content-end" style="padding-top: 10px;">
                        <label name=" "> رقم الإيصال</label>
                        <div class="col-md-3">
                            <input type="text" value="<?= @$catch_bond['code'] ?>" class="form-control" name="code" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-3" style="background-color: #5F9EA0;">
                <div id="" class="col-sm-10 col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label"> الحساب</label>
                        <div class="col-md-6">
                            <input type="text" name="main_account" id="main_account" readonly value="<?= @get_name_and_code_from_table_using_id($con , 'accounts' , $catch_bond['main_account_id']) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label ">التاريخ </label>
                        <div class="col-md-6">
                            <input readonly type="date" class="form-control" name="date" id="date" min="" max="" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>
                <div id="" class="col-sm-10 col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">العملة </label>
                        <div class="col-md-6">
                            <select disabled name="currency" class="form-control">
                                <option value="syrian-bounds">ليرة سورية</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-md-4 col-form-label text-md-right"> ملاحظات</label>
                        <div class="col-md-6">
                            <textarea readonly rows="2" type="text" id="" class="form-control" name="notes"><?= @$catch_bond['main_note'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <table id="tbl" class=" text-center table table-bordered table-hover">
                        <thead class="text-center bg-primary ">
                            <tr>
                                <th scope="col">رقم</th>
                                <th scope="col">دائن</th>
                                <th scope="col">الحساب </th>
                                <th scope="col">ملاحظات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $select_all_catch_bonds_with_same_code_query = select('catch_bonds').where('code' , $catch_bond['code']);
                                $select_all_catch_bonds_with_same_code_exec = mysqli_query($con , $select_all_catch_bonds_with_same_code_query);
                                $counter = 1;
                                $total_payment = 0;
                                while ($catch_bond_from_code = mysqli_fetch_array($select_all_catch_bonds_with_same_code_exec)){
                                    echo "<tr>";
                                    echo "<td>" . $counter++ . "</td>";
                                    echo "<td>". $catch_bond_from_code['maden'] ."</td>";
                                    echo "<td>" . get_name_and_code_from_table_using_id($con , 'accounts' , $catch_bond_from_code['other_account_id']) . "</td>"; 
                                    echo "<td>" . $catch_bond_from_code['note'] . "</td>";
                                    echo "</tr>";

                                    $total_payment += $catch_bond_from_code['maden'];
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end px-5">
                <label for="code" class="col-form-label" id="res_number"> المجموع</label>
                <div class="col-md-2">
                    <input readonly id="code" type="text" id="resault" class="form-control" name="" value="<?= @$total_payment?>">
                </div>
            </div>
        </div>
    </form>
    <script src="js/scripts/paymentBonds.js"></script>
</body>

</html>



<?php
include('include/footer.php');

?>
