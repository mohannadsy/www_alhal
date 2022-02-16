
<?php 
// require 'vendor/autoload.php';
    include('css.php'); 
    @include('sql/connection.php');
    include('sql/sql_queries.php');
    include('helper/config_functions.php');
    include('helper/operation_functions.php');
    include('helper/database_functions.php');
    include('helper/javascript_functions.php');
    include('helper/ready_queries_functions.php');
    include('helper/notification_functions.php');
    include('helper/html_functions.php');
    include('helper/links.php');
?>
<?php
if (isset($_POST['backup'])) {
    backup_to_file($con, get_value_from_config('database'));
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="fontawesom+e_v5_10_2.css"> -->
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/nav.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
</head>

<body>
    <!-- Start Header -->
    <header id="nav">
        <div class="wrapper" >
            <!-- Brand Image -->
            <!-- <a href="#" class="logo"><img src="/images/markuptag-white-logo.png" alt=""></a> -->
            <!--<i class="toggle-btn fas fa-bars"></i>-->
            <!-- Navbar -->
            <nav class="nav-menus">
                <li><a href="main_page.php"><i class="fas fa-home"></i> الرئيسية</a></li>
                <li class="sub-menus"><a href="#"><i class='fas fa-folder-open fa-9x' style='color:#ffffff; padding-left:5px;'></i>ملف</a>
                    <ul>
                        <li><a href="open_file.php"> فتح ملف</a></li>
                        <li><a href="#" onclick="document.getElementById('modal_restore_db_button').click()"> استيراد نسخة احتياطية</a></li>
                        <li><a href="#" onclick="document.getElementById('backup').click()"> النسخ الاحتياطي</a></li>
                    </ul>
                </li>
                <form action="" method="post">
                <button type="submit" hidden name="backup" id="backup"></button>
              </form>

                <li class="sub-menus"><a href="#"><i class="fas fa-users" style='color:#ffffff'></i> حسابات</a>
                    <ul>
                        <li><a href="account_card.php"> بطاقة حساب</a></li>
                        <li><a href="accountStatment.php"> كشف حساب</a></li>
                        <li><a href="account_list.php"> قائمة حسابات</a></li>
                        <li><a href="report_comission.php"> تقرير حركة كمسيون</a></li>
                    </ul>
                </li>
                <li class="sub-menus"><a href="#"><i class='fas fa-dolly-flatbed fa-9x' style='color:#ffffff'></i> مواد</a>
                    <ul>
                        <li><a href="category_card.php"> بطاقة صنف</a></li>
                        <li><a href="item_card.php"> بطاقة مادة</a></li>
                        <li><a href="item_list.php"> قائمة المواد</a></li>
                        <li><a href="report_item.php"> تقرير حركة مادة</a></li>
                    </ul>
                </li>
                <li class="sub-menus"><a href="#"><i class="fas fa-align-left" style='color:#ffffff'></i> فواتير</a>
                    <ul>
                        <li><a href="com_bill.php"> فاتورة جديدة</a></li>
                        <li><a href="bills_list.php"> قائمة الفواتير</a></li>
                    </ul>
                </li>
                <li class="sub-menus"><a href="#"><i class='fas fa-copy fa-9x' style='color:#ffffff'></i> سندات</a>
                    <ul>
                        <li><a href="payment_bonds.php"> سند دفع</a></li>
                        <li><a href="catch_bonds.php"> سند قبض</a></li>
                    </ul>
                </li>
                <li><a href="setting.php"><i class='fas fa-cogs fa-9x' style='color:#ffffff'></i> الإعدادات</a></li>
                <li><a href="help_file.php"><i class="fas fa-align-left"></i> معلومات</a></li>
                <li><a href="about.php"><i class='fas fa-info-circle fa-9x' style='color:#ffffff'></i> حول</a></li>
                <li><a onclick="window.history.back()" style='color:#ffffff; cursor:pointer'><i class='fas fa-share fa-9x' style='color:#ffffff'></i> عودة</a></li>
                
            </nav>
        </div>
    </header>
    <!-- End Header -->


    <!-- Toggle jQuery for Small Devices -->
    <!-- <script type="text/javascript">
        $(".toggle-btn").click(function() {
            $(this).toggleClass("fa-times");
            $(".nav-menus").toggleClass("active");
        });
    </script> -->
</body>

</html>
<!--
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>

<link rel="stylesheet" href="css/nav.css">
-->
<!-- <nav class="navbar navbar-expand-lg navbar-dark">
<div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarLinks">
    <ul class="navbar-nav">
      <li class="nav-item @@home">
        <a class="nav-link" href="ready.php">Home</a>
      </li>
      <li class="nav-item dropdown @@blogs">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ملف</a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item @@blog" href="open_file.php">ملف جديد</a></li>
            <li><a class="dropdown-item @@blogDetails" href="">استيراد </a></li>
          </ul>
      </li>

    </ul>
    </div>
</div>
</nav> -->

 

<button hidden id="modal_restore_db_button" class="login-trigger" href="#" data-target="#modal_restore_db" data-toggle="modal">بطاقة حساب </button>
<div id="modal_restore_db" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" id="modal_dialog_account">

        <div class="modal-content" id="modal_content_account">
            <div class="modal-header"  id="modal_header_account">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" margin-right: 10px;">
                    <span aria-hidden="true" >&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_body_account">
                
                <iframe  id="iframe_restore_db" src="restore_db.php#container" frameborder="0"></iframe>
               
            </div>
        </div>
    </div>
</div>


<!--
<html dir="rtl" lang="ar">
<ul id='nav' class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active " href="main_page.php">الرئيسية</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >ملف</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="open_file.php" >فتح ملف</a>
      <a class="dropdown-item" href="#">ملف جديد</a>
      <a class="dropdown-item" href="#" onclick="document.getElementById('modal_restore_db_button').click()">استيراد</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >حسابات</a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item"  href="account_card.php" >بطاقة حساب</a><li>
     <li> <a class="dropdown-item" href="accountStatment.php">كشف حساب</a></li>
      <li><a class="dropdown-item" href="account_list.php">قائمة حسابات  </a></li>
      <li><a class="dropdown-item" href="report_comission.php">تقرير حركة كمسيون  </a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >مواد</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item"  href="category_card.php" >بطاقة صنف</a></li>
      <li><a class="dropdown-item" href="item_card.php">بطاقة مادة</a></li>
      <li><a class="dropdown-item" href="item_list.php"> قائمة المواد</a></li>
      <li><a class="dropdown-item"  href="report_item.php" > تقرير حركة مادة</a></li>
    </ul>
  </li>
  
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >فواتير</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item"  href="com_bill.php" >فاتورة جديدة</a></li>
      <li><a class="dropdown-item" href="bills_list.php">قائمة الفواتير</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >سندات</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="payment_bonds.php" >سند دفع</a>
      <a class="dropdown-item" href="catch_bonds.php">سند قبض</a>
  </li> -->
  <!-- <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >حركات</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item"  href="report_item.php" > حركة مادة</a></li>
    </ul>
  </li> -->
  <!--
  <li class="nav-item">
    <a class="nav-link" href="setting.php">الإعدادات</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="help_file.php">معلومات</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="about.php">حول</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="test_index.php">Test</a>
  </li>
  
  
  <li class="nav-item">
    <button class="nav-link" type="button" onclick="window.history.back()">BACK</button>
  </li>
  <li class="nav-item">
    <button class="nav-link" type="button" onclick="window.location.reload()">Reload</button>
  </li>
  <li class="nav-item">
    <button class="nav-link  fixed-top" type="button" onclick="scrollToTop()">UP</button>
  </li>
  
</ul>
</html> -->


<script>
  $('#iframe_restore_db').load(function() {
        $('#iframe_restore_db').contents().find('#nav').hide();
        // $('#iframe_restore_db').contents().find('#container').css( {"margin-top":"-10%","margin-left":"-17%"});
    });
</script>