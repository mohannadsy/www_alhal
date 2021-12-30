<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style> 
    body{
    color: var(--bs-body-color);
    background-color: LightGray;
    text-align: right;
    line-height: ;
    }
    .container{
        margin-top: 8%;
        margin-right: 20%;
        border-style:groove;
        width: 60%;

    }
    #account_col{
        background-color:#5F9EA0;
        /* padding: 0px 50px 0px ; */
        

    }
    #connect_col{
        background-color:#5F9EA0 ;
        /* padding: 0px 50px 0px ; */
    }
    #button_col{
        background-color: #5F9EA0;
        padding: 5px;
        text-align: left;

    }
    #button-col button {
     }

    </style>
</head>

<body>
    <form action="" method="post">
        <div class="container">

            <!-- Messages Section -->
            <?php
            success_error_create_message('تم انشاء الحساب بنجاح', 'عئرا لم يتم انشاء الحساب بنجاح');
            success_error_update_message('تم تعديل الحساب بنجاح', 'عئرا لم يتم تعديل الحساب بنجاح');

            $account = [];
            if (isset($_GET['id'])) {
                $select_where_id = selectWhereId('accounts', $_GET['id']);
                $select_where_exec = mysqli_query($con, $select_where_id);
                $account = mysqli_fetch_array($select_where_exec);
            }
            ?>
            <div class="row">

                <div id="account_col" class="col-md-6">
                    <h4 class="mb-3">معلومات الحساب</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row ">
                            <div class="col-10">
                                <label for="code" class="col-form-label">رمز الحساب</label>
                                <div class="col-md-5">
                                    <input type="number" name="code" class="form-control" readonly value="<?php
                                                                        if (isset($account['code'])) echo $account['code'];
                                                                        else
                                                                            echo get_auto_code($con, "accounts", "code", "" , "child")  ?>">
                                </div>
                            </div>
                            <div class="col-10">
                            <label for="" class="form-label"> الحساب</label>
                                <div class="input-group has-validation">
                                    <input type="text" class="form-control" placeholder=" اسم الحساب" required value="<?php if (isset($account['name'])) echo $account['name'] ?>">
                                    <div class="invalid-feedback">اسم الحساب الخاص بك مطلوب</div>
                                </div>

                            </div>
                            <div class="col-10 py-3">
                            <label for="account_id" class="form-label"> الحساب الرئيسي</label>
                                
                            <select class="form-select" name="account_id" id="" required>
                                <option value="0"> حساب رئيسي</option>
                                <?php
                                    foreach (get_main_accounts($con) as $id => $value) {
                                    echo "<option value='$id'";
                                    if (isset($account['account_id']) && $id == $account['account_id']) echo ' selected ';
                                    echo ">$value</option>";
                                    }
                                ?>
                            </select> 
                                

                            </div>
                        </div>
                    </form>
                    <h4 class="mb-3"> الرصيدالافتتاحي</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-10">
                            <label for="credit" class="form-label"> له</label>
                                <div class="input-group">
                                    <input type="number" name="credit" class="form-control" id=""
                                    value="<?php if(isset($account['fund']) && $account['fund'] > 0) echo $account['fund'] ?>">
                                </div>
                            </div>
                            <div class="col-10">
                            <label for="debit" class="form-label"> عليه</label>
                                <div class="input-group">
                                    <input type="number" name="debit" class="form-control" id=""
                                    value="<?php if(isset($account['fund']) && $account['fund'] < 0) echo  trim($account['fund'] , '-') ?>">
                                </div>

                            </div>
                        </div>
                    </form>
                </div> 

                <div id="connect_col" class="col-md-6 ">
                <h4 class="mb-3">معلومات التواصل</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-10">
                                <label for="" class="form-label" >المحافظة </label>
                                <input type="text" class="form-control" id="" placeholder=""
                                value="<?php if(isset($account['state'])) echo $account['state'] ?>">

                            </div>
                            <div class="col-10">
                                    <label for="" class="form-label" >المدينة</label>
                                    <input type="text" class="form-control" id="" placeholder=""
                                    value="<?php if(isset($account['city'])) echo $account['city'] ?>">

                            </div>
                            <div class="col-10">
                                    <label for="" class="form-label" >مكان السكن</label>
                                    <input type="text" class="form-control" id="" placeholder=""
                                    value="<?php if(isset($account['location'])) echo $account['location'] ?>">

                            </div>
                            <div class="col-10">
                                    <label for="" class="form-label" >الهاتف</label>
                                    <input type="number" class="form-control" id="" placeholder=""
                                    value="<?php if(isset($account['phone'])) echo $account['phone'] ?>">


                            </div>
                            <div class="col-10">
                                    <label for="" class="form-label" >ملاحظات </label>
                                    <textarea rows="3" type="text" class="form-control" name="note"><?php if(isset($account['note'])) echo $account['note'] ?></textarea>

                            </div>
                        </div>
                    </form>
                    
                </div>
            </div> 





            <div class="row">
                <div class="col-md-12" id="button_col">

                <button type="submit" class="btn btn-primary " name="add">إضافة</button>

                <button type="submit" class="btn btn-primary" <?php if (!isset($account['name'])) echo "hidden" ?> name="update">تعديل</button>

                <button type="submit" class="btn btn-primary" hidden name="delete">حذف</button>

                <button type="button" class="btn btn-primary" name="close">إغلاق</button>
                </div>


            </div>
        </div>
    </form>
</body>

</html>

<?php



if (isset($_POST['add'])) {
    $credit = 0;
    $debit = 0;
    if ($_POST['credit'] != '')
        $credit = $_POST['credit'];
    if($_POST['debit'] != '')
        $debit = $_POST['debit'];
    $_POST['fund'] = $credit-$debit;
    $accounts =  insert('accounts', get_array_from_array($_POST, [
        'name', 'account_id', 'phone', 'state',
        'city', 'location', 'note', 'code', 'fund'
    ]));

    $accounts_exec = mysqli_query($con, $accounts);
    if ($accounts_exec)
        open_window_self('test_account_card.php?message_create=success');
}

if (isset($_POST['update'])) {
    $credit = 0;
    $debit = 0;
    if ($_POST['credit'] != '')
        $credit = $_POST['credit'];
    if($_POST['debit'] != '')
        $debit = $_POST['debit'];
    $_POST['fund'] = $credit-$debit;
    $accounts =  updateWhereId('accounts', $_GET['id'], get_array_from_array($_POST, [
        'name', 'account_id', 'phone', 'state',
        'city', 'location', 'note', 'code', 'fund'
    ]));

    $accounts_exec = mysqli_query($con, $accounts);
    if ($accounts_exec)
        open_window_self('test_account_card.php?id=' . $_GET['id'] . '&message_update=success');
}



?>


<?php
include('include/footer.php');
?>