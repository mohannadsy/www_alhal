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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style> 
    .body{
         background-color: LightGray;
        text-align:right;
    }
    .container{
        /* margin-top: 8%; */
        /* margin-right: 20%; */
        border-style:groove;
        background-color:#5F9EA0;
        /* width: 60%; */

    }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <div class="row py-4">

                <div class="col-4">
                        <input id="search_text" type="search" class=""  placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
                        <button id="search" type="button" class="btn btn-primary">بحث</button>

                </div>
                <div class="col-5">
                    <a href="category_card.php"><button type="button" class=" btn btn-primary" name="new_category">
                        صنف جديد
                    </button></a>
                </div>
                <div class="col-1">
                    <a href="item_card.php"><button type="button" class=" btn btn-primary" name="item_card">
                         بطاقة مادة
                    </button></a>
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
                        <tbody id="show">
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


<script>
    $(function(){
        $('#search_text').keyup(function(){
            var item_search = $(this).val();
            if(item_search != ''){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{item_search : item_search},
                    success:function(data){
                        $('#show').fadeIn();
                        $('#show').html(data);
                    }
                });
            }
        });

        $('#search').click(function(){
            var item_search = $('#search_text').val();
            if(item_search != ''){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{item_search : item_search},
                    success:function(data){
                        $('#show').fadeIn();
                        $('#show').html(data);
                    }
                });
            }
        });
    });
</script>