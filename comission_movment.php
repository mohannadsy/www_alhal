<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row justify-content-start">
        <h6>    حركة كمسيون  </h6>
    </div>

    <form action="" method="post"> 
            <div class="row justify-content-start">
                <div class="col-6">
                    <label for="buyer">البائع</label>
                    <input type="text" name="buyer">
                    <label for="seller">المشتري</label>
                    <input type="text" name="seller">
                </div>
            </div>
            <div class=" row justify-content-start" >
                <div class="col-8">
                    <label for="item">المادة</label>
                    <input type="text" name="item">
                    <label for="unit">الوحدة</label>
                    <input type="text" name="unit"> 
                    <label for="unit">الصنف</label>
                    <input type="text" name="unit"> 
                   
                </div>
            </div>
            
            <div class="row justify-content-start">
                <div class="col-6">
                    <label for="from_date">من تاريخ</label>
                    <input type="date" name="from_date"  value=" ">
                    <label for="to_date">إلى تاريخ</label>
                    <input type="date" name="to_date" value=" ">
                </div>
            </div>
             
            
            <div class="row justify-content-center">
                <label for="">نوع التقرير</label>
                <label for=""> تفصيلي </label>
                <input type="radio" name="report_type" id="">
                <label for=""> مختصر </label>
                <input type="radio" name="report_type" id="" checked>
            </div>
            <div class="row justify-content-end">
                <button type="submit" name="view">معاينة</button>
                <button type="submit" name="print">إغلاق</button>
            </div>
    
    </form>


</body>
</html>

<?php

    if(isset($_POST['view'])){
        echo "view";
    }

   
?>

<?php
include('include/footer.php');
?>