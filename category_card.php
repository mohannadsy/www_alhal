<?php
include('include/nav.php');
?>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles/category_card.css">

</head>

<?php
$select_last_next_category_query = selectND('categories') . ' order by code desc limit 1 ';
$select_last_next_category_exec = mysqli_query($con, $select_last_next_category_query);
$last_next_code = mysqli_fetch_array($select_last_next_category_exec)['code'];

$select_last_previous_category_query = selectND('categories') . ' limit 1 ';
$select_last_previous_category_exec = mysqli_query($con, $select_last_previous_category_query);
$last_previous_code = mysqli_fetch_array($select_last_previous_category_exec)['code'];

$current_category_code = get_auto_code($con, 'categories', 'code', '', 'parent');
if (
    isset($_GET['code']) &&
    !isset($_POST['next']) &&
    !isset($_POST['last_next']) &&
    !isset($_POST['previous']) &&
    !isset($_POST['last_previous']) &&
    !isset($_POST['current']) && !isset($_POST['add']) && !isset($_POST['code'])
) {
    // $current_category_code = get_value_from_table_using_id($con, 'categories', 'code', $_GET['id']);
    $current_category_code = $_GET['code'];
    $_POST['code'] = $current_category_code;
    $_POST['current'] = $current_category_code;
}
$next_category_code = $current_category_code;
if (isset($_POST['code']))
    $current_category_code = $_POST['code'];
$previous_category_code = 1;
$current_category_code_to_update_delete = $current_category_code;
if ($current_category_code < $next_category_code) {
    $next_category_code_query = selectND('categories') . andWhereLarger('code', $current_category_code);
    $next_category_code_exec = mysqli_query($con, $next_category_code_query);
    @$next_category_code = mysqli_fetch_array($next_category_code_exec)['code'];
}
if ($current_category_code > $previous_category_code) {
    $previous_category_code_query = selectND('categories') . andWhereSmaller('code', $current_category_code) . ' order by code desc';
    $previous_category_code_exec = mysqli_query($con, $previous_category_code_query);
    $previous_category_code = mysqli_fetch_array($previous_category_code_exec)['code'];
}
$category = [];
if (isset($_POST['next'])) {
    $category_select = selectND('categories') . andWhere('code', $next_category_code);
    $category_exec = mysqli_query($con, $category_select);
    $category_rows = mysqli_num_rows($category_exec);
    while ($category_ = mysqli_fetch_array($category_exec)) {
        $category[] = $category_;
    }
    $current_category_code_to_update_delete = $next_category_code;
}
if (isset($_POST['last_next'])) {
    $category_select = selectND('categories') . andWhere('code', $last_next_code);
    $category_exec = mysqli_query($con, $category_select);
    $category_rows = mysqli_num_rows($category_exec);
    while ($category_ = mysqli_fetch_array($category_exec)) {
        $category[] = $category_;
    }
    $current_category_code_to_update_delete = $last_next_code;
}
if (isset($_POST['previous'])) {
    $category_select = selectND('categories') . andWhere('code', $previous_category_code);
    $category_exec = mysqli_query($con, $category_select);
    $category_rows = mysqli_num_rows($category_exec);
    while ($category_ = mysqli_fetch_array($category_exec)) {
        $category[] = $category_;
    }
    $current_category_code_to_update_delete = $previous_category_code;
}

if (isset($_POST['last_previous'])) {
    $category_select = selectND('categories') . andWhere('code', $last_previous_code);
    $category_exec = mysqli_query($con, $category_select);
    $category_rows = mysqli_num_rows($category_exec);
    while ($category_ = mysqli_fetch_array($category_exec)) {
        $category[] = $category_;
    }
    $current_category_code_to_update_delete = $last_previous_code;
}
if (isset($_POST['current']) || isset($_POST['update']) || isset($_POST['print_seller']) || isset($_POST['print_buyer'])) {
    $category_select = selectND('categories') . andWhere('code', $_POST['code']);
    $category_exec = mysqli_query($con, $category_select);
    $category_rows = mysqli_num_rows($category_exec);
    if ($category_rows > 0)
        while ($category_ = mysqli_fetch_array($category_exec)) {
            $category[] = $category_;
        }
    else {
        $_POST['code'] = get_auto_code($con, 'categories', 'code', '', 'parent');
        $current_category_code_to_update_delete = $_POST['code'];
    }
}

// message_box("current = $current_category_code , next = $next_category_code , previous = $previous_category_code , last_previous = $last_previous_code , last_next = $last_next_code");
?>

<body>
    <form id="category" action="" method="post">
        <?php
        success_error_create_message('تم انشاء الصنف بنجاح', 'عئرا لم يتم انشاء الصنف');
        success_error_update_message('تم تعديل الصنف بنجاح', 'عئرا لم يتم تعديل الصنف');
        success_error_delete_message('تم حذف الصنف بنجاح', 'عئرا لم يتم حذف الصنف');
        ?>

        <div class="container" >
            <div class="row py-3">
                <div class="col-8" >
                    <h4>بطاقة صنف</h4>

                </div>
                <div class="col-4 text-end">
                    <div class="row justify-content-end" style="margin-left: 15;">

        
                    <button name="last_next" id="last_next"><span>&#171;</span> </button>
                        <button name="next" id="next"><span>&#8249;</span> </button>
                        <button name="previous" id="previous"> <span>&#8250;</span> </button>
                        <button name="last_previous" id="last_previous"><span>&#187;</span> </button>
                        <button name="current" id="current" hidden></button>
                    </div>

                </div>
            </div>

            <div class="form-group row justify-content-center ">
                <label for="code" class=" col-sm-3 col-md-3 col-form-label text-md-right">رمز الصنف</label>
                <div class="col-md-6">
                    <input type="number" value="<?php if (($next_category_code == '' && isset($_POST['next'])) ||
                                        (isset($_POST['previous']) && $previous_category_code == '') ||
                                        (!isset($_POST['code']))
                                    )
                                        echo get_auto_code($con, 'categories', 'code', '', 'parent');
                                    elseif (isset($_POST['next'])) echo $next_category_code;
                                    elseif (isset($_POST['last_next'])) echo $last_next_code;
                                    elseif (isset($_POST['previous'])) echo $previous_category_code;
                                    elseif (isset($_POST['last_previous'])) echo $last_previous_code;
                                    elseif (isset($_POST['current']) || isset($_POST['update'])) echo $_POST['code']; ?>" id="code" class="form-control" name="code">
                </div>
            </div>
                               
            <div class="form-group row justify-content-center ">
                <label for="name" class="col-sm-3  col-md-3 col-form-label text-md-right">اسم الصنف</label>
                <div class="col-md-6">
                    <input value="<?php if (notempty($category)) echo $category[0]['name']; ?>" type="text" class="form-control" name="name" autofocus>
                </div>
            </div>

            <div class="form-group row justify-content-center ">
                <label for="note" class="col-sm-3  col-md-3 col-form-label text-md-right"> ملاحظات</label>
                <div class="col-md-6">
                    <textarea type="text" id="" class="form-control" name="note"> <?php if (notempty($category)) echo $category[0]['note']; ?></textarea>

                </div>
            </div>

            <div class="row mt-4 pt-3">
                <div class="col-4 text-center">
                    <a href="item_card.php"><button type="button" class="btn btn-light"  name="" id="btn-grp1">
                            بطاقة مادة
                        </button>
                    </a>


                </div>

                <div id="button_col" class="col-sm-12  col-md-7 ">
                    <button <?php if (notempty($category)) echo 'disabled' ?> type="submit" class="btn btn-light " name="add" id="button_grp">
                        إضافة
                    </button>
                    <button <?php if (empty($category)) echo 'disabled' ?> type="submit" class="btn btn-light" id="button_grp" name="update">
                        تعديل
                    </button>
                    <button onclick="return confirm('هل تريد بالتأكيد حذف هذا الصنف !')" <?php if (empty($category)) echo 'disabled' ?> type="submit" id="button_grp" class="btn btn-light" name="delete">
                        حذف
                    </button>
                    <a href="index.php"><button type="button" class="btn btn-light"  name="close" id="button_grp">
                        إغلاق
                    </button></a>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
<?php

if (isset($_POST['add'])) {
    $insert_category_query = insert('categories', get_array_from_array($_POST, ['name', 'code', 'note']));
    $insert_category_exec = mysqli_query($con, $insert_category_query);
    if ($insert_category_exec) {
        open_window_self('category_card.php?message_create=success');
    }
}
if (isset($_POST['update'])) {
    $update_category_query = update('categories', get_array_from_array($_POST, ['name', 'code', 'note'])) . where('code',$current_category_code_to_update_delete);
    $update_category_exec = mysqli_query($con, $update_category_query);
    if ($update_category_exec) {
        open_window_self("category_card.php?code=" .$current_category_code_to_update_delete. "&message_update=success");
    }
}

if (isset($_POST['delete'])) {

    $select_items_to_check_delete_query = selectND('items') . andWhere('category_id', getId($con, 'categories', 'code', $current_category_code_to_update_delete));
    $select_items_to_check_delete_exec = mysqli_query($con, $select_items_to_check_delete_query);
    if (mysqli_num_rows($select_items_to_check_delete_exec) > 0) {
        message_box('لا يمكن حذف هذا الصنف لارتباطه بمواد !');
        open_window_self_code(CATEGORY_CARD , $current_category_code_to_update_delete);
    } else {
        $delete_category_query = delete('categories') . where('code', $current_category_code_to_update_delete);
        $delete_category_exec = mysqli_query($con, $delete_category_query);
        if ($delete_category_exec) {
            open_window_self("category_card.php?message_delete=success");
        }
    }
}
?>
<?php
// mysqli_query($con , resetAutoIncrement('categories'));
include('include/footer.php');
?>
<script>
    document.getElementById('code').onchange = function(event) {
        // if (event.keyCode == 13) {
            document.getElementById('current').click();
        // }
    };
</script>


<script>
    f1("help_file.php?category_section");
</script>
