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
            <h6>  تقرير عن حركة مادة وفقاً </h6>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr >
                                <th  >  </th>
                                <th  >  </th>
                                <th  >  </th>
                                <th  >  </th>
                                <th  > الإدخالات </th>
                                <th  >  </th>
                                <th  >  </th>
                                <th >الإخراجات</th>
                                <th  >  </th>
                                <th  >  </th>
                                <th >الرصيد</th>
                    </tr>
                    <tr>
                            <th> التاريخ </th>
                            <th> الفاتورة </th>
                            <th>اسم المادة  </th>
                            <th> الكمية </th>
                            <th  >  </th>
                            <th> السعر   </th>
                            <th> الكمية   </th>
                            <th  >  </th>
                            <th> السعر </th>
                            <th> الكمية  </th>
                            <th  >  </th>
                            <th> السعر   </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            <button type="submit" name="print">إغلاق</button>
            <button type="submit" name="print">طباعة</button>

        </div>
    </div>
</body>
</html>


<?php
include('include/footer.php');
?>