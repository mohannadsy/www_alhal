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
    <link rel="stylesheet" href="css/styles/item_card.css">
   
</head>

<body>
    <form id="form" action="" method="post">
        <div class="container py-5" id="container">
            <?php
            success_error_create_message('تم انشاء المادة بنجاح', 'عئرا لم يتم انشاء المادة');
            success_error_update_message('تم تعديل المادة بنجاح', 'عئرا لم يتم تعديل المادة');
            success_error_delete_message('تم حذف المادة بنجاح', 'عئرا لم يتم حذف المادة');
            ?>

            <?php
            $item = [];
            if (isset($_GET['id'])) {
                $select_item_query = selectWhereId('items', $_GET['id']);
                $select_item_exec = mysqli_query($con, $select_item_query);
                $item = mysqli_fetch_array($select_item_exec);
            }
            ?>




            <!-- <div class="row justify-content-center"> -->
                <!-- <div id="item_col" class="col-sm-10 col-md-12 text-center py-5"> -->

                    <div class="form-group row justify-content-center  ">
                        <label for="code" class="col-md-3 col-form-label text-md-right">رمز المادة</label>
                        <div class="col-md-6">
                            <input id="code" type="text" value="<?php
                                                        if (isset($_GET['id'])) echo $item['code']; ?>" id="" class="form-control" name="code" readonly>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="name" class="col-md-3 col-form-label text-md-right">المادة </label>
                        <div class="col-md-6">
                            <input value="<?php if (isset($_GET['id'])) echo $item['name']; ?>" type="text" class="form-control" id="name" name="name" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="unit" class="col-md-3 col-form-label text-md-right">وحدة القياس </label>
                        <div class="col-md-6">
                            <input  value="<?php if (isset($_GET['id'])) echo $item['unit'];else echo "كغ"; ?>" type="text" class="form-control" name="unit">
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="category_id" class="col-md-3 col-form-label text-md-right">الصنف </label>
                        <div class="col-md-6">
                            <select class="form-control" name="category_id" id="category_id">
                                <?php
                                $select_categories_query = selectND('categories');
                                $select_categories_exec = mysqli_query($con, $select_categories_query);
                                while ($row = mysqli_fetch_array($select_categories_exec)) {
                                    echo "<option value='" . $row['id'] . "' ";
                                    if(isset($_GET['id']) && $row['id'] == $item['category_id'])
                                        echo "selected";
                                    if(isset($_GET['category_id']) && $_GET['category_id'] == $row['id'])
                                        echo "selected";
                                    echo ">".$row['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <label for="note" class="col-md-3 col-form-label text-md-right"> ملاحظات</label>
                        <div class="col-md-6">
                            <textarea type="text" id="" class="form-control" name="note"><?php if (isset($_GET['id'])) echo $item['note']; ?></textarea>
                        </div>
                    </div>

                    <div class="row py-4" >
                        <div class="col-md-12 text-center" >
                            <!-- <a  href="category_card.php" > <button type="button" id="button-grp1"  name="">إضافة صنف</button></a> -->
                            <a  href="item_list.php"><button type="button"  id="button-grp1" name="view_items">استعراض المواد</button></a>
                            <!-- <a  href="#" class=" btn"  data-target="#add_category" data-toggle="modal">إضافة صنف</a> -->
                            

                        <!-- </div> -->
                        <!-- <div id="button_col" class="col-md-6 text-center" > -->
                        
                        
                            <button <?php if (isset($_GET['id'])) echo 'hidden' ?> type="submit"  name="add" id="button-grp2">
                                إضافة
                            </button>
                            <button  <?php if (!isset($_GET['id'])) echo 'hidden' ?> type="submit"  name="update"id="button-grp2">
                                تعديل
                            </button>
                            <button onclick="return confirm('هل تريد بالتأكيد حذف هذه المادة !')" <?php if (!isset($_GET['id'])) echo 'hidden' ?> type="submit"  name="delete" id="button-grp2">
                                حذف
                            </button>
                            <a href="ready.php"><button type="button" id="button-grp2" name="close"> إغلاق</button></a>
                            <a <?php if (!isset($_GET['id'])) echo 'hidden' ?> href="item_card.php"><button type="button" id="btn_grp" class="" name="item_card">
                         مادة جديدة
                    </button></a>
                        </div>
                    </div>



                <!-- </div> -->

            <!-- </div> -->

        </div>



    </form>

</body>

</html>

<?php


if (isset($_POST['add'])) {
    $insert_item_query = insert('items', get_array_from_array($_POST, ['name', 'unit', 'category_id', 'code', 'note']));
    $insert_item_exec = mysqli_query($con, $insert_item_query);
    if ($insert_item_exec) {
        set_local_storage('item_card_code_name' , $_POST['code'] . " - ". $_POST['name'] );
        open_window_self('item_card.php?message_create=success&category_id='.$_POST['category_id']);
    }
}
if (isset($_POST['update'])) {
    $update_item_query = updateWhereId('items', $_GET['id'], get_array_from_array($_POST, ['name', 'unit', 'category_id', 'code', 'note']));
    $update_item_exec = mysqli_query($con, $update_item_query);
    if ($update_item_exec) {
        open_window_self("item_card.php?id=" . $_GET['id'] . "&message_update=success");
    }
}

if (isset($_POST['delete'])) {
    $delete_item_query = delete('items') . where('code', $_POST['code']);
    $delete_item_exec = mysqli_query($con, $delete_item_query);
    if ($delete_item_exec) {
        open_window_self("item_card.php?message_delete=success");
    }
}

?>


<?php
include('include/footer.php');
?>
<script src="js/iframeResizer.contentWindow.min.js"></script>




<script>
    $(function(){
        $('#category_id').change(function(){
            var category_id = $(this).val();
            if(category_id != ''){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{category_id : category_id},
                    success:function(data){
                        // $('#code').fadeIn(data);
                        $('#code').val(data);
                        // alert(data);
                    }
                });
            }
        });
        $(function(){
            var category_id = $('#category_id').val();
            if(category_id != ''){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{category_id : category_id},
                    success:function(data){
                        // $('#code').fadeIn(data);
                        if($('#code').val() == '')
                            $('#code').val(data);
                        // alert(data);
                    }
                });
            }
        });
    });
</script>