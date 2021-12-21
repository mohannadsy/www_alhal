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
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <form action="" method="post">
        <div class="container">
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




            <div class="row">
                <div class="col-6">

                    <div class="form-group row">
                        <label for="code" class="col-md-4 col-form-label text-md-right">رمز المادة</label>
                        <div class="col-md-6">
                            <input type="text" value="<?php
                                                        if (isset($_GET['id'])) echo $item['code'];
                                                        else echo get_auto_code($con, 'items', 'code', 'it_');  ?>" id="" class="form-control" name="code" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">المادة </label>
                        <div class="col-md-6">
                            <input value="<?php if (isset($_GET['id'])) echo $item['name']; ?>" type="text" class="form-control" name="name" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unit" class="col-md-4 col-form-label text-md-right">وحدة القياس </label>
                        <div class="col-md-6">
                            <input  value="<?php if (isset($_GET['id'])) echo $item['unit']; ?>" type="text" class="form-control" name="unit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-md-4 col-form-label text-md-right">الصنف </label>
                        <div class="col-md-6">
                            <select class="form-control" name="category_id">
                                <?php
                                $select_categories_query = select('categories');
                                $select_categories_exec = mysqli_query($con, $select_categories_query);
                                while ($row = mysqli_fetch_array($select_categories_exec)) {
                                    echo "<option value='" . $row['id'] . "' ";
                                    if(isset($_GET['id']) && $row['id'] == $item['category_id'])
                                        echo "selected";
                                    echo ">".$row['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="note" class="col-md-4 col-form-label text-md-right"> ملاحظات</label>
                        <div class="col-md-6">
                            <textarea type="text" id="" class="form-control" name="note"><?php if (isset($_GET['id'])) echo $item['note']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-10 py-3">
                        <a href="item_list.php"><button type="button" class="btn btn-primary" name="view_items">استعراض المواد</button></a>

                        <button <?php if (isset($_GET['id'])) echo 'hidden' ?> type="submit" class=" btn btn-primary" name="add">
                            إضافة
                        </button>
                        <button <?php if (!isset($_GET['id'])) echo 'hidden' ?> type="submit" class="btn btn-primary" name="update">
                            تعديل
                        </button>
                        <button onclick="return confirm('هل تريد بالتأكيد حذف هذه المادة !')" <?php if (!isset($_GET['id'])) echo 'hidden' ?> type="submit" class="btn btn-primary" name="delete">
                            حذف
                        </button>
                        <button type="button" class="btn btn-primary" name="close">
                            إغلاق
                        </button>
                    </div>
                    <div class="col-6">

                    </div>
                </div>



    </form>

</body>

</html>

<?php


if (isset($_POST['add'])) {
    $insert_item_query = insert('items', get_array_from_array($_POST, ['name', 'unit', 'category_id', 'code', 'note']));
    $insert_item_exec = mysqli_query($con, $insert_item_query);
    if ($insert_item_exec) {
        open_window_self('item_card.php?message_create=success');
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