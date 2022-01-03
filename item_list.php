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
    body{
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
    #categry_col{
        text-align: left;
    }
    #close_col{
        text-align: left;
    }
    #thead_col{
        text-align: center; 
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
                    
                      <button id="search" type="button" class=" btn btn-primary">بحث</button>

                <div class="col-8 "id="categry_col" >
                    <a href="category_card.php"><button type="button" class=" btn btn-primary" name="new_category">
                        صنف جديد
                    </button></a>
                    <a href="item_card.php"><button type="button" class=" btn btn-primary" name="item_card">
                         بطاقة مادة
                    </button></a>
                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col-10">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-primary " id="thead_col">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">المادة</th>
                                <th scope="col">رمز المادة</th>
                                <th scope="col">الصنف</th>
                                </tr>
                        </thead>
                        <tbody id="show">
                            <?php
                                $select_all_items_query = select('items');
                                $select_all_items_exec = mysqli_query($con , $select_all_items_query);
                                $count = 1;
                                while($item = mysqli_fetch_array($select_all_items_exec)){
                                    echo "<tr>";
                                    echo "<td>".$count++."</td>";
                                    echo "<td>".$item['name']."</td>";
                                    echo "<td>".$item['code']."</td>";
                                    $select_category_query = select('categories').where('id' , $item['category_id'] );
                                    $select_category_exec = mysqli_query($con, $select_category_query);
                                    $category = mysqli_fetch_array($select_category_exec);
                                    echo "<td>".$category['name']."</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-11" id="close_col">
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