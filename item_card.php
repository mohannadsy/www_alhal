<?php
include('include/nav.php');
?>

<!DOCTYPE html>
<html dir="rtl">
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

        <div class="row">
            <div class="col-6">

                <div class="form-group row">
                    <label for="code" class="col-md-4 col-form-label text-md-right">رمز المادة</label>
                    <div class="col-md-6">
                        <input type="text" id="" class="form-control" name="code" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">المادة </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="unit" class="col-md-4 col-form-label text-md-right">وحدة القياس </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="unit">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label text-md-right">الصنف </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="category">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="note" class="col-md-4 col-form-label text-md-right"> ملاحظات</label>
                    <div class="col-md-6">
                        <textarea type="text" id="" class="form-control" name="note"></textarea>
                    </div>
                </div>  
                <div class="col-10 py-3">
                            <button type="button" class="btn btn-primary" name="view items">استعراض المواد</button>

                            <button type="submit" class=" btn btn-primary" name="add">
                                إضافة
                            </button>
                            <button  type="submit" class="btn btn-primary" name="update">
                                تعديل
                            </button>
                            <button type="submit" class="btn btn-primary" name="delete">
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
include('include/footer.php');
?>