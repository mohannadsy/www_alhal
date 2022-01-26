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
    <link rel="stylesheet" href="css/styles/item_list.css">
    <style>

    </style>
</head>

<body>
    <form action="" method="POST">
        <div class="container my-5">
            <?php
            success_error_create_message('تم انشاء المادة بنجاح', 'عئرا لم يتم انشاء المادة');
            success_error_update_message('تم تعديل المادة بنجاح', 'عئرا لم يتم تعديل المادة');
            success_error_delete_message('تم حذف المادة بنجاح', 'عئرا لم يتم حذف المادة');
            ?>
            <div class="row py-4">

                <div class="col-3" id="search_col">
                    <input id="search_text" type="search" class="form-control" placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
                </div>

                <button id="search" type="button" class=" btn">بحث</button>

                <div class="col-8 " id="categry_col">
                    <a href="category_card.php"><button type="button" id="btn_grp" class=" btn " name="new_category">
                            صنف جديد
                        </button></a>
                    <a href="item_card.php"><button type="button" id="btn_grp" class=" btn" name="item_card">
                            بطاقة مادة
                        </button></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <table class="table table-bordered table-hover">
                        <thead id="thead_col">
                            <tr>
                                <th scope="col">الرقم</th>
                                <th scope="col">المادة</th>
                                <th scope="col">رمز المادة</th>
                                <th scope="col">الصنف</th>
                                <th scope="col">عمليات</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                            <?php
                            $select_all_items_query = selectND('items');
                            $select_all_items_exec = mysqli_query($con, $select_all_items_query);
                            $count = 1;
                            while ($item = mysqli_fetch_array($select_all_items_exec)) {
                                echo '<tr  ondblclick="window.open(\'item_card.php?id=' . $item['id'] . '\' , \'_self\')">';
                                echo "<td>" . $count++ . "</td>";
                                echo "<td>" . $item['name'] . "</td>";
                                echo "<td>" . $item['code'] . "</td>";
                                $select_category_query = selectND('categories') . andWhere('id', $item['category_id']);
                                $select_category_exec = mysqli_query($con, $select_category_query);
                                $category = mysqli_fetch_array($select_category_exec);
                                echo "<td>" . $category['name'] . "</td>";
                                echo "<td>
                                    <button type='button' onclick='window.open(\"item_card.php?id=" . $item['id'] . "\" , \"_self\")'>تعديل</button>
                                    <button type='submit' name='delete' 
                                                onclick='document.getElementById(\"id\").value = \"" . $item['id'] . "\";
                                                return confirm(\"هل تريد بالتأكيد حذف هذه المادة !\");'>حذف</button>
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                            <input type="hidden" name="id" id="id" value="0">
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="row py-3">
                <div class="col-12 " id="close_col">
                    <a href=""><button type="button" class="btn" id="close_btn" name="close">
                            إغلاق

                        </button></a>

                </div>
            </div>
        </div>
    </form>

</body>

</html>

<?php
include('include/footer.php');
?>


<?php

if (isset($_POST['delete'])) {

    $select_bill_item_to_check_delete_query = selectND('bill_item') . andWhere('item_id',  $_POST['id']);
    $select_bill_item_to_check_delete_exec = mysqli_query($con, $select_bill_item_to_check_delete_query);
    $number_of_bill_item_rows = mysqli_num_rows($select_bill_item_to_check_delete_exec);

    if ($number_of_bill_item_rows > 0) {
        message_box('لا يمكنك حذف هذه المادة لوجود عمليات عليها !');
    } else {
        $delete_item_query = deleteWhereId('items', $_POST['id']);
        $delete_item_exec = mysqli_query($con, $delete_item_query);
        if ($delete_item_exec) {
            open_window_self("item_list.php?message_delete=success");
        }
    }
}

?>


<script>
    $(function() {
        $('#search_text').keyup(function() {
            var item_search = $(this).val();
            if (item_search != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        item_search: item_search
                    },
                    success: function(data) {
                        $('#show').fadeIn();
                        $('#show').html(data);
                    }
                });
            }
        });

        $('#search').click(function() {
            var item_search = $('#search_text').val();
            if (item_search != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        item_search: item_search
                    },
                    success: function(data) {
                        $('#show').fadeIn();
                        $('#show').html(data);
                    }
                });
            }
        });
    });
</script>