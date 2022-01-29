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
  <link rel="stylesheet" href="css/styles/setting.css">
</head>

<body>
  <form action="" method="post">
    <div class="sidebar">
      <div class="active" id="database_sidebar" hidden>قاعدة البيانات</div>
      <div class="active" id="printing_sidebar" >الطباعة</div>
    </div>


    <div class="content">
      <!-- <section id="database_section">
        <div>قاعدة البيانات</div>
      </section> -->
      <section id="printing_section">
        <div>
          <div class="row" id="page_size">
            <label>حجم الصفحة</label>
            <select class="form-control"  name="" id="">
              <option value="0"> A4 </option>
              <option value="1"> A5 </option>
            </select>
          </div>
          <div>
            <label class="container">رمز المادة
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
          <div>
            <label class="container">رمز البائع
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        
          <div>
            <label class="container">رمز المشتري
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
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
