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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <form action="" method="POST">
        <div class="container-fluid">
            <div class="row py-4">

                <div class="col-4">
                        <input type="search" class=""  placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-primary">بحث</button>

                </div>
                <div class="col-5">
                    <button type="submit" class=" btn btn-primary" name="new_category">
                        صنف جديد
                    </button>
                </div>
                <div class="col-1">
                    <button type="submit" class=" btn btn-primary" name="item_card">
                         بطاقة مادة
                    </button>
                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col-10">
                    <table class=" text-center table table-bordered table-hover">
                        <thead class="text-center bg-primary ">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">المادة</th>
                                <th scope="col">رمز المادة</th>
                                <th scope="col">الصنف</th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-11 offset-8 ">
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
include('include/footer.php');
?>