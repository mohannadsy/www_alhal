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
    <link rel="stylesheet" href="css/styles/account_list.css">
</head>

<body>
    <form action="" method="POST">
        <div class="container my-5">
            <div class="row py-4">

                <div class="col-3" id="search_col">
                    <input id="search_text" type="search" class="form-control" placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
                </div>
                <!-- <div class="col-2" > -->
                <button id="search" type="button" class=" btn">بحث</button>
                <!-- </div> -->

                <div class="col-8" id="new_account_col">
                    <a href="<?= ACCOUNT_CARD ?>"><button type="button" class=" btn" name="new_account">
                            حساب جديد
                        </button></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <table class=" table table-bordered table-hover text-center">
                        <thead class="">
                            <tr>
                                <th scope="col ">الرقم</th>
                                <th scope="col">الحساب</th>
                                <th scope="col">دائن/له</th>
                                <th scope="col">مدين/لنا</th>
                                <th scope="col">الرصيد الحالي</th>
                            </tr>
                        </thead>
                        <tbody id="show">
                            <?php
                            $select_accounts_query = selectND('accounts');
                            $select_accounts_exec = mysqli_query($con, $select_accounts_query);
                                while ($row = mysqli_fetch_array($select_accounts_exec)) {
                                    $current_maden = get_current_maden_using_id($con , $row['id']);
                                    $current_daen = get_current_daen_using_id($con ,$row['id']);
                                    echo '<tr ondblclick="window.open(\'account_card.php?id=' . $row['id'] . '\' , \'_self\')">';
                                    echo '<td>' . $row['code'] . '</td>';
                                    echo '<td>' . $row['name'] . '</td>' ;
                                    echo '<td>' . $current_daen . '</td>' ;
                                    echo '<td>' . $current_maden . '</td>';
                                    echo '<td>'. ($current_maden - $current_daen) .'</td>';
                                    echo '</tr>';
                                }
                            ?>
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
    $(function() {
        $('#search_text').keyup(function() {
            var account_search = $(this).val();
            if (account_search != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        account_search_part: account_search
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