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
        #form1 {
            text-align: center;
        }
        #form2 {
            text-align: center;
        }
        #form3{
            text-align: center; 
        }
        #form_input{
            /* background-color: chartreuse; */
            text-align: right;

        }
        #form_btn{
            text-align:right;
        }
    </style>
   
</head>
<body>
    <div class="container">
        <form action="" method="">
            <div class="row py-2">
                <div class="col-8">
                    <div class="row justify-content-center py-2" >
                        <div class="col-md-3" id="form1">
                            <div class="form-check form-check-inline" >
                                <input class="form-check-input" type="radio" name="option" id="" value="">
                                <label class="form-check-label" for="buyer">المادة</label>
                            </div>
                
                        </div>
                        <div class="col-md-3" id="form2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="option" id="" value="">
                                <label class="form-check-label" for="seller">الصنف</label>
                            </div>
                        </div>
                        <div class="col-md-3" id="form3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="option" id="" value="">
                                <label class="form-check-label" for="item">العميل</label>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center py-2">
                        <div class="col-4"  id="form_input" >
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-2" id="form_btn">
                            <button type="submit" class="btn btn-secondary" name="search">بحث</button>
                        </div>

                    </div>

                </div>
                <div class="col-4">
                    <div class="row justify-content-center py-1">
                        <label for="from_date">من تاريخ</label>
                        <div class="col-md-7">
                            <input type="date" name="from_date"  value=" " class="form-control">
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <label for="to_date">إلى تاريخ</label>
                        <div class="col-md-7">
                            <input type="date" name="to_date" class="form-control" value=" ">
                        </div>
                    </div>
                </div>

            </div>
                    
                    <div class="row justify-content-center ">
                    <div class="col-11">
                        <table class=" table table-bordered table-hover text-center ">
                            <thead>
                                <tr>
                                    <th>رقم الفاتورة </th>
                                    <th>تاريخ الفاتورة </th>
                                    <th>اسم المادة  </th>
                                    <th> الصنف </th>
                                    <th>الوحدة  </th>
                                    <th>العملة  </th>
                                    <th> المشتري </th>
                                    <th>البائع </th>
                                    <th>قيمة الكمسيون </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        </div>
                    </div>

                    <div class="row justify-content-end py-2">
                        <div class="col-2">
                        <button type="submit" class="btn btn-secondary" name="print">طباعة</button>
                        <button type="submit" class="btn btn-secondary" name="close">إغلاق</button>
                        </div>
                    </div>
        </form>
    </div>
</body>
</html>


<?php
include('include/footer.php');
?>