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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style> 
    body{
        background-color:lightgray;
        text-align:right;
    }
    .container{
        /* margin-top: 8%; */
        /* margin-right: 20%; */
        border-style:groove;
        background-color:#5F9EA0;
        /* width: 60%; */

    }
    #search{
        text-align: right;
        justify-content:right;
    }
    #new_account_col{
        text-align: left;
    }
    #close-colum{
        text-align: left;

    }


    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="container my-5">
            <div class="row py-4">

                    <div class="col-3">
                    <input id="search_text" type="search" class="form-control"  placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
                    </div>
                    <div class="col-2" >
                        <button id="search" type="button" class=" btn btn-primary">بحث</button>



                        </div>
                <div class="col-6" id="new_account_col">
                    <a href="account_card.php"><button type="button" class=" btn btn-primary" name="new_account">
                        حساب جديد
                    </button></a>
                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col-10">
                    <table class=" text-center table table-bordered table-hover">
                        <thead class="text-center bg-primary ">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">الحساب</th>
                                <th scope="col">له</th>
                                <th scope="col">علينا</th>
                                </tr>
                        </thead>
                        <tbody id="show">
                            
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-11" id="close-colum">
                    <button type="button" class="btn btn-primary" name="close">
                        إغلاق
                
                    </button>
                                
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
