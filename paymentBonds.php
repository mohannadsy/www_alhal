<?php
include('include/nav.php');
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <div class="container">
        <h2>سند دفع</h2>
        <div class="row py-3 "> 
            <div class="col-6" >
                <label> الحساب </label>
                <input type="text"  name ="" placeholder="الصندوق الأساسي" disabled>
            </div>
            <div class="col-6">
                <label name=" "> رقم الإيصال </label>
                <input type=number  name =" " value= '' >       
            </div>
        </div> 
        <div class="row py-3 "> 
            <div class="col-6" >
                <label> الحساب المقابل </label>
                <input type="text"  name ="">
            </div>

            <div class="col-6">
                <label name=" "> التاريخ </label>
                <input type="date" name="" id="" min="" max="" value="2022-01-22">       
            </div>
        </div> 

        <div class="row py-3 "> 
            <div class="col-6" >
                <label> دائن </label>
                <input type="text"  name ="">
            </div>
            <div class="col-6">
                <label name=" "> العملة </label>
                <select name="" id="">
                    <optgroup>
                    <option value="">ليرة سورية</option>
                    </optgroup>
                </select>       
            </div>
        </div> 
        <div class="row">
            <div class="col-6">          
                <label for="note"> ملاحظات </label>
                <textarea rows="2" type="text" name="note"> </textarea>          
            </div>         
        </div>
        
        <div class="row justify-content-end py-5">
              <div class="col-10">
                  <button type="submit" class="btn btn-primary" name="add"> إضافة </button>
                  <button type="submit" class="btn btn-primary"  name="print"> طباعة </button>
                  <button type="submit" class="btn btn-primary" name="close"> إغلاق </button>
              </div>   
              
        </div>
    </div>
  </form>  
</body>
</html>

<?php
include('include/footer.php');
?>