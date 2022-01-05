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
        #form_input{
            text-align: right;
            border-radius: 5px;
        }
        #form_btn{
            text-align:right;
        }
        #from-date ,#to-date{
            border-radius: 5px;
            
        }
    </style>
   
</head>
<body>
    <div class="container">
        <form action="" method="post">
                <div class="row justify-content-start px-5 py-2">
                    <h3>    حركة مادة  </h3>
                </div>
                <div class="row ">
                    <div class="col-4" >
                        <div class="row py-1" >
                            <div class="col-md-4 text-center" >
                                <input  type="radio" name="option" id="form1" value="">
                                <label  for="form1">المادة</label>
                    
                            </div>
                            <div class="col-md-4 text-center" >
                                <input type="radio" name="option" id="form2" value="">
                                <label  for="form2">الصنف</label>
                            </div>
                            <div class="col-md-4 text-center"  >
                                    <input  type="radio" name="option" id="form3" value="">
                                    <label  for="form3">العميل</label>
                            </div>
                        </div>

                        <div class="row justify-content-center py-2">
                            <div class="col-6">
                                <input type="text" name="" id="form_input" >
                            </div>
                            <div class="col-2">
                                <button type="submit"  name="search" id="form_btn" >بحث</button>
                            </div>

                        </div>

                    </div>
                    <div class="col-4" >
                        <div class="row justify-content-center py-1 ">
                            <label for="from_date" class="col-3"> من تاريخ</label>
                            <div class="col-md-6" >
                                <input type="date" name="from_date" id="from-date"  value="<?php echo date('Y-m-d'); ?>">
                            </div>

                        </div>
                        <div class="row justify-content-center py-1 ">
                            <label for="to_date" class="col-3">إلى تاريخ</label>
                            <div class="col-md-6 ">
                                <input type="date" name="to_date" id="to-date"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>

                </div>

        <!-- <div class="row justify-content-start py-2">
                    <div class="col-md-2" id="form1">
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" type="radio" name="option" id="" value="">
                            <label class="form-check-label" for="buyer">المادة</label>
                        </div>
            
                    </div>
                    <div class="col-md-2" id="form2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="option" id="" value="">
                            <label class="form-check-label" for="seller">الصنف</label>
                        </div>
                    </div>
                    <div class="col-md-2" id="form3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="option" id="" value="">
                            <label class="form-check-label" for="item">العميل</label>
                        </div>
   
                    </div>
                    <div class="col-3"  id="form_input">
                        <input type="text" name="" class="form-control">
                    </div>
                    <div class="col-2" id="form_btn">
                        <button type="submit" class="btn btn-secondary" name="search">بحث</button>
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
        </div> -->
           
        <div class="row justify-content-center py-2">
            <div class="col-11">
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
        </div>
        <div class="row justify-content-end py-2" >
            <div class="col-2">
                <button type="submit"  name="close">إغلاق</button>
                <button type="submit"  name="print">طباعة</button>
            </div>

        </div>
        </form>
    </div>
</body>
</html>


<?php
include('include/footer.php');
?>