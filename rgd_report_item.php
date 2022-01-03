<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
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
            <h6>  تقرير عن حركة مادة وفقاً </h6>
        </div>
        <div class="row justify-content-center py-2">
                    <div class="col-md-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="buyer" id="" value="">
                            <label class="form-check-label" for="buyer">المادة</label>
                        </div>
            
                    </div>
                    <div class="col-md-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="seller" id="" value="">
                            <label class="form-check-label" for="seller">الصنف</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="client" id="" value="">
                            <label class="form-check-label" for="item">العميل</label>
                        </div>
   
                    </div>
                    <div class="col-3">
                        <input type="text" name="" class="form-control">
                    </div>
        </div>
        <div class="row justify-content-center  py-2 ">
                    <label for="from_date">من تاريخ</label>
                    <div class="col-md-3">
                    <input type="date" name="from_date"  value=" " class="form-control">
                    </div>
                    <label for="to_date">إلى تاريخ</label>
                    <div class="col-md-3">
                    <input type="date" name="to_date" class="form-control" value=" ">
                    </div>
        </div>
           
        <div>
            <table class=" table table-bordered table-hover text-center ">
                <thead >
                    <tr >
                                
                                <th colspan="3"></th>
                                <th colspan="2" > الإدخالات </th>
                              
                                <th colspan="2" >الإخراجات</th>
                                <th colspan="2" >الرصيد</th>
                    </tr>
                    <tr>
                            <th> التاريخ </th>
                            <th> الفاتورة </th>
                            <th>اسم المادة  </th>
                            <th> الكمية </th>
                            <th> السعر   </th>
                            <th> الكمية   </th>
                            <th> السعر </th>
                            <th> الكمية  </th>
                            <th> السعر   </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="row justify-content-end" >
            <div class="col-2">
            <button type="submit" class="btn btn-secondary" name="close">إغلاق</button>
            <button type="submit" class="btn btn-secondary" name="print">طباعة</button>
            </div>

        </div>
    </div>
</body>
</html>


<?php
include('include/footer.php');
?>