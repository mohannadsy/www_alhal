
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

<html dir="rtl" lang="ar">
<ul id='nav' class="nav nav-tabs navbar-light bg-light">
  <li class="nav-item">
    <a class="nav-link active" href="ready.php">Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
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
      <a class="dropdown-item"  href="account_card.php" >إنشاء حساب</a>
      <a class="dropdown-item" href="accountStatment.php">كشف حساب</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >مواد</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="category_card.php" >إنشاء صنف</a>
      <a class="dropdown-item" href="item_card.php">إنشاء مادة</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" 
    aria-expanded="false" >سندات</a>
    <div class="dropdown-menu">
      <a class="dropdown-item"  href="payment_bonds.php" >سند قبض</a>
      <a class="dropdown-item" href="catch_bonds.php">سند دفع</a>
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
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
  <li class="nav-item">
    <button class="nav-link" type="button" onclick="window.history.back()">BACK</button>
  </li>
  <li class="nav-item">
    <button class="nav-link" type="button" onclick="window.location.reload()">Reload</button>
  </li>
</ul>
</html>