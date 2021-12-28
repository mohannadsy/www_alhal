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
        <h2>سند قبض</h2>
        <div class="row py-3 "> 
            <div class="col-6" >
                <label> الحساب </label>
                <input type="text"  name ="" placeholder="الصندوق الأساسي" disabled>
                <input type="hidden" name="main_account_id" value="1">
            </div>
            <div class="col-6">
                <label name=" "> رقم الإيصال </label>
                <input type="text"  name ="code" value= "<?= get_auto_code($con , 'catch_bonds' , "code" ,"" , "child") ?>" readonly>       
            </div>
        </div> 
        <div class="row py-3 "> 
            <div class="col-6" >
                <label> الحساب المقابل </label>
                <input type="text"  name ="">
                <input type="hidden" name="other_account_id" value="5">
            </div>

            <div class="col-6">
                <label name=" "> التاريخ </label>
                <input type="date" name="date" id="" min="" max="" value="2022-01-22">       
            </div>
        </div> 

        <div class="row py-3 "> 
            <div class="col-6" >
                <label> مدين </label>
                <input type="text"  name ="maden">
            </div>
            <div class="col-6">
                <label name=" "> العملة </label>
                <select name="currency" id="">
                    <optgroup>
                    <option value="ليرة سورية" >
                        ليرة سورية
                    </option>
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

if(isset($_POST['add'])){
    $insert_catch_bond_query = insert('catch_bonds' , get_array_from_array($_POST , [
        'main_account_id' , 'other_account_id' , 'maden' , 'note' , 'code' , 'date' , 'currency'
    ]));
    $insert_catch_bond_exec = mysqli_query($con , $insert_catch_bond_query);
    open_window_self('catchBonds.php');
}

?>



<?php
include('include/footer.php');
?>