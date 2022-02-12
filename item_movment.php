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
    <style>
        body{
            text-align: right;
            background-color:LightGray;
        }
        .container{
            background-color: #5F9EA0;
            border-style:groove;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="row justify-content-start">
        <h6>    حركة وفقاً ل   </h6>
    </div>

    <form action="" method="post"> 
            
            <div class="row justify-content-center">
                <label for="">نوع التقرير</label>
                <label for=""> تفصيلي </label>
                <input type="radio" name="report_type" id="">
                <label for=""> مختصر </label>
                <input type="radio" name="report_type" id="" checked>
            </div>
            <div class="row justify-content-end">
                <button type="submit" name="view">إظهار</button>
                <button type="submit" name="print">إغلاق</button>
            </div>
    
    </form>


    </div>
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



