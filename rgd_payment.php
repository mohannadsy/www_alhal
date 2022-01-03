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
    <link rel="stylesheet" href="css/styles/paymentBonds.css" media="print">
    <style>
        body{
            text-align: right;
            background-color:LightGray;
        }
        .container{
            background-color: #5F9EA0;
            border-style:groove;
            /* width: 50%; */
            margin-top: 5%;
        }
        h2{
            /* background-color: blueviolet; */
        }
        #res_number{
            column-width: 50px;
        }
    </style>
</head>
<body class="receipt">
    <form action="" method="">
        <div class="container">
            <div class="row">
                <div class="col-4" id = "receipt_number1">
                    <h2> سند دفع</h2>
                </div>
                <div class="col-6" id = "receipt_number">
                    <div class="row justify-content-end" style="padding-top: 10px;">
                        <label name=" "> رقم الإيصال</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="code" readonly>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="row justify-content-center py-3" style="background-color: #5F9EA0;">
                        <div id="" class="col-sm-10 col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">  الحساب</label>
                                <div class="col-md-6">
                                <input type="text"  name ="" placeholder="الصندوق الأساسي" disabled>
                                <input type="hidden" name="main_account_id" value="1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label ">التاريخ  </label>
                                <div class="col-md-6">
                                <input type="date" class="form-control" name="date" id="date" min="" max="" value="2022-01-22">
                                </div>
                            </div>
                         </div>
                        <div id="" class="col-sm-10 col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">العملة  </label>
                                <div class="col-md-6">
                                    <select class="form-control">
                                        <option value="syrian-bounds">ليرة سورية</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-md-4 col-form-label text-md-right"> ملاحظات</label>
                                <div class="col-md-6">
                                    <textarea rows="2" type="text" id="" class="form-control" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                            <div class="col-10">
                                <table class=" text-center table table-bordered table-hover">
                                    <thead class="text-center bg-primary ">
                                            <tr>
                                            <th scope="col">رقم</th>
                                            <th scope="col">مدين</th>
                                            <th scope="col">الحساب </th>
                                            <th scope="col">ملاحظات</th>
                                            </tr>
                                    </thead>
                                    <tbody id="show">
                                    <tr>
                                            <th scope="col">1</th>
                                            <th scope="col"></th>
                                            <th scope="col"> </th>
                                            <th scope="col"></th>
                                            </tr>
                                            <tr>
                                            <th scope="col">2</th>
                                            <th scope="col"></th>
                                            <th scope="col"> </th>
                                            <th scope="col"></th>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="row justify-content-end px-5" >
                    <label for="code" class="col-form-label" id="res_number" style="">  المجموع</label>
                        <div class="col-md-2">
                            <input id="code" type="text" id="resault" class="form-control" name="" >
                        </div>
                    </div>
            <div class="row justify-content-end py-3" >   
                <div class="col-md-4" id='buttons'>
                    <button  type="submit" class=" btn btn-primary" name="add">
                        إضافة
                    </button>
                    <button  type="button" class=" btn btn-primary" name="print" onclick="printPaymetBonds(['nav','buttons'])">
                        طباعة
                    </button>
                    <button type="button" class="btn btn-primary" name="close">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </form>
<script src = "js/scripts/paymentBonds.js"></script>
</body>
</html>

 <?php
 include('include/footer.php');
 ?>
