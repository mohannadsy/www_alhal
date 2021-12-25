/**
 * deafult item_bill
 */
var item_bill_name = ['numbers[]', 'items[]', 'units[]', 'total_weights[]', 'real_weights[]', 'prices[]', 'total_item_prices[]', 'notes[]'];
var item_bill_id = ['numbers', 'items', 'units', 'total_weights', 'real_weights', 'prices', 'total_item_prices', 'notes'];

function createCell(cell, text, style, id, name, row_number) {
    var div = document.createElement('input'), // create DIV element
        txt = document.createTextNode(text); // create text node
    // div.appendChild(txt);                    // append text node to the DIV
    div.setAttribute('class', style + ' text-center'); // set DIV class attribute
    div.setAttribute('className', style); // set DIV class attribute for IE (?!)

    div.setAttribute('id', id + '_' + text);
    div.setAttribute('name', name);

    if (text == '0' || text == '2' || text == '4' || text == '6') { // 0 => numbers || 2 => units || 4 => real_weights || 6 => toal_prices
        div.setAttribute('readonly', 'true');
    }
    if (id == 'numbers') {
        div.setAttribute('value', row_number + 1);
    }
    if( id == 'total_item_prices' || id=='total_weights' || id == 'prices'){
        div.setAttribute('value' , '0');
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
            createCell(row.insertCell(i), i, 'row', item_bill_id[i], item_bill_name[i], tbl.rows.length-2);
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
    for (i = 0; i < 10; i++) {
        appendRow(i);
    }
}


deafultRows();



function printSection(el) {
    var getFullContent = document.body.innerHTML;
    var printsection = document.getElementById(el).innerHTML;
    document.body.innerHTML = printsection;
    window.print();
    document.body.innerHTML = getFullContent;
}