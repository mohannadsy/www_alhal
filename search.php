<?php
include('sql/sql_queries.php');
include('sql/connection.php');
?>

<?php

if (isset($_POST["account_search"])) {
    $output = '';
    $query = "select * from accounts where name like '%" . $_POST['account_search'] . "%'";
    $result = mysqli_query($con, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<tr ondblclick="window.open(\'account_card.php?id=' . $row['id'] . '\' , \'_self\')">';
            $output .= '<td>' . $row['id'] . '</td>
            <td>' . $row['name'] . '</td>';
            if ($row['fund'] > 0) {
                $output .= '<td>' . trim($row['fund'], '-') . '</td>';
                $output .= '<td></td>';
            }
            if ($row['fund'] < 0) {
                $output .= '<td></td>';
                $output .= '<td>' . trim($row['fund'], '-') . '</td>';
            }
            $output .= '</tr>';
        }
    }
    echo $output;
}


if (isset($_POST["item_search"])) {
    $output = '';
    // $query = selectWithTable('items','categories').andLike('items.name' , $_POST['item_search']);
    // echo $query;
    $query = "select i.id as item_id,
              c.id as cat_id,
              i.name as item_name,
              c.name as cat_name,
              i.code as item_code from items as i , categories as c where c.id = i.category_id " . andLike('i.name', $_POST['item_search']);
    $result = mysqli_query($con, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<tr ondblclick="window.open(\'item_card.php?id=' . $row['item_id'] . '\' , \'_self\')">';
            $output .= '<td>' . $row['item_id'] . '</td>
            <td>' . $row['item_name'] . '</td>
            <td>' . $row['item_code'] . '</td>
            <td>' . $row['cat_name'] . '</td>';
            $output .= '</tr>';
        }
    }
    echo $output;
}

?>


<?php
include('include/footer.php');
?>