<?php
include('sql/sql_queries.php');
include('sql/connection.php');
include('helper/config_functions.php');
include('helper/operation_functions.php');

?>

<?php

if (isset($_POST["account_search_all"])) {
    $output = '';
    $query = "select * from accounts where name like '%" . $_POST['account_search_all'] . "%'";
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

if (isset($_POST["account_search_main"])) {
    $output = '';
    $query = "select * from accounts where name like '%" . $_POST['account_search_main'] . "%' and account_id ='0'";
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

if (isset($_POST["account_search_part"])) {
    $output = '';
    $query = "select * from accounts where name like '%" . $_POST['account_search_part'] . "%' and account_id <> '0'";
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


/**
 * linked to account_card.php
 * return auto code
 */
if (isset($_POST['account_id'])) {
    if ($_POST['account_id'] == '0')
        echo get_auto_code($con, "accounts", "code", "", "parent", 'account_id', '0');
    else {
        $select_code_using_account_id_query = "select code,account_id from accounts where account_id = '" . $_POST['account_id'] . "'";
        $prefix = '';
        if (mysqli_query($con, $select_code_using_account_id_query))
            $prefix = $_POST['account_id'];
        echo get_auto_code($con, 'accounts', 'code', $prefix, 'child',  $_POST['account_id']);
    }
}
/**
 * linked to item_card.php
 * return auto code
 */
if (isset($_POST['category_id'])) {
    $select_code_using_category_id_query = "select id,code from categories where id = '" . $_POST['category_id'] . "'";
    $prefix = '';
    $select_code_using_category_id_exec = mysqli_query($con, $select_code_using_category_id_query);
    if ($row = mysqli_fetch_array($select_code_using_category_id_exec))
        $prefix = $row['code'];
    echo get_auto_code($con, 'items', 'code', $prefix, 'child',  $_POST['category_id']);
}


/**
 * linked to com_bill.php
 * return unit for an item
 */
if (isset($_POST['item_code'])) {

    $item_code = get_code_from_input($_POST['item_code']);
    $select_item_id_from_code_query = "select id,code,unit from items where code = '$item_code'";
    $select_item_id_from_code_exec = mysqli_query($con, $select_item_id_from_code_query);
    echo @mysqli_fetch_array($select_item_id_from_code_exec)['unit'];
}

?>


<?php
// include('include/footer.php');
?>