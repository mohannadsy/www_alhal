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
  <form action="" method="post">
    <div class="container">
      <div class="row "> 
         <div class="col-6 " >
            <label> الحساب </label>
             <input type="text" name ="current" placeholder="الصندوق الأساسي" disabled>
         </div>
        <div class="col-6">
          <label name=" "> رقم الإيصال </label>
          <input type=number name =" " value= '' >
        </div>
        <div class="col-6">
          <label name=" "> العملة </label>
          <input type="text" name =" " value= '' >
        </div>
        <div class="col-6">
           <label name=""> ملاحظات </label>
              <textarea rows="2" type="text" name="note"> </textarea>
        </div>
        <div class="col-6">
          <label name=" "> التاريخ</label>
          <input type="date" name =" " value='' >
        </div>
     </div>
<table  class="table table-bordered table-hover">
<thead>
  <tr>
    <th> الحساب</th>
    <th> مدين</th>
    <th> البيان</th>

  </tr>
</thead>
<tbody>


</tbody>
</table>

       <div class="row justify-content-end">
            <div class="col-4">
                <button type="submit" name="add"> إضافة </button>
                <button type="submit" name="modify"> تعديل </button>
                <button type="submit" name="delete"> حذف </button>
                <button type="submit" name="print"> طباعة </button>
                <button type="submit" name="close"> إغلاق </button>
                
            </div>
        </div>
    </div>
  </form>  
</body>
</html>

<?php
include('include/footer.php');
?>