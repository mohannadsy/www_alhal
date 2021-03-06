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
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <style>
        .ui-autocomplete { 
            cursor:pointer; 
            height:120px; 
            overflow-y:scroll;
        }  
    </style>
</head>
<body>
<form action="" method="post">
    <div class="container">
        <div class="row" style="height:200px;">
            <div class="col-6" id="printableArea">
                <label>البائع</label>
                <input type="text" name="seller">
                <label>طريقة الدفع </label>
                <input type="radio" name="rad_seller" checked>
                <label>نقدي</label>
                <input type="radio" name="rad_seller" >
                <label>آجل</label>
                <label>ملاحظات</label>
                <textarea name="seller_notes"></textarea>
            </div>
            <div class="col-6">
                <label>المشتري</label>
                <input type="text" name="buyer">
                <label>طريقة الدفع </label>
                <input type="radio" name="rad_buyer">
                <label>نقدي</label>
                <input type="radio" name="rad_buyer">
                آجل
                <label>ملاحظات</label>
                <textarea name="buyer_notes"></textarea>
            </div>
        </div>
        <div class="row justify-content-center" >
            
                <table contenteditable='true' class="col-10 table table-bordered table-hover"  name="table" id="tbl">
                    <thead class="text-center">
                    <tr>
                        <th contenteditable='false'>الرقم</th>
                        <th contenteditable='false'>المادة</th>
                        <th contenteditable='false'>الوحدة</th>
                        <th contenteditable='false'>عدد العبوات</th>
                        <th contenteditable='false'>وزن قائم</th>
                        <th contenteditable='false'>وزن الصافي</th>
                        <th contenteditable='false'> الإفرادي </th>
                        <th contenteditable='false'>الإجمالي </th>
                        <th contenteditable='false'>ملاحظات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td name='bill_code_1'></td>
                        <td name='item_name_1' ></td>
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
            <button type="button" id="add_col">adding column</button>
            <button type="button" id="add_row">adding Row</button>
        </div>
        
        <div class="ui-widget">
            <input type="text" id="txtBirds" placeholder="bold-text" />
        </div>

        <br/>
        <div class="row justify-content-end">
            <label>الإجمالي</label>
            <input type="text" name="total">
        </div>
        <div class="row justify-content-end">
            <label>الكمسيون</label>
            <input type="text" name="ratio">
            <label>قيمته</label>
            <input type="text" name="comm_value">
        </div>
        <div class="row justify-content-end">
            <label>الصافي</label>
            <input type="text" name="pure">
        </div>
        <div class="row justify-content-start">
            <div class="col-4">
                <button type="submit" name="save">حفظ</button>
                <button type="submit" name="modify">تعديل</button>
                <button type="submit" name="delete">حذف</button>
                <select name="print_option" id="">
                    <optgroup>
                    <option value="">بائع</option>
                    <option value="">مشتري</option>
                    </optgroup>
                </select>
                <button type="button" name="print" onclick="window.print();">الطباعة</button>
            </div>
        </div>
    </div>
</form>
<script src = "js/scripts/com_bill.js"></script>
</body>
<script>
    $(document).ready(function() {
        BindControls();
    });

    function BindControls() {
        const arrBirds = [
            "Bald Eagle",
            "Cooper's Hawk",
            "Mourning Dove",
            "Abert's Towhee",
            "Brewer's Sparrow",
            "Black Vulture",
            "Gila Woodpecker",
            "Gilded Flicker",
            "Cassin's Sparrow",
            "Bell's Sparrow",
            "American Kestrel"
        ];

        $("#txtBirds").autocomplete({
            source: arrBirds,
            minLength: 0,
            scroll: true
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            let txt = String(item.value).replace(new RegExp(this.term, "gi"), "<b>$&</b>");
            return $("<li></li>")
                .data("ui-autocomplete-item", item)
                .append("<a>" + txt + "</a>")
                .appendTo(ul);
        };
    }
</script>
</html>


<?php
include('include/footer.php');
?>