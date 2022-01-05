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
        <form action="" method="">
        <div class="row justify-content-start px-5 py-2">
                    <h3>    حركة كمسيون  </h3>
                </div>
            <div class="row ">
                <div class="col-4">
                    <div class="row  py-2" >
                        <div class="col-md-4 text-center" >
                            <input  type="radio" name="" id="form1" value="">
                            <label for="form1" name="">المادة</label>
                
                        </div>
                        <div class="col-md-4 text-center" >
                            <input  type="radio" name="" id="form2" value="">
                            <label  for="form2" name="" >الصنف</label>
                        </div>
                        <div class="col-md-4 text-center" >
                            <input  type="radio" name="" id="form3" value="">
                            <label  for="form3" name="" >العميل</label>
                        </div>
                    </div>

                    <div class="row justify-content-center py-2">
                        <div class="col-6" >
                            <input type="text" name="" id="form_input" >
                        </div>
                        <div class="col-2" >
                            <button type="submit" id="form_btn" name="search">بحث</button>
                        </div>

                    </div>

                </div>
                <div class="col-4">
                    <div class="row justify-content-center py-1">
                        <label for="from_date">من تاريخ</label>
                        <div class="col-md-7">
                            <input type="date" name="from_date" id="from-date"   value="<?php echo date('Y-m-d'); ?>" >
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <label for="to_date">إلى تاريخ</label>
                        <div class="col-md-7">
                            <input type="date" name="to_date" id="to-date"  value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                </div>

            </div>
                    
                    <div class="row justify-content-center py-2 ">
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
                        <button type="submit"  name="print">طباعة</button>
                        <button type="submit"  name="close">إغلاق</button>
                        </div>
                    </div>
        </form>
    </div>
</body>
</html>


<?php
include('include/footer.php');
?>