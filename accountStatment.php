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
            <div>
                <label>العميل</label>
                <input type="text" name="" id="">
                <label for="">العملة</label>
                <select name="" id="">
                    <option value="">ليرة سورية</option>
                </select>
                <label for="">من تاريخ</label>
                <input type="date" name="" id="" min="" max="" value="2022-01-22">
                <label for="">إلى تاريخ</label>
                <input type="date" name="" id="" min="" max="" value="2022-01-22">
                <label for="">نوع التقرير</label>
                <label for="">تفصيلي</label>
                <input type="radio" name="rad_pay" id="">
                <label for="">مختصر</label>
                <input type="radio" name="rad_pay" id="">
            </div>
            <div class="row justify-content-center">
                <table contenteditable='true' class="col-10 table table-bordered table-hover"  name="table" id="tbl">
                    <thead class="text-center">
                    <tr>
                        <th contenteditable='false'>التاريخ</th>
                        <th contenteditable='false'>له</th>
                        <th contenteditable='false'>علينا</th>
                        <th contenteditable='false'>رقم الحركة</th>
                        <th contenteditable='false'>اسم الحركة</th>
                        <th contenteditable='false'>القيمة</th>
                        <th contenteditable='false'>رصيد الحركة</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                    </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <button type="submit">موافق</button>
                <button type="submit">إغلاق</button>
            </div>
        </div>
    </form> 
<script src = "js/scripts/accountStatment.js"></script>
</body>
</html>

<?php
include('include/footer.php');
?>