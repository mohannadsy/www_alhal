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
    <link rel="stylesheet" href="css/styles/main_page.css">
</head>

<body>
    <div class="row py-3">

        <div id="band">
            <div class="item">
                <a href="com_bill.php" class="card">
                    <article>
                        <center id="center_div">
                            <!--<div class="icons_div">
                                <img class="iconss" src="assets/images/bill.svg" alt="">
                            </div>-->
                            <h1>فاتورة</h1>
                        </center>
                    </article>
                    <div class="thumb" style="background-image: url('assets/images/casher2.jpeg');"></div>
                </a>
            </div>
            <div class="item">
                <a href="payment_bonds.php" class="card">
                    <article>
                        <center>
                            <!--<div class="icons_div">
                                 <img class="iconss" src="assets/images/file-arrow-up.svg" alt=""> 
                                <i class="fa fa-user"></i>
                            </div>-->
                            <h1>سند دفع</h1>
                        </center>
                    </article>
                    <div class="thumb" style="background-image: url('assets/images/catch_Receipt44.jpg');"></div>
                </a>
            </div>
            <div class="item">
                <a href="catch_bonds.php" class="card">

                    <article>
                        <center>
                           <!-- <div class="icons_div">
                                <img class="iconss" src="assets/images/file-arrow-down.svg" alt="">
                            </div>-->
                            <h1>سند قبض</h1>
                        </center>

                    </article>
                    <div class="thumb" style="background-image: url('assets/images/catch_Receipt22.jpg');"></div>
                </a>
            </div>
            <div class="item">
                <a href="accountStatment.php" class="card">
                    <article>
                        <center>
                           <!-- <div class="icons_div">
                                <img class="iconss" src="assets/images/accounting-svgrepo-com.svg" alt="">
                            </div>-->
                            <h1>كشف حساب</h1>
                        </center>

                    </article>
                    <div class="thumb" style="background-image: url(assets/images/Vector-Money.png);"></div>
                </a>
            </div>
            <div class="item" onclick="document.getElementById('backup').click()">
                <a href="#" class="card">
                    <article>
                        <center>
                           <!-- <div class="icons_div">
                                <img class="iconss" src="assets/images/backup-restore.svg" alt="">
                            </div>-->
                            <h1>النسخ الاحتياطي</h1>

                        </center>

                    </article>
                    <div class="thumb" style="background-image: url('assets/images/backup-host.png');"></div>
                </a>
            </div>

            <div class="item">
                <a href="setting.php" class="card">
                    <article>
                        <center>
                          <!--  <div class="icons_div">
                                <img class="iconss" src="assets/images/cogs-solid.svg" alt="">
                            </div>-->
                            <h1>الإعدادات</h1>
                        </center>

                    </article>
                    <div class="thumb" style="background-image: url(assets/images/maintenance-gears.png);"></div>
                </a>
            </div>

        </div>
    </div>
    <div id="calender">
        <p id="calender-day">
        </p>
        <p id="calender-date">
        </p>
        <p id="calender-month-year">
        </p>
    </div>
    <form action="" method="post">
        <button type="submit" hidden name="backup" id="backup"></button>
    </form>
</body>
<?php
if (isset($_POST['backup'])) {
    backup_to_file($con, get_value_from_config('database'));
}
?>
<script>
    function calender() {
        var day = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
        var month = ["كانون الثاني", "	شباط", "آذار", "نيسان", "أيار", "حزيران", "	تموز",
            "آب", "أيلول", "تشرين الأول", "تشرين الثاني", "	كانون الأول"
        ];
        var d = new Date();
        setText('calender-day', day[d.getDay()]);
        setText('calender-date', d.getDate());
        setText('calender-month-year', month[d.getMonth()] + ' ' + (1900 + d.getYear()));
    };

    function setText(id, val) {
        if (val < 10) {
            val = '0' + val;
        }
        document.getElementById(id).innerHTML = val;
    };

    // call calender()

    window.onload = calender;
</script>




<?php
include('include/footer.php');
?>