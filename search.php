<?php
include('sql/sql_queries.php');
include('sql/connection.php');
include('helper/config_functions.php');
include('helper/operation_functions.php');
include('helper/ready_queries_functions.php');
include('helper/html_functions.php');
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
/**
 * linked to account list file
 */
if (isset($_POST["account_search_part"])) {
    $output = '';
    $query = "select * from accounts where is_deleted <> '1' and id > 3 and (code like '%" . $_POST['account_search_part'] . "%'
                                        or name like '%" . $_POST['account_search_part'] . "%')";
    $result = mysqli_query($con, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $current_maden = get_current_maden_using_id($con, $row['id']);
            $current_daen = get_current_daen_using_id($con, $row['id']);
            if($row['account_id'] == 0)
            $output .= '<tr class="alert-success" ondblclick="window.open(\'account_card.php?id=' . $row['id'] . '\' , \'_self\')">';
            else
            $output .= '<tr style="background-color:white" ondblclick="window.open(\'account_card.php?id=' . $row['id'] . '\' , \'_self\')">';
            $output .= '<td>' . $row['code'] . '</td>
                <td>' . $row['name'] . '</td>';
                if ($row['account_id'] != 0) {
                    $current_maden = get_current_maden_using_id($con, $row['id']);
                    $current_daen = get_current_daen_using_id($con, $row['id']);
                    $output.= '<td>' . $current_daen . '</td>';
                    $output.= '<td>' . $current_maden . '</td>';
                }else{
                    $current_maden = get_current_maden_for_main_account_using_id($con, $row['id']);
                    $current_daen = get_current_daen_for_main_account_using_id($con, $row['id']);
                    $output.= '<td>' . $current_daen . '</td>';
                    $output.= '<td>' . $current_maden . '</td>';
                }

            
                $output .= '<td>' . ($current_maden - $current_daen) . '</td>';
                if ($row['account_id'] != 0)
                $output.='<td><button type="button"  class="btn btn-success" onclick="window.open(\'accountStatment.php?account='.$row['code'] . ' - ' . $row['name'].'\' , \'_self\')">??????</button></td>';
                else
                $output.= '<td></td>';
            $output .= '</tr>';
        }
    }
    echo $output;
}


if (isset($_POST["item_search"])) {
    $output = '';
    // $query = selectWithTable('items','categories').andLike('items.name' , $_POST['item_search']);
    // echo $query;
    $query = "select DISTINCT i.id as item_id,
              c.id as cat_id,
              i.name as item_name,
              c.name as cat_name,
              i.code as item_code from items as i , categories as c where c.id = i.category_id and ( i.name like '%" . $_POST['item_search'] . "%' or i.code like '%" . $_POST['item_search'] . "%' or c.name like '%" . $_POST['item_search'] . "%' ) and i.is_deleted <> '1' ";
    $result = mysqli_query($con, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<tr ondblclick="window.open(\'item_card.php?id=' . $row['item_id'] . '\' , \'_self\')">';
            $output .= '<td>' . $row['item_id'] . '</td>
            <td>' . $row['item_code'] . '</td>
            <td>' . $row['item_name'] . '</td>
            
            <td>' . $row['cat_name'] . '</td>';
            $output .= "<td>
                        <button type='button' class='btn btn-success' onclick='window.open(\"item_card.php?id=" . $row['item_id'] . "\" , \"_self\")'>??????????</button>
                        <button type='submit' name='delete'  class='btn btn-primary'
                                    onclick='document.getElementById(\"id\").value = \"" . $row['item_id'] . "\";
                                    return confirm(\"???? ???????? ???????????????? ?????? ?????? ???????????? !\");'>??????</button>
                        </td>";
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
        $select_code_using_account_id_query = "select code,account_id from accounts where id = '" . $_POST['account_id'] . "'";
        $prefix = '';
        if (mysqli_query($con, $select_code_using_account_id_query)) {
            $prefix = mysqli_fetch_array(mysqli_query($con, $select_code_using_account_id_query))['code'];
        }
        echo get_auto_code($con, 'accounts', 'code', $prefix, 'child', 'account_id', $_POST['account_id']);
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
    echo get_auto_code($con, 'items', 'code', $prefix, 'child', 'category_id', $_POST['category_id']);
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


/**
 * linked to com_bill_open.php 
 *  return bills
 */
if (isset($_POST['radio_bill_value'])) {
    $select_all_bills_query = selectND('bills');
    if ($_POST['radio_bill_value'] == 'not_sell_bills')
        $select_all_bills_query = selectND('bills') . andWhere('buyer_id', 0);
    if ($_POST['radio_bill_value'] == 'sell_bills')
        $select_all_bills_query = selectND('bills') . andWhere('buyer_id', 0, '<>');
    if ($_POST['radio_bill_value'] == 'all_bills')
        $select_all_bills_query = selectND('bills');
    $select_all_bills_exec = mysqli_query($con, $select_all_bills_query);
    while ($row = mysqli_fetch_array($select_all_bills_exec)) {
        echo "<tr>";
        echo "<td>" . $row['code'] . "</td>";
        $select_seller_query = selectWhereId('accounts', $row['seller_id']);
        $select_seller_exec = mysqli_query($con, $select_seller_query);
        $seller = mysqli_fetch_array($select_seller_exec);
        echo "<td>" . $seller['code'] . " - " . $seller['name'] . "</td>";
        echo "<td>" . $row['real_price'] . "</td>";

        if ($row['buyer_id'] != '0') {
            $select_buyer_query = selectWhereId('accounts', $row['buyer_id']);
            $select_buyer_exec = mysqli_query($con, $select_buyer_query);
            $buyer = mysqli_fetch_array($select_buyer_exec);
            echo "<td>" . $buyer['code'] . " - " . $buyer['name'] . "</td>";
        } else {
            echo "<td>" . "???? ???????? ??????????" . "</td>";
        }
        echo "<td>" . $row['total_price'] . "</td>";
        if ($row['buyer_id'] != '0') {
            echo "<td class=' text-white'><center> <div class='sold'> " . "??????????" . "</div></center></td><td>
                <a href='com_bill.php?code=" . $row['code'] . "'><button type='button' class='btn btn-success'>?????? ????????????????</button></a>
                </td>";
        } else {
            echo "<td class='text-white' ><center> <div class='not_sold'>" . "?????? ??????????" . "</div></center></td><td>
                <a href='com_bill.php?code=" . $row['code'] . "'><button type='button' class='btn btn-primary'>?????? ????????????????</button></a>
                </td>";
        }
        echo "</tr>";
    }
}




/**
 * linked to report comission reports search
 */
if (isset($_POST['radio_value']) && isset($_POST['text_value'])) {
    $and_where_condition = '';

    if ($_POST['radio_value'] == 'items' && $_POST['text_value'] != '') {
        $and_where_condition = " and items.code = '" . get_code_from_input($_POST['text_value']) . "'";
    }
    if ($_POST['radio_value'] == 'accounts' && $_POST['text_value'] != '') {
        $and_where_condition = " and (seller_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_POST['text_value'])) . "'
                                or buyer_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_POST['text_value'])) . "')";
    }
    if ($_POST['radio_value'] == 'categories' && $_POST['text_value'] != '') {
        $and_where_condition = " and category_id = '" . getId($con, 'categories', 'code', get_code_from_input($_POST['text_value']))  . "'";
    }
    $total_comission = '0';
    $total_bill = '0';
    $real_bill = '0';

    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $select_items_using_id_query = "select DISTINCT items.code as item_code,
                                                            bills.code as bill_code,
                                                            bills.id as bill_id,total_item_price,com_ratio,
                                                            unit, date, buyer_id,seller_id,
                                                            name,currency,
                                                            com_value,category_id,
                                                            real_weight , total_weight
                                                             from bill_item, items,bills 
                                                             where items.id = bill_item.item_id and bills.id = bill_item.bill_id $and_where_condition 
                                                             and date between '$from_date' and '$to_date'";
    $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
    $counter_for_com_id = 0;
    while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
        $category_name = get_value_from_table_using_id($con, 'categories', 'name', $row['category_id']);
        $buyer_name = get_name_from_table_using_id($con, 'accounts', $row['buyer_id']);
        $seller_name = get_name_from_table_using_id($con, 'accounts', $row['seller_id']);
        $bill_code = get_value_from_table_using_id($con, 'bills', 'code', $row['bill_id']);
        echo "<tr ondblclick='window.open(\"com_bill.php?code=" . $bill_code . "\" , \"_self\")'>";
        echo "<td>" . $row['bill_code'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $buyer_name . "</td>";
        echo "<td>" . $seller_name . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['total_weight'] . "</td>";
        echo "<td>" . $row['real_weight'] . "</td>";
        $current_com_value = ($row['com_ratio'] / 100) * $row['total_item_price'];
        echo "<td id='com_" . $counter_for_com_id++ . "'>" . $current_com_value . "</td>";
        echo "<td>" . $row['total_item_price'] . "</td>";
        echo "</tr>";
        $total_comission += $current_com_value;
        $total_bill += $row['total_item_price'];
    }
    $real_bill = $total_bill - $total_comission;
    echo "<input type='hidden' id='total_hidden_comission' value = '" . $total_comission . "'>";
    echo "<input type='hidden' id='total_hidden_bill' value = '" . $total_bill . "'>";
    echo "<input type='hidden' id='real_hidden_bill' value = '" . $real_bill . "'>";
}


/**
 * linked to report items reports search
 */
if (isset($_POST['radio_value_from_report_item']) && isset($_POST['text_value_from_report_item'])) {
    $and_where_condition = '';

    if ($_POST['radio_value_from_report_item'] == 'items' && $_POST['text_value_from_report_item'] != '') {
        $and_where_condition = " and items.code = '" . get_code_from_input($_POST['text_value_from_report_item']) . "'";
    }
    if ($_POST['radio_value_from_report_item'] == 'accounts' && $_POST['text_value_from_report_item'] != '') {
        $and_where_condition = " and (seller_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_POST['text_value_from_report_item'])) . "'
                                or buyer_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_POST['text_value_from_report_item'])) . "')";
    }
    if ($_POST['radio_value_from_report_item'] == 'categories' && $_POST['text_value_from_report_item'] != '') {
        $and_where_condition = " and category_id = '" . getId($con, 'categories', 'code', get_code_from_input($_POST['text_value_from_report_item']))  . "'";
    }
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $select_items_using_id_query = "select DISTINCT items.code as item_code,
                                bills.code as bill_code,
                                bills.id as bill_id,
                                unit, date, buyer_id,seller_id,
                                category_id,
                                name,currency,
                                real_weight,real_price,
                                total_weight,total_price,
                                com_value,com_ratio
                                from bill_item, items,bills 
                              where items.id = bill_item.item_id and bills.id = bill_item.bill_id $and_where_condition 
                                                             and date between '$from_date' and '$to_date'";
    $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
    while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
        $category_name = get_value_from_table_using_id($con, 'categories', 'name', $row['category_id']);
        // $buyer_name = get_name_from_table_using_id($con, 'accounts', $row['buyer_id']);
        // $seller_name = get_name_from_table_using_id($con, 'accounts', $row['seller_id']);
        echo "<tr ondblclick='window.open(\"com_bill.php?code=" . $row['bill_code'] . "\" , \"_self\")'>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['bill_code'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td class='in'>" . $row['real_weight'] . "</td>";
        echo "<td class='in'>" . $row['real_price'] . "</td>";
        $inbox_weight = $row['real_weight'];
        $inbox_price = $row['real_price'];
        $outbox_price = '0';
        $outbox_weight = '0';
        if ($row['buyer_id'] == 0)
            echo "<td class='out'>" . '0' . "</td>";
        else {
            echo "<td class='out'>" . $row['real_weight'] . "</td>";
            $outbox_weight = $row['real_weight'];
        }
        if ($row['buyer_id'] == 0)
            echo "<td class='out'>" . '0' . "</td>";
        else {
            echo "<td class='out'>" . $row['real_price'] . "</td>";
            $outbox_price = $row['real_price'];
        }
        echo "<td>" . ($inbox_weight - $outbox_weight) . "</td>";
        echo "<td>" . ($inbox_price - $outbox_price) . "</td>";
        echo "</tr>";
    }
}

?>


<?php
// include('include/footer.php');
?>