<?php
include('include/nav.php');
?>

<?php
if (isset($_POST['save'])) {
  $myFile = "config.json";
  $get_json = json_decode(file_get_contents($myFile), true);
  $get_json['printing']['selling_bill_page_size'] = $_POST['selling_bill_page_size'];
  $get_json['printing']['buying_bill_page_size'] = $_POST['buying_bill_page_size'];
  $get_json['printing']['bonds_page_size'] = $_POST['bonds_page_size'];
  $get_json['printing']['reports_page_size'] = $_POST['reports_page_size'];
  $get_json['printing']['location'] = $_POST['location'];
  $get_json['printing']['company_name'] = $_POST['company_name'];
  $get_json['printing']['commercial_record'] = $_POST['commercial_record'];
  $get_json['printing']['first_name'] = $_POST['first_name'];  
  $get_json['printing']['second_name'] = $_POST['second_name'];  
  $get_json['printing']['first_num'] = $_POST['first_num'];  
  $get_json['printing']['second_num'] = $_POST['second_num'];  
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

  if (isset($_POST['account_code']))
    $get_json['printing']['account_code'] = 'true';
  else
    $get_json['printing']['account_code'] = 'false';

  if (isset($_POST['only_layra']))
    $get_json['printing']['only_layra'] = 'true';
  else
    $get_json['printing']['only_layra'] = 'false';

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
      <section id="printing_section">
          <div class="mt-3">
            <h4 class="mt-3" > <span id="line_span"></span>بيانات الشركة</h4>
            
            <table id="tbl_data_header">
              <tbody>
                <tr>
                  <td>
                    <label> اسم الشركة</label>
                  </td>
                  <td>
                    <input name="company_name" class="form-control" value="<?php echo get_value_from_config('printing' , 'company_name') ?>">
                  </td>
                  <td id="padding_col">
                  </td>
                  <td>
                    <label>العنوان </label>
                  </td>
                  <td>
                    <input name="location" class="form-control" value="<?php echo get_value_from_config('printing' , 'location') ?>">
                  </td>
                  <td>
                    <label> الترخيص </label>
                  </td>
                  <td>
                    <input name="commercial_record" class="form-control" value="<?php echo get_value_from_config('printing' , 'commercial_record') ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label> الاسم الأول</label>
                  </td>
                  <td>
                    <input name="first_name" class="form-control" value="<?php echo get_value_from_config('printing' , 'first_name') ?>">
                  </td>
                  <td id="padding_col">
                  </td>
                  <td>
                    <label>الرقم الأول </label>
                  </td>
                  <td>
                    <input name="first_num" class="form-control" value="<?php echo get_value_from_config('printing' , 'first_num') ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label> الاسم الثاني</label>
                  </td>
                  <td>
                    <input name="second_name" class="form-control" value="<?php echo get_value_from_config('printing' , 'second_name') ?>">
                  </td>
                  <td id="padding_col">
                  </td>
                  <td>
                    <label>الرقم الثاني </label>
                  </td>
                  <td>
                    <input name="second_num" class="form-control" value="<?php echo get_value_from_config('printing' , 'second_num') ?>">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        
          

        <div id="second_row" class="mt-4">
          <h4  class="mb-4"><span id="line_span"></span>خيارات الإظهار</h4>
          <div id="item_code" class="">
            <label class="container">رمز المادة
              <input name="item_code" type="checkbox" <?php if (get_value_from_config('printing', 'item_code') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>
      <!--    <div>
            <label class="container">رمز البائع
              <input name="seller_code" type="checkbox" <?php // if (get_value_from_config('printing', 'seller_code') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>

          <div>
            <label class="container">رمز المشتري
              <input name="buyer_code" type="checkbox" <?php // if (get_value_from_config('printing', 'buyer_code') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>
        </div> --> 
        <div>
            <label class="container">رمز الحساب
              <input name="account_code" type="checkbox" <?php  if (get_value_from_config('printing', 'account_code') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>

        <div>
            <label class="container">التفقيط
              <input name="only_layra" type="checkbox" <?php  if (get_value_from_config('printing', 'only_layra') == 'true') echo " checked" ?>>
              <span class="checkmark"></span>
            </label>
          </div>  
        </div>

        

        <div id="printing_options" class="mt-4">
          <h4><span id="line_span"></span>خيارات الطباعة</h4>
          <table id="tbl_print_op">
            <tbody>
              <tr>
                <td>
                  <label> قياس فاتورة البائع</label>
                </td>
                <td>
                <select class="form-control" name="selling_bill_page_size" id="buyer_select">
                    <option value="A4" <?php if (get_value_from_config('printing', 'selling_bill_page_size') == 'A4') echo " selected" ?>> A4 </option>
                    <option value="A5" <?php if (get_value_from_config('printing', 'selling_bill_page_size') == 'A5') echo " selected" ?>> A5 </option>
                    <option value="A6" <?php if (get_value_from_config('printing', 'selling_bill_page_size') == 'A6') echo " selected" ?>> A6 </option>
                  </select>
                </td>
                <td id="padding_col">

                </td>
                <td>
                  <label>قياس السندات </label>
                </td>
                <td>
                <select class="form-control" name="bonds_page_size" id="seller_select">
                    <option value="A4" <?php if (get_value_from_config('printing', 'bonds_page_size') == 'A4') echo " selected" ?>> A4 </option>
                    <option value="A5" <?php if (get_value_from_config('printing', 'bonds_page_size') == 'A5') echo " selected" ?>> A5 </option>
                    <option value="A6"  <?php if (get_value_from_config('printing', 'bonds_page_size') == 'A6') echo " selected" ?>> A6 </option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label> قياس فاتورة المشتري</label>
                </td>
                <td>
                <select class="form-control" name="buying_bill_page_size" id="bonds_select">
                    <option value="A4" <?php if (get_value_from_config('printing', 'buying_bill_page_size') == 'A4') echo " selected" ?>> A4 </option>
                    <option value="A5" <?php if (get_value_from_config('printing', 'buying_bill_page_size') == 'A5') echo " selected" ?>> A5 </option>
                    <option value="A6" <?php if (get_value_from_config('printing', 'buying_bill_page_size') == 'A6') echo " selected" ?>> A6 </option>
                  </select>
                </td>
                <td id="padding-col">

                </td>
                <td>
                <label>قياس ورقة التقارير </label>
                </td>
                <td>
                <select class="form-control" name="reports_page_size" id="report_select">
                    <option value="A4" <?php if (get_value_from_config('printing', 'reports_page_size') == 'A4') echo " selected" ?>> A4 </option>
                    <option value="A5" <?php if (get_value_from_config('printing', 'reports_page_size') == 'A5') echo " selected" ?>> A5 </option>
                    <option value="A6" <?php if (get_value_from_config('printing', 'reports_page_size') == 'A6') echo " selected" ?>> A6 </option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
         
      </section>
      <div class="row py-4 ">
        <div class="col-2 offset-2">
          <button type="submit" name="save" class="btn btn-light">حفظ</button>

        </div>
        
      </div>
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

<script>
    f1("help_file.php?setting_section");
</script>