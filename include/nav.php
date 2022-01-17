
<?php 
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
<link rel="stylesheet" href="css/nav.css">

<html dir="rtl" lang="ar">
<ul id='nav' class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active " href="ready.php">Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >ملف</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="open_file.php" >فتح ملف</a>
      <a class="dropdown-item" href="#">ملف جديد</a>
      <a class="dropdown-item" href="#">استيراد</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >حسابات</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="account_card.php" >بطاقة حساب</a>
      <a class="dropdown-item" href="accountStatment.php">كشف حساب</a>
      <a class="dropdown-item" href="account_list.php">قائمة حسابات  </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >مواد</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="category_card.php" >بطاقة صنف</a>
      <a class="dropdown-item" href="item_card.php">بطاقة مادة</a>
      <a class="dropdown-item" href="item_list.php"> قائمة المواد</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >سندات</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="payment_bonds.php" >سند دفع</a>
      <a class="dropdown-item" href="catch_bonds.php">سند قبض</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >حركات</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="report_item.php" > حركة مادة</a>
      <a class="dropdown-item" href="report_comission.php">حركة كمسيون </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="test_index.php">Test</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="test_noor.php">Nour</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="test_sara.php">Sara</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="test_rgd.php">Raghad</a>
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
</html>