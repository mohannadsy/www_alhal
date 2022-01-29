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
  <!-- <link rel="stylesheet" href="css/styles/setting.css"> -->
  <style>
    body {
      margin: 0;
      font-family: "Lato", sans-serif;
      background-color: teal;

    }

    .sidebar {
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    .sidebar div {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }

    .sidebar div.active {
      background-color: #0033cc;
      color: white;
    }

    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }

    div.content {
      margin-right: 200px;
      padding: 1px 16px;
      height: 1000px;

    }

    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .sidebar a {
        float: left;
      }

      div.content {
        margin-left: 0;
      }
    }

    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }

    #account_statment {
      margin-right: 200px;
      margin-top: 20px;
    }
  </style>

</head>

<body>
  <form action="" method="post">
    <div class="sidebar">
      <div class="active" id="database_sidebar"  style="cursor: pointer;">قاعدة البيانات</div>
      <div  style="cursor: pointer;" id="printing_sidebar">الطباعة</div>
    </div>


    <div class="content">
      <section id="database_section">
        <div>قاعدة البيانات</div>
      </section>
      <section id="printing_section" style="display: none;">
        <div>الطباعة</div>
      </section>
    </div>
  </form>
</body>





<?php
include('include/footer.php');
?>


<script>
  $('#printing_sidebar').click(function(){
    $('#printing_section').show();
    $('#printing_sidebar').prop('class' , 'active');
    
    $('#database_section').hide();
    $('#database_sidebar').removeClass('active');
  });

  
  $('#database_sidebar').click(function(){
    $('#database_section').show();
    $('#database_sidebar').prop('class' , 'active');

    $('#printing_section').hide();
    $('#printing_sidebar').removeClass('active');
  });
</script>
