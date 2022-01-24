<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/styles/setting.css"> -->
    <style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
  background-color: 	teal;

}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #0033cc;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;

}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
#account_statment{
    margin-right: 200px;
    margin-top: 20px;
}
</style>

</head>
<body>
    <form action="" method="post">
        <div class="sidebar">
        <a class="active"  href="">قاعدة البيانات</a>
        <a href="#account_statment">معلومات الحساب</a>
        <a href="">كشف الحساب</a>
        <a href="">الطباعة</a>
        </div>
        <div class="content">
            <div class="row" id="account_statment">

                    <div class="col-md-2">
                        <input type="checkbox" value="" id="item_hidden" checked>
                        <label for="">
                            المادة
                        </label>

                    </div>
                <div class="col-md-2">
                    <input type="checkbox" value="" id="total_weight_hidden" checked>
                    <label for="">
                        الوزن القائم
                    </label>
                </div>
                <div class="col-md-2">  
                    <input type="checkbox" value="" id="real_weight_hidden" checked>
                    <label for="">
                        الوزن الصافي
                    </label>

                </div>
                <div class="col-md-2">
                    <input type="checkbox" value="" id="price_hidden" checked>
                    <label for="">
                        الإفرادي
                    </label>

                </div>
                <div class="col-md-2">
                    <input type="checkbox" value="" id="total_item_price_hidden" checked>
                    <label for="">
                        الإجمالي
                    </label>

                </div>
                <div class="col-md-2">
                    <input type="checkbox" value="" id="com_value_hidden" checked>
                    <label for="">
                        الكمسيون
                    </label>

                </div>

            </div>

        </div>
    </form>
</body>



<?php
include('include/footer.php');
?>