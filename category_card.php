<?php
include('include/nav.php');
?>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            justify-content:center ;
            align-items:center ;
            background-color: LightGray;
        }
        .container{
            margin-top:12%; 
        }
        #category_col{
            background-color:#5F9EA0 ;
            border-style:groove; 
            border-radius: 25px;
        }
        #button_col{
            margin-top:5%;

        }
    </style>
</head>

<body>
    <form id="category" action="" method="post">
        <?php
        success_error_create_message('تم انشاء الصنف بنجاح', 'عئرا لم يتم انشاء الصنف');
        success_error_update_message('تم تعديل الصنف بنجاح', 'عئرا لم يتم تعديل الصنف');
        success_error_delete_message('تم حذف الصنف بنجاح', 'عئرا لم يتم حذف الصنف');
        ?>

        <?php
        $category = [];
        if (isset($_GET['id'])) {
            $select_category_query = selectWhereId('categories', $_GET['id']);
            $select_category_exec = mysqli_query($con, $select_category_query);
            $category = mysqli_fetch_array($select_category_exec);
        }
        ?>
        <div class="container" >
            <div class="row justify-content-center">
                <div id="category_col" class="col-sm-10 col-md-8 py-5">

                    <div class="form-group row">
                        <label for="code" class="col-md-2 col-form-label text-md-right">رمز الصنف</label>
                        <div class="col-md-6">
                            <input value="<?php
                                            if (isset($_GET['id'])) echo $category['code'];
                                            else echo get_auto_code($con, 'categories', 'code', '' , 'parent');
                                            ?>" type="text" id="" class="form-control" name="code" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">اسم الصنف</label>
                        <div class="col-md-6">
                            <input value="<?php if (isset($_GET['id'])) echo $category['name']; ?>" type="text" class="form-control" name="name" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="note" class="col-md-2 col-form-label text-md-right"> ملاحظات</label>
                        <div class="col-md-6">
                            <textarea type="text" id="" class="form-control" name="note"> <?php if (isset($_GET['id'])) echo $category['note']; ?></textarea>
                           
                        </div>
                    </div>
                    <div id="button_col" class="col-md-10 ">
                        <button type="submit" class="btn btn-primary" name="add">
                            إضافة
                        </button>
                        <button <?php if (!isset($_GET['id'])) echo 'hidden' ?> type="submit" class="btn btn-primary" name="update">
                            تعديل
                        </button>
                        <button onclick="return confirm('هل تريد بالتأكيد حذف هذا الصنف !')" <?php if (!isset($_GET['id'])) echo 'hidden' ?> type="submit" class="btn btn-primary" name="delete">
                            حذف
                        </button>
                        <button type="button" class="btn btn-primary" name="close">
                            إغلاق
                        </button>
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
    $update_category_query = updateWhereId('categories',$_GET['id'] , get_array_from_array($_POST, ['name', 'code', 'note']));
    $update_category_exec = mysqli_query($con, $update_category_query);
    if ($update_category_exec) {
        open_window_self("category_card.php?id=".$_GET['id']."&message_update=success");
    }
}

if (isset($_POST['delete'])) {
    $delete_category_query = delete('categories').where('code' , $_POST['code']);
    $delete_category_exec = mysqli_query($con, $delete_category_query);
    if ($delete_category_exec) {
        open_window_self("category_card.php?message_delete=success");
    }
}
?>
<?php
// mysqli_query($con , resetAutoIncrement('categories'));
include('include/footer.php');
?>