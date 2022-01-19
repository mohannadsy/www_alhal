<?php
include('include/nav.php');
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles/account_list.css">
</head>
<body>
    <form action="" method="POST">
        <div class="container my-5">
            <div class="row py-4">

                    <div class="col-3" id="search_col">
                        <input id="search_text" type="search" class="form-control"  placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
                    </div>
                    <!-- <div class="col-2" > -->
                      <button id="search" type="button" class=" btn" >بحث</button>
                    <!-- </div> -->
                    
                <div class="col-8" id="new_account_col">
                    <a href="<?=ACCOUNT_CARD?>"><button type="button" class=" btn" name="new_account">
                        حساب جديد
                    </button></a>
                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col-10">
                    <table class=" table table-bordered table-hover text-center">
                        <thead class="">
                            <tr>
                                <th scope="col ">الرقم</th>
                                <th scope="col">الحساب</th>
                                <th scope="col">له</th>
                                <th scope="col">لنا</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                        
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-11" id="close-colum">
                   <a href="ready.php"> <button type="button" class="btn " name="close">
                        إغلاق
                
                    </button></a>
                                
                </div>
            </div>
        </div>
    </form>
    <div id="show"></div>
</body>
</html>

<?php
include('include/footer.php');
?>


<script>
    $(function(){
        $('#search_text').keyup(function(){
            var account_search = $(this).val();
            if(account_search != ''){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{account_search_part : account_search},
                    success:function(data){
                        $('#show').fadeIn();
                        $('#show').html(data);
                    }
                });
            }
        });
    });
</script>
