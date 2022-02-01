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
        <div class="container-fluid">
            <div class="row mx-5 py-3" id="header">
                <h3>قائمة الحسابات</h3>
            </div>

            <div class="row py-3">
                <div class="col-3" id="search_col">
                    <div class="row justify-content-end">
                        <input id="search_text" type="search" class="form-control" placeholder="بحث" aria-label="Search" aria-describedby="search-addon" />
                        <button id="search" type="button" class=" btn">بحث</button>
                    </div>
                </div>

                <div class="col-8" id="new_account_col">
                    <button type="button" class=" btn" name="">
                        طباعة
                    </button>
                    <a href="<?= ACCOUNT_CARD ?>"><button type="button" class=" btn" name="new_account">
                            حساب جديد
                        </button></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10" id="tableFixHead">
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
                            $select_accounts_query = selectND('accounts') . andWhereLarger('id', '3') . andWhere('account_id', 0);
                            $select_accounts_exec = mysqli_query($con, $select_accounts_query);
                            while ($row = mysqli_fetch_array($select_accounts_exec)) {
                                echo '<tr class="alert-success" ondblclick="window.open(\'account_card.php?id=' . $row['id'] . '\' , \'_self\')">';
                                echo '<td>' . $row['code'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';

                                $current_maden = get_current_maden_for_main_account_using_id($con, $row['id']);
                                $current_daen = get_current_daen_for_main_account_using_id($con, $row['id']);
                                echo '<td>' . $current_daen . '</td>';
                                echo '<td>' . $current_maden . '</td>';

                                echo '<td>' . ($current_maden - $current_daen) . '</td>';
                                echo '</tr>';
                                $select_accounts_child_query = selectND('accounts'). andWhereLarger('id', '3') . andWhere('account_id', $row['id']);
                                $select_accounts_child_exec = mysqli_query($con, $select_accounts_child_query);
                                while ($row_child = mysqli_fetch_array($select_accounts_child_exec)) {

                                    echo '<tr ondblclick="window.open(\'account_card.php?id=' . $row_child['id'] . '\' , \'_self\')">';
                                    echo '<td>' . $row_child['code'] . '</td>';
                                    echo '<td>' . $row_child['name'] . '</td>';

                                    $current_maden = get_current_maden_using_id($con, $row_child['id']);
                                    $current_daen = get_current_daen_using_id($con, $row_child['id']);
                                    echo '<td>' . $current_daen . '</td>';
                                    echo '<td>' . $current_maden . '</td>';


                                    echo '<td>' . ($current_maden - $current_daen) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- <div class="row py-3">
                <div class="col-11" id="close-colum">
                    <a href="ready.php"> <button type="button" class="btn " name="close">
                            إغلاق

                        </button></a>

                </div>
            </div> -->
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