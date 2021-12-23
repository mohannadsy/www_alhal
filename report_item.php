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
    <div class="container">
        <div class="row justify-content-start">
            <h6>تقرير عن حركة مادة</h6>
        </div>
        <div>
            <table class="table">
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

        <div class="row justify-content-center">
            <button type="submit" name="print">إغلاق</button>
        </div>
    </div>
</body>
</html>


<?php
include('include/footer.php');
?>