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
</head>
<body>
  <form action="" method="post">
    <div class="container">
        <h2>سند قبض</h2>
        <div class="row py-3 "> 
            <div class="col-6" >
                <label> الحساب </label>
                <input type="text"  name ="" placeholder="الصندوق الأساسي" disabled>
                <input type="hidden" name="main_account_id" value="1">
            </div>
            <div class="col-6">
                <label name=" "> رقم الإيصال </label>
                <input type="text"  name ="code" value= "<?= get_auto_code($con , 'catch_bonds' , "code" ,"" , "child") ?>" readonly>       
            </div>
        </div> 
        <div class="row py-3 "> 
            <div class="col-6" >
                <label> الحساب المقابل </label>
                <input class="account_auto" type="text"  name ="other_account_id">

            </div>

            <div class="col-6">
                <label name=" "> التاريخ </label>
                <input type="date" name="date" id="" min="" max="" value="2022-01-22">       
            </div>
        </div> 

        <div class="row py-3 "> 
            <div class="col-6" >
                <label> مدين </label>
                <input type="text"  name ="maden">
            </div>
            <div class="col-6">
                <label name=" "> العملة </label>
                <select name="currency" id="">
                    <optgroup>
                    <option value="ليرة سورية" >
                        ليرة سورية
                    </option>
                    </optgroup>
                </select>       
            </div>
        </div> 
        <div class="row">
            <div class="col-6">          
                <label for="note"> ملاحظات </label>
                <textarea rows="2" type="text" name="note"> </textarea>          
            </div>         
        </div>
        
        <div class="row justify-content-end py-5">
              <div class="col-10">
                  <button type="submit" class="btn btn-primary" name="add"> إضافة </button>
                  <button type="submit" class="btn btn-primary"  name="print"> طباعة </button>
                  <button type="submit" class="btn btn-primary" name="close"> إغلاق </button>
              </div>   
              
        </div>
    </div>
  </form>  
</body>
</html>

<?php

if(isset($_POST['add'])){

    $other_account_id = substr($_POST['other_account_id'] , 0 , 5);
    $select_other_account_id_using_code_query = "select id,code from accounts where code = '$other_account_id'";
    $select_other_account_id_using_code_exec = mysqli_query($con , $select_other_account_id_using_code_query);
    $other_account_id = mysqli_fetch_row($select_other_account_id_using_code_exec)[0];

    $_POST['other_account_id'] = $other_account_id;

    $insert_catch_bond_query = insert('catch_bonds' , get_array_from_array($_POST , [
        'main_account_id' , 'other_account_id' , 'maden' , 'note' , 'code' , 'date' , 'currency'
    ]));
    $insert_catch_bond_exec = mysqli_query($con , $insert_catch_bond_query);

    /**
     * make account statements
     */
    // كشف حساب الصندوق
    $_POST['code_number'] = $_POST['code'];
    $_POST['code_type'] = 'catch_bonds';
    $insert_account_statement_query = insert('account_statements' , get_array_from_array($_POST , [
        'main_account_id' , 'other_account_id' , 'maden' , 'note' , 'date' , 'code_number' , 'code_type' , 'note'
    ]));
    $insert_account_statement_exec = mysqli_query($con , $insert_account_statement_query);
    
    // كشف حساب الدافع
    $_POST['other_account_id'] = $_POST['main_account_id']; // جعل الحساب الاساسي هو الدافع
    $_POST['main_account_id'] = $other_account_id;
    $_POST['daen'] = $_POST['maden'];
    $insert_account_statement_query = insert('account_statements' , get_array_from_array($_POST , [
        'main_account_id' , 'other_account_id' , 'daen' , 'note' , 'date' , 'code_number' , 'code_type' ,'note'
    ]));
    $insert_account_statement_exec = mysqli_query($con , $insert_account_statement_query);
    


    open_window_self('catchBonds.php');


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
        
        $( ".account_auto" ).autocomplete({
            highlightClass: "bold-text",
            source: tags
        });
        
  });
    
})( jQuery );
</script>



