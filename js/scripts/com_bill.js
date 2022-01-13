/**
 * deafult item_bill
 */

function count_total_price() {
    var sum = 0;
    for (i = 0; i < document.getElementById('tbl').rows.length - 1; i++) {
        sum = sum + parseInt(document.getElementById('total_item_prices_' + i).value);
    }
    document.getElementById('total_price').value = sum;
    var com_ratio = document.getElementById('com_ratio').value,
        com_value = document.getElementById('com_value').value,
        total_price = document.getElementById('total_price').value;
    var percent = (parseInt(com_ratio) / 100) * parseInt(total_price);
    document.getElementById('real_price').value = Math.round(parseInt(total_price) - percent);
    document.getElementById('com_value').value = Math.round(percent);
}



var item_bill_name = ['numbers[]', 'items[]', 'units[]', 'total_weights[]', 'real_weights[]', 'prices[]', 'total_item_prices[]', 'note[]'];
var item_bill_id = ['numbers', 'items', 'units', 'total_weights', 'real_weights', 'prices', 'total_item_prices', 'note'];

function createCell(cell, text, style, id, name, row_number) {
    var div = document.createElement('input'), // create DIV element
        txt = document.createTextNode(text); // create text node
    // div.appendChild(txt);                    // append text node to the DIV
    //div.setAttribute('class', style + ' text-center'); // set DIV class attribute
    div.setAttribute('className', style); // set DIV class attribute for IE (?!)

    div.setAttribute('id', id + '_' + row_number);
    div.setAttribute('name', name);
    div.setAttribute('style', 'border-radius:5px; text-align:center; margin:0px; padding:0px;');
    if (text == '0' || text == '2' || text == '4' || text == '6') { // 0 => numbers || 2 => units || 4 => real_weights || 6 => toal_prices
        div.setAttribute('readonly', 'true');
    }
    if (text == '1') {
        div.setAttribute('class', 'item_auto');
    }
    if (id == 'numbers') {
        div.setAttribute('value', row_number + 1);
    }
    if (id == 'total_item_prices' || id == 'total_weights' || id == 'prices') {
        div.setAttribute('value', '0');
        div.addEventListener('click', function() {
            if (div.value == '0')
                div.value = '';
        });
    }

    if (text == '3') { // action to real weight => 2% of total weight
        div.addEventListener('blur', function() {
            document.getElementById('real_weights_' + row_number).value = Math.round(div.value * 0.98);
            count_total_price();
        });
    }

    if (text == '5') { // action to total prices (prices * real_weight)
        div.addEventListener('blur', function() {
            document.getElementById('total_item_prices_' + row_number).value = Math.round(div.value * document.getElementById('real_weights_' + row_number).value);
            count_total_price();
        });

    }
    if (text == '1') { // action to items to set default unit
        div.addEventListener('blur', function() {
            var item_code = $(this).val();
            if (item_code != '') {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: { item_code: item_code },
                    success: function(data) {
                        // $('#code').fadeIn(data);
                        document.getElementById('units_' + row_number).value = data;
                        // alert(data);
                    }
                });
            }
        });
    }


    cell.appendChild(div); // append DIV to the table cell

}

function appendColumn() {
    var tbl = document.getElementById("tbl"), // table reference
        i;
    // open loop for each row and append cell
    if (tbl.rows[0].cells.length < 12)
        for (i = 0; i < tbl.rows.length; i++) {
            createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'col');
            // tbl.rows.text.style.
        }
}

function appendRow(row_number = '1') {
    var tbl = document.getElementById('tbl'), // table reference
        row = tbl.insertRow(tbl.rows.length), // append table row
        i;
    // insert table cells to the new row

    if (tbl.rows.length < 20 && tbl.rows.length >= 12) {
        for (i = 0; i < tbl.rows[0].cells.length; i++) {
            createCell(row.insertCell(i), i, 'row', item_bill_id[i], item_bill_name[i], tbl.rows.length - 2);
        }
    }

    if (tbl.rows.length < 12)
        for (i = 0; i < tbl.rows[0].cells.length; i++) {
            createCell(row.insertCell(i), i, 'row', item_bill_id[i], item_bill_name[i], row_number);
        }
}

document.querySelector('#add_col').onclick = appendColumn;
document.querySelector('#add_row').onclick = appendRow;




function deafultRows() {
    var i = 0;
    for (i = 0; i < 5; i++) {
        appendRow(i);
    }
}


deafultRows();

function printComPill(ids) {
    // //var head = document.getElementsByTagName('HEAD')[0];
    // var link = document.createElement('link');
    // link.rel = 'stylesheet';
    // link.type = 'text/css';
    // link.href = 'css/styles/print_com_bill.css';
    // document.head.appendChild(link);

    var tbl = document.getElementById("tbl"), // table reference
        i;
    document.getElementById('add_row').hidden = true;
    document.getElementById('add_col').hidden = true;
    document.getElementById('notes').hidden = true;
    for (i = 0; i < tbl.rows.length - 1; i++)
        document.getElementById("note_" + i).parentElement.hidden = true;

    preparePrint(ids);

    document.getElementById('add_row').hidden = false;
    document.getElementById('add_col').hidden = false;
    document.getElementById('notes').hidden = false;
    for (i = 0; i < tbl.rows.length; i++)
        document.getElementById("note_" + i).parentElement.hidden = false;
}

function get_seller_id() {
    var id = document.getElementsByName("seller")[0].value;
    document.getElementById("seller_id").value = id;
}
// iFrameResize({ log: true }, '#myIframe')