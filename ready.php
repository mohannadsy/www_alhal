<?php
include 'include/nav.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-size: 17px;
            box-sizing: border-box;
            direction: rtl;
        }

        .container {
            width: 100%;
            height: 100%;
            margin: 5px;
            padding: 5px;

            display: inline-flex;
        }

        .row {
            display: flex;
            margin: 5px;
            padding: 5px;
            height: 300px;
            width: 100%;
        }

        img {
            height: 35%;
            width: 35%
        }

        a {
            color: #007bff;
            text-decoration: none;
            -webkit-text-decoration-skip: objects;
        }

        p {
            font-weight: 600;
            font-size: 17px;
            text-align: center;
            color: black;
            width: 100%;
        }

        .col-md-6 {
            text-align: center;
            display: inline;
            width: 122px;
            margin: 1px;
            padding: 10px;
            height: 110%;
        }

        .col-md-4 {
            padding-bottom: 10px;
            padding-bottom: -27px;
            display: grid;
            margin: 0px;
        }

        .row-md-4 {
            justify-content: center;
            padding: 9px;
            display: inline-flex;
            width: 100%;
            height: 100%;
            display: flex;

        }

        .col-md-12 {
            margin: 5px;
            padding: 5px;
            display: flex;
            height: 100px;
            justify-content: center;
        }

        s #final {
            justify-content: center;
        }
    </style>

</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4" style="background-color: #d4d8dc;">
                <div class="row-md-4">

                    <div class="col-md-6">

                        <a href="<?= COM_BILL ?>">
                            <img class="img" src="assets/images/bill.png" />
                            <br> <br>
                            <p> الفاتورة</p>
                        </a>
                    </div>


                    <div class="col-md-6">
                        <a href="<?= ACCOUNT_STATEMENT ?>">
                            <img class="img" src="assets/images/financial-icon-png-5746.png" />
                            <br> <br>

                            <p> كشف حساب </p>
                        </a>

                    </div>

                </div>


                <div class="row-md-4">
                    <div class="col-md-6">
                        <a href="<?= CATCH_BONDS ?>">
                            <img class="img" src="assets/images/purchase-order-512.png" />
                            <br> <br>

                            <p> سند قبض </p>
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="<?= PAYMENT_BONDS ?>">
                            <img class="img" src="assets/images/check-512.png" />
                            <br><br>
                            <p> سند دفع </p>
                        </a>
                    </div>



                </div>

                <form action="" method="post">
                    <div class="row-md-4" id="final">
                        <div class="col-md-12">
                            <button name="backup" id="backup" type="submit" style="background-color:rgba(0,0,0,0) ;">
                                <img class="img" style="width: 55px;height: 50px;padding: 0px;margin: 0px;margin-left: 22px;" src="assets/images/data-backup-512.png" />
                                <br> <br>
                                <p style="justify-content: center; margin-bottom: 2px ;"> النسخ الاحتياطي </p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['backup'])) {
                backup_to_file($con, get_value_from_config('database'));
            }
            ?>




        </div>

    </div>


</body>

</html>


<?php
include 'include/footer.php';
?>