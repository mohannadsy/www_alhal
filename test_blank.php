<?php
include('include/nav.php');
?>

<!-- // "prefix_code": {
    //     "account": "acc_",
    //     "category": "cat_",
    //     "item": "it_"
    // } -->
<h1>Test Blank</h1>
<div class="container" id="container">

    <table class="table border">
        <tr>
            <th>Header</th>
        </tr>
        <?php
             $select = select('accounts');
             $select_exec = mysqli_query($con, $select);
             
            foreach(mysqli_fetch_all($select_exec) as $row)
                echo "<tr ondblclick='open_account_with_id(\"".$row[0]."\")'>
                    <td>".
                        $row[1]
                    ."</td>
                </tr></a>"
        ?>
    </table>
</div>
<script>
    function open_account_with_id(id){
        window.open('account_card.php?id=' + id , '_self');
    }
</script>
<?php
include('include/footer.php');
?>