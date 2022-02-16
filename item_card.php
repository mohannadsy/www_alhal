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


<?php
$select_last_next_item_query = selectND('items') . ' order by code desc limit 1 ';
$select_last_next_item_exec = mysqli_query($con, $select_last_next_item_query);
$last_next_code = mysqli_fetch_array($select_last_next_item_exec)['code'];

$select_last_previous_item_query = selectND('items') . ' limit 1 ';
$select_last_previous_item_exec = mysqli_query($con, $select_last_previous_item_query);
$last_previous_code = mysqli_fetch_array($select_last_previous_item_exec)['code'];

$current_item_code = get_auto_code($con, 'items', 'code', '', 'child');
if (
    isset($_GET['id']) &&
    !isset($_POST['next']) &&
    !isset($_POST['last_next']) &&
    !isset($_POST['previous']) &&
    !isset($_POST['last_previous']) &&
    !isset($_POST['current']) && !isset($_POST['add']) && !isset($_POST['code'])
) {
    $current_item_code = get_value_from_table_using_id($con, 'items', 'code', $_GET['id']);
    // $current_item_code = $_GET['code'];
    $current_item_id_to_update_delete = $_GET['id'];
    $_POST['code'] = $current_item_code;
    $_POST['current'] = $current_item_code;
}
$next_item_code = $current_item_code;
if (isset($_POST['code']))
    $current_item_code = $_POST['code'];
$previous_item_code = 1;

$items = [];
$item_select = selectND('items');
$item_exec = mysqli_query($con, $item_select);
$item_rows = mysqli_num_rows($item_exec);
if ($item_rows > 0)
    while ($item_ = mysqli_fetch_array($item_exec)) {
        $items[] = $item_;
    }
for ($i = 0; $i < count($items); $i++) {
    if ($items[$i]['code'] == $current_item_code) {
        // if (($i + 1) != count($items)){
        @$next_item_code = $items[$i + 1]['code'];
        // }
        @$previous_item_code = $items[$i - 1]['code'];
    }
}
if ($previous_item_code == 1) {
    @$previous_item_code = $items[count($items) - 1]['code'];
}

$item = [];
$current_item_id_to_update_delete = getId($con, 'items', 'code', $current_item_code);
// if ($current_item_code < $next_item_code) {
//     $next_item_code_query = selectND('items') . andWhereLarger('code', $current_item_code);
//     $next_item_code_exec = mysqli_query($con, $next_item_code_query);
//     @$next_item_code = mysqli_fetch_array($next_item_code_exec)['code'];
// }
// if ($current_item_code > $previous_item_code) {
//     $previous_item_code_query = selectND('items') . andWhereSmaller('code', $current_item_code) . ' order by code desc';
//     $previous_item_code_exec = mysqli_query($con, $previous_item_code_query);
//     $previous_item_code = mysqli_fetch_array($previous_item_code_exec)['code'];
// }
if (isset($_POST['next'])) {
    $item_select = selectND('items') . andWhere('code', $next_item_code);
    $item_exec = mysqli_query($con, $item_select);
    $item_rows = mysqli_num_rows($item_exec);
    while ($item_ = mysqli_fetch_array($item_exec)) {
        $item[] = $item_;
    }
    $current_item_id_to_update_delete = getId($con, 'items', 'code', $next_item_code);
    delete_notifications();
}
if (isset($_POST['last_next'])) {
    $item_select = selectND('items') . andWhere('code', $last_next_code);
    $item_exec = mysqli_query($con, $item_select);
    $item_rows = mysqli_num_rows($item_exec);
    while ($item_ = mysqli_fetch_array($item_exec)) {
        $item[] = $item_;
    }
    $current_item_id_to_update_delete = getId($con, 'items', 'code', $last_next_code);
    delete_notifications();
}
if (isset($_POST['previous'])) {
    $item_select = selectND('items') . andWhere('code', $previous_item_code);
    $item_exec = mysqli_query($con, $item_select);
    $item_rows = mysqli_num_rows($item_exec);
    while ($item_ = mysqli_fetch_array($item_exec)) {
        $item[] = $item_;
    }
    $current_item_id_to_update_delete = getId($con, 'items', 'code', $previous_item_code);
    delete_notifications();
}

if (isset($_POST['last_previous'])) {
    $item_select = selectND('items') . andWhere('code', $last_previous_code);
    $item_exec = mysqli_query($con, $item_select);
    $item_rows = mysqli_num_rows($item_exec);
    while ($item_ = mysqli_fetch_array($item_exec)) {
        $item[] = $item_;
    }
    $current_item_id_to_update_delete = getId($con, 'items', 'code', $last_previous_code);
    delete_notifications();
}
$prefix = '';
if (isset($_POST['current']) || isset($_POST['update'])) {
    $item_select = selectND('items') . andWhere('code', $_POST['code']);
    $item_exec = mysqli_query($con, $item_select);
    $item_rows = mysqli_num_rows($item_exec);
    if ($item_rows > 0)
        while ($item_ = mysqli_fetch_array($item_exec)) {
            $item[] = $item_;
        }
    else {
        $select_code_using_category_id_query = "select id,code from categories where id = '" . $_POST['category_id'] . "'";
        $select_code_using_category_id_exec = mysqli_query($con, $select_code_using_category_id_query);
        if ($row = mysqli_fetch_array($select_code_using_category_id_exec))
            $prefix = $row['code'];
        $_POST['code'] = get_auto_code($con, 'items', 'code', $prefix, 'child', 'category_id', $_POST['category_id']);
        $current_item_id_to_update_delete = getId($con, 'items', 'code', $_POST['code']);
    }
}


// message_box("current = $current_item_code , next = $next_item_code , previous = $previous_item_code , last_previous = $last_previous_code , last_next = $last_next_code");

?>

<body>
    <form id="form" action="" method="post">
        <div class="container" id="container">
            <?php
            success_error_create_message('تم انشاء المادة بنجاح', 'عئرا لم يتم انشاء المادة');
            success_error_update_message('تم تعديل المادة بنجاح', 'عئرا لم يتم تعديل المادة');
            success_error_delete_message('تم حذف المادة بنجاح', 'عئرا لم يتم حذف المادة');
            ?>

            <!-- <div class="row justify-content-center"> -->
            <!-- <div id="item_col" class="col-sm-10 col-md-12 text-center py-5"> -->
            <div class="row py-3">
                <div class="col-8">
                    <h4>
                        بطاقة مادة
                    </h4>
                </div>
                <div class="col-4">
                    <div class="row justify-content-end" style="margin-left: 15px;">

                    <button name="last_next" id="last_next"><span>&#171;</span> </button>
                        <button name="next" id="next"><span>&#8249;</span> </button>
                        <button name="previous" id="previous"> <span>&#8250;</span> </button>
                        <button name="last_previous" id="last_previous"><span>&#187;</span> </button>
                        <button name="current" id="current" hidden></button>
                    </div>
                </div>


            </div>

            <div class="form-group row justify-content-center  ">
                <label for="code" class="col-md-3 col-form-label text-md-right">رمز المادة</label>
                <div class="col-md-6">
                    <input readonly value="<?php
                                            if (isset($_POST['next'])) echo $next_item_code;
                                            elseif (isset($_POST['last_next'])) echo $last_next_code;
                                            elseif (isset($_POST['previous'])) echo $previous_item_code;
                                            elseif (isset($_POST['last_previous'])) echo $last_previous_code;
                                            elseif (isset($_POST['current']) || isset($_POST['update'])) echo $_POST['code']; ?>"" type=" text" id="code" class="form-control" name="code">



                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="name" class="col-md-3 col-form-label text-md-right">المادة </label>
                <div class="col-md-6">
                    <input value="<?php if (notempty($item)) echo $item[0]['name']; ?>" type="text" class="form-control" id="name" name="name" autofocus>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="unit" class="col-md-3 col-form-label text-md-right">وحدة القياس </label>
                <div class="col-md-6">
                    <input value="<?php if (notempty($item)) echo $item[0]['unit'];
                                    else echo "كغ"; ?>" type="text" class="form-control" name="unit">
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <label for="category_id" class="col-md-3 col-form-label text-md-right">الصنف </label>
                <div class="col-md-6">
                    <select <?php if (notempty($item)) echo 'disabled' ?> class="form-control" name="category_id" id="category_id">
                        <?php
                        $select_categories_query = selectND('categories');
                        $select_categories_exec = mysqli_query($con, $select_categories_query);
                        while ($row = mysqli_fetch_array($select_categories_exec)) {
                            echo "<option value='" . $row['id'] . "' ";
                            if (notempty($item) && $row['id'] == $item[0]['category_id'])
                                echo "selected";
                            if (
                                isset($_GET['category_id']) && !isset($_POST['next']) &&
                                !isset($_POST['last_next']) &&
                                !isset($_POST['previous']) &&
                                !isset($_POST['last_previous']) &&
                                !isset($_POST['current']) && !isset($_POST['add']) && !isset($_POST['code']) && $_GET['category_id'] == $row['id']
                            )
                                echo "selected";
                            echo ">" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label for="note" class="col-md-3 col-form-label text-md-right"> ملاحظات</label>
                <div class="col-md-6">
                    <textarea type="text" id="" class="form-control" name="note"><?php if ((notempty($item))) echo $item[0]['note']; ?></textarea>
                </div>
            </div>

            <div class="row py-4">
                <div class="col-md-5 text-center">
                    <a  href="category_card.php" > <button type="button" class="btn btn-light" id="btn_grp1"  name="">إضافة صنف</button></a>
                    <a href="item_list.php"><button type="button" class="btn btn-light" id="btn_grp1" name="view_items">استعراض المواد</button></a>
                    <!-- <a <?php // if (empty($item)) echo 'disabled' 
                        ?> href="item_card.php"><button type="button" id="btn_grp1" class="" name="item_card">
                            مادة جديدة
                        </button></a> -->
                </div>
                <!-- <a  href="#" class=" btn"  data-target="#add_category" data-toggle="modal">إضافة صنف</a> -->


                <!-- </div> -->
                <!-- <div id="button_col" class="col-md-6 text-center" > -->

                <div class="col-7">
                    <button onclick="confirm('هل تريد اضافة المادة ؟')" <?php if ((notempty($item))) echo 'disabled' ?> type="submit" class="btn btn-light" name="add" id="button-grp2">
                        إضافة
                    </button>
                    <button <?php if ((empty($item))) echo 'disabled' 
                            ?> type="submit" name="update" class="btn btn-light" id="button-grp2">
                        تعديل
                    </button>
                    <button onclick="return confirm('هل تريد بالتأكيد حذف هذه المادة !')" <?php if (empty($item)) echo 'disabled' 
                                                                                            ?> type="submit" class="btn btn-light"  name="delete" id="button-grp2">
                        حذف
                    </button>
                    <button type="button" id="btn-grp" class="btn btn-light" name="new" onclick="window.open('item_card.php' , '_self')">جديد</button>
                    <a href="index.php"><button type="button" class="btn btn-light" id="button-grp2" name="close"> إغلاق</button></a>


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
    if(trim($_POST['name']) != '' && trim($_POST['unit']) != '' ){
        $insert_item_query = insert('items', get_array_from_array($_POST, ['name', 'unit', 'category_id', 'code', 'note']));
        $insert_item_exec = mysqli_query($con, $insert_item_query);
        if ($insert_item_exec) {
            set_local_storage('item_card_code_name', $_POST['code'] . " - " . $_POST['name']);
            open_window_self('item_card.php?category_id=' . $_POST['category_id']);
        }
    }else{
        message_box('لم ينم ادخال المادة لنقص في البيانات');
        open_window_self('item_card.php');
    }
}
if (isset($_POST['update'])) {
    $update_item_query = update('items', get_array_from_array($_POST, ['name', 'unit', 'category_id', 'code', 'note'])) . where('id', $current_item_id_to_update_delete);
    $update_item_exec = mysqli_query($con, $update_item_query);
    if ($update_item_exec) {
        message_box('تم تعديل المادة بنجاح');
        open_window_self("item_card.php?id=" . $current_item_id_to_update_delete);
    }
}

if (isset($_POST['delete'])) {

    $select_bill_item_to_check_delete_query = selectND('bill_item') . andWhere('item_id', $current_item_id_to_update_delete);
    $select_bill_item_to_check_delete_exec = mysqli_query($con, $select_bill_item_to_check_delete_query);
    $number_of_bill_item_rows = mysqli_num_rows($select_bill_item_to_check_delete_exec);

    if ($number_of_bill_item_rows > 0) {
        message_box('لا يمكنك حذف هذه المادة لوجود عمليات عليها !');
        open_window_self_id('item_card.php' , $current_item_id_to_update_delete);
    } else {
        $delete_item_query = forceDelete('items') . where('id', $current_item_id_to_update_delete);
        $delete_item_exec = mysqli_query($con, $delete_item_query);
        if ($delete_item_exec) {
            message_box('تم حذف المادة بنجاح');
            open_window_self("item_card.php");
        }
    }
}

?>


<?php
include('include/footer.php');
?>
<script src="js/iframeResizer.contentWindow.min.js"></script>




<script>
    $(function() {
        $('#category_id').change(function() {
            var category_id = $(this).val();
            if (category_id != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        // $('#code').fadeIn(data);
                        $('#code').val(data);
                        // alert(data);
                    }
                });
            }
        });
        $(function() {
            var category_id = $('#category_id').val();
            if (category_id != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        // $('#code').fadeIn(data);
                        if ($('#code').val() == '') {
                            $('#code').val(data);
                            $('#next').prop('disabled', 'true');
                        }
                        // alert(data);
                    }
                });
            }
        });
    });
</script>
<script>
    document.getElementById('code').onkeyup = function(event) {
        if (event.keyCode == 13) {
            document.getElementById('current').click();
        }
    };
</script>


<script>
    f1("help_file.php?item_section");
</script>