<?php
include('include/nav.php');
?>

<?php
if (isset($_POST['save'])) {
  $myFile = "config.json";
  $get_json = json_decode(file_get_contents($myFile), true);
  $get_json['printing']['page_size'] = $_POST['page_size'];
  if (isset($_POST['item_code']))
    $get_json['printing']['item_code'] = 'true';
  else
    $get_json['printing']['item_code'] = 'false';

  if (isset($_POST['seller_code']))
    $get_json['printing']['seller_code'] = 'true';
  else
    $get_json['printing']['seller_code'] = 'false';

  if (isset($_POST['buyer_code']))
    $get_json['printing']['buyer_code'] = 'true';
  else
    $get_json['printing']['buyer_code'] = 'false';

  // $get_json[''][]= $_POST[''];
  //  $stringData = $_POST['item'];
  file_put_contents($myFile, json_encode($get_json));
}
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
      <div class="active" id="printing_sidebar">الطباعة</div>
    </div>


    <div class="content">
      <!-- <section id="database_section">
        <div>قاعدة البيانات  سالب مدين/لنا
          دائن / علينا
        </div>
      </section> -->
      <section id="printing_section">
        <div>
          <div class="row" id="page_size">
            <div class="col">
                <label> قياس فاتورة البائع</label>
                <select class="form-control" name="page_size" id="">
                  <option value="A4" <?php if (get_value_from_config('printing', 'page_size') == 'A4') echo " selected" ?>> A4 </option>
                  <option value="A5" <?php if (get_value_from_config('printing', 'page_size') == 'A5') echo " selected" ?>> A5 </option>
                  <option value="A6" <?php if (get_value_from_config('printing', 'page_size') == 'A6') echo " selected" ?>> A6 </option>
                </select>
              </div>

              <div class="col">
                <label> قياس فاتورة المشتري</label>
                <select class="form-control" name="" id="">
                  <option value="A4" <?php if (get_value_from_config('printing', 'page_size') == 'A4') echo " selected" ?>> A4 </option>
                  <option value="A5" <?php if (get_value_from_config('printing', 'page_size') == 'A5') echo " selected" ?>> A5 </option>
                  <option value="A6" <?php if (get_value_from_config('printing', 'page_size') == 'A6') echo " selected" ?>> A6 </option>
                </select>
              </div>

              <div class="col">
                <label>قياس السندات </label>
                <select class="form-control" name="" id="">
                  <option value="A4" <?php if (get_value_from_config('printing', 'page_size') == 'A4') echo " selected" ?>> A4 </option>
                  <option value="A5" <?php if (get_value_from_config('printing', 'page_size') == 'A5') echo " selected" ?>> A5 </option>
                  <option value="A6" <?php if (get_value_from_config('printing', 'page_size') == 'A6') echo " selected" ?>> A6 </option>
                </select>
              </div>

                <div class="col">
                <label>قياس ورقة التقارير </label>
                <select class="form-control" name="" id="">
                  <option value="A4" <?php if (get_value_from_config('printing', 'page_size') == 'A4') echo " selected" ?>> A4 </option>
                  <option value="A5" <?php if (get_value_from_config('printing', 'page_size') == 'A5') echo " selected" ?>> A5 </option>
                  <option value="A6" <?php if (get_value_from_config('printing', 'page_size') == 'A6') echo " selected" ?>> A6 </option>
                </select>
              </div>

            
          </div>
          <div>
            <label class="container">رمز المادة
              <input name="item_code" type="checkbox" <?php if (get_value_from_config('printing', 'item_code') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>
          <div>
            <label class="container">رمز البائع
              <input name="seller_code" type="checkbox" <?php if (get_value_from_config('printing', 'seller_code') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>

          <div>
            <label class="container">رمز المشتري
              <input name="buyer_code" type="checkbox" <?php if (get_value_from_config('printing', 'buyer_code') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </section>
      <button type="submit" name="save" class="btn badge-success">حفظ</button>
    </div>
  </form>
</body>




<?php
include('include/footer.php');
?>


<script>
  $('#printing_sidebar').click(function() {
    $('#printing_section').show();
    $('#printing_sidebar').prop('class', 'active');

    $('#database_section').hide();
    $('#database_sidebar').removeClass('active');
  });


  $('#database_sidebar').click(function() {
    $('#database_section').show();
    $('#database_sidebar').prop('class', 'active');

    $('#printing_section').hide();
    $('#printing_sidebar').removeClass('active');
  });
</script>