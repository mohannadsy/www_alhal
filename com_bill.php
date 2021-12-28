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
    <link rel="stylesheet" href="css/styles/com_bill.css">

</head>
<body>
<form action="" method="post">
    <div class="container">
        <div class="row" style="height:200px;">
            <div id='seller' class="col-6">
                <label>البائع</label>
                <!-- <div class="ui-widget"> -->
                    <input name="seller" class="account_auto"/>
                <!-- </div> -->
                <input type="hidden" name="seller_id" value="6">
                <label>طريقة الدفع </label>
                <input type="radio" name="seller_type_pay" checked value="cash">
                <label>نقدي</label>
                <input type="radio" name="seller_type_pay" value="agel">
                <label>آجل</label>
                <label>ملاحظات</label>
                <textarea name="seller_note"></textarea>
            </div>
            <div class="col-6">
                <label>المشتري</label>
                <input type="text" name="buyer" class="account_auto">
                <input type="hidden" name="buyer_id" value="7">
                <label>طريقة الدفع </label>
                <input type="radio" name="buyer_type_pay" checked value="cash">
                <label>نقدي</label>
                <input type="radio" name="buyer_type_pay" value="agel">
                <label>آجل</label>
                <label>ملاحظات</label>
                <textarea name="buyer_note"></textarea>
            </div>
        </div>
        <button type="button" id="add_col">adding column</button>
        <button type="button" id="add_row">adding Row</button>
        <div class="row justify-content-center">
            <table contenteditable='false' class="col-10 table table-bordered table-hover text-center"  name="table" id="tbl">
                <thead class="text-center">
                <tr>
                    <th contenteditable='false'>الرقم</th>
                    <th contenteditable='false'>المادة</th>
                    <th contenteditable='false'>الوحدة</th>
                    <!-- <th contenteditable='false'>عدد العبوات</th> -->
                    <th contenteditable='false'>وزن قائم</th>
                    <th contenteditable='false'>وزن الصافي</th>
                    <th contenteditable='false'> الإفرادي </th>
                    <th contenteditable='false'>الإجمالي </th>
                    <th id="notes" contenteditable='false'>ملاحظات</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="">
            <label>الإجمالي</label>
            <input type="text" name="total_price" readonly>
        </div>
        <div class="row justify-content-end">
            <label>الكمسيون</label>
            <input type="text" name="com_ratio">
            <label>قيمته</label>
            <input type="text" name="com_value" readonly>
        </div>
        <div class="row justify-content-end">
            <label>الصافي</label>
            <input type="text" name="real_price" readonly>
        </div>
        <div id='buttons' class="row justify-content-start">
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
                <button  type="button" name="print" onclick="printComPill(['seller' , 'nav' , 'buttons'])">طباعة</button>
            </div>
        </div>
    </div>
</form>
<script src = "js/scripts/com_bill.js"></script>
</body>
</html>

<?php

// if(isset($_POST['delete'])){
//     message_box($seller_code = substr($_POST['seller'] , 0 , 5));
// }

if(isset($_POST['save'])){
    
    // get seller id from seller code
    $seller_code = substr($_POST['seller'] , 0 , 5);
    $select_seller_id_using_code_query = "select id,code from accounts where code = '$seller_code'";
    $select_seller_id_using_code_exec = mysqli_query($con , $select_seller_id_using_code_query);
    $seller_id = mysqli_fetch_row($select_seller_id_using_code_exec)[0];
   

    // get buyer id from buyer code
    $buyer_code = substr($_POST['buyer'] , 0 , 5);
    $select_buyer_id_using_code_query = "select id,code from accounts where code = '$buyer_code'";
    $select_buyer_id_using_code_exec = mysqli_query($con , $select_buyer_id_using_code_query);
    $buyer_id = mysqli_fetch_row($select_buyer_id_using_code_exec)[0];

    $_POST['seller_id'] = $seller_id;
    $_POST['buyer_id'] = $buyer_id;

    // make bill insertion
    $insert_bill_query = insert('bills' , get_array_from_array( $_POST , ['seller_id' , 'seller_type_pay' , 'seller_note' , 
       'buyer_id' , 'buyer_type_pay' , 'buyer_note' , 'total_price' , 'real_price' , 'com_ratio' , 'com_value' ]));
    $insert_bill_exec = mysqli_query($con , $insert_bill_query);

    // insert all items to bill_item table
    $select_last_bill_id_query = select('bills' , 'max(id)');
    $select_last_bill_id_exec = mysqli_query($con , $select_last_bill_id_query);
    $current_bill_id = mysqli_fetch_row($select_last_bill_id_exec)[0];
    foreach($_POST['items'] as $key => $item){
        if($item != ''){
            $item_code = substr($_POST['items'][$key] , 0 , 5);
            message_box($item_code);
            $select_item_id_from_code_query = "select id,code from items where code = '$item_code'";
            $select_item_id_from_code_exec = mysqli_query($con , $select_item_id_from_code_query);
            $item_id = mysqli_fetch_row($select_item_id_from_code_exec)[0];
            $insert_bill_item_query = insert('bill_item' , [
                'bill_id' => $current_bill_id,
                'item_id' => $item_id,
                'total_weight' => $_POST['total_weights'][$key],
                'real_weight' => $_POST['real_weights'][$key],
                'price' => $_POST['prices'][$key],
                'total_item_price' => $_POST['total_item_prices'][$key]
            ]);
            $insert_bill_item_exec = mysqli_query($con , $insert_bill_item_query);
        }
    }
    
    // make mid bonds


}

?>

<?php
include('include/footer.php');
?>

<script>
    (function( $ ) {
    
    // Custom autocomplete instance.
    $.widget( "app.autocomplete", $.ui.autocomplete, {
        
        // Which class get's applied to matched text in the menu items.
        options: {
            highlightClass: "ui-state-highlight"
        },
        
        _renderItem: function( ul, item ) {

            // Replace the matched text with a custom span. This
            // span uses the class found in the "highlightClass" option.
            var re = new RegExp( "(" + this.term + ")", "gi" ),
                cls = this.options.highlightClass,
                template = "<span class='" + cls + "'>$1</span>",
                label = item.label.replace( re, template ),
                $li = $( "<li/>" ).appendTo( ul );
            
            // Create and return the custom menu item content.
            $( "<a/>" ).attr( "href", "#" )
                       .html( label )
                       .appendTo( $li );
            
            return $li;
            
        }
        
    });
    

    var tags_items = [
        <?php
            $query =  select('items');
            $query_exec = mysqli_query($con , $query);
            while($row = mysqli_fetch_row($query_exec)){
                echo "'$row[9] - $row[1]',";
            }
            ?>
    ];
    var tags = [
        <?php
            $query =  select('accounts') . " where id <> '1' and id <> '2' and id <> '3' and account_id <> '0'";
            $query_exec = mysqli_query($con , $query);
            while($row = mysqli_fetch_row($query_exec)){
                echo "'$row[1] - $row[2]',";
            }
            ?>
    ];
    
    // Create autocomplete instances.
    $(function() {
        
        $( ".item_auto" ).autocomplete({
            source: tags_items
        });

        $( ".account_auto" ).autocomplete({
            highlightClass: "bold-text",
            source: tags
        });
        
  });
    
})( jQuery );
</script>


