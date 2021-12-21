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
        <div class="row py-3 "> 
            <div class="col-6" >
                <label> الحساب </label>
                <input type="text"  name ="current" placeholder="الصندوق الأساسي" disabled>
            </div>

            <div class="col-6">
                <label name=" "> رقم الإيصال </label>
                <input type=number  name =" " value= '' >
                          
            </div>
        </div>
              
        <div class=" row ">

            <div class="col-6" >
                <label name=" "> العملة </label>
                <input type="text" name =" " value= '' >      
            </div>

            <div class="col-6">
                <label name=" "> التاريخ</label>
                <input type="date" name =" " value='' >
        
            </div> 

        </div>

        <div class="row">
            <div class="col-6">
                        
                <label for="note"> ملاحظات </label>
                <textarea rows="2" type="text" name="note"> </textarea>          
            </div>
                        
        </div>
        




        <div class="row justify-content-center py-5">
          <div class="col-10">
              <table  class="table text-center table-bordered table-hover">
                <thead class="bg-primary">
                    <tr>
                      <th> الحساب</th>
                      <th> دائن</th>
                      <th> البيان</th>

                    </tr>
                </thead>
                <tbody>


                </tbody>
              </table>
          </div>
        </div>


        <div class="row justify-content-end py-5">
              <div class="col-10">
                  <button type="submit" class="btn btn-primary" name="add"> إضافة </button>
                  <button type="submit" class="btn btn-primary" name="modify"> تعديل </button>
                  <button type="submit" class="btn btn-primary" name="delete"> حذف </button>
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