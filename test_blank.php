<?php
include('include/nav.php');
?>

<!-- // "prefix_code": {
    //     "account": "acc_",
    //     "category": "cat_",
    //     "item": "it_"
    // } -->

<style>
    .context-menu {
        position: absolute;
        text-align: center;
        background-color: lightgray;
        border: 1px solid black;
    }

    .context-menu ul {
        padding: 0px;
        margin: 0px;
        min-width: 150px;
        list-style: none;
    }

    .context-menu ul a li {
        text-decoration: none;
        color: black
    }

    .context-menu ul a li:hover {
        background-color: darkgray;
    }
</style>
<h1>Test Blank</h1>
<div id="contextMenu" class="context-menu" style="display: none;">
    <ul>
        <a href="#">
            <li> hello</li>
        </a>
        <a href="#">
            <li> hello 2</li>
        </a>
    </ul>
</div>

<div class="container" id="container">

    <table class="table border">
        <tr>
            <th>Header</th>
        </tr>
        <?php
        $select = select('accounts');
        $select_exec = mysqli_query($con, $select);

        foreach (mysqli_fetch_all($select_exec) as $row)
            echo "<tr ondblclick='open_account_with_id(\"" . $row[0] . "\")'>
                    <td>" .
                $row[1]
                . "</td>
                </tr></a>"
        ?>
    </table>
</div>
<script>
    function open_account_with_id(id) {
        window.open('account_card.php?id=' + id, '_self');
    }
</script>
<?php
include('include/footer.php');
?>


<script>
    /* Context menu only when you click in #page_wrapper (not in it's children) */


    function rightClick(container_id, menu_id, dictionary={}) {
        $(`#${container_id}`).bind("contextmenu", function(event) {
            for (var element in dictionary) {
                $(`#${menu_id}`).children(0).append(`<a href='${dictionary[element]}'><li>${element}</li></a>`);
            }
            $(`#${menu_id}`).css({
                "top": event.pageY + "px",
                "left": event.pageX + "px"
            }).show();
            event.preventDefault();

        });
        $(`#${container_id}`).bind('click', function() {
            $(`#${menu_id}`).hide();
        });
    }
    rightClick('container', 'contextMenu', {
        'index_test.php':'Test Index'
    });
</script>