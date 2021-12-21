function createCell(cell, text, style) {
    var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode(text); // create text node
    // div.appendChild(txt);                    // append text node to the DIV
    div.setAttribute('class', style); // set DIV class attribute
    div.setAttribute('className', style); // set DIV class attribute for IE (?!)
    cell.appendChild(div); // append DIV to the table cell

}

function appendRow() {
    var tbl = document.getElementById('tbl'), // table reference
        row = tbl.insertRow(tbl.rows.length), // append table row
        i;
    // insert table cells to the new row
    if (tbl.rows.length < 20)
        for (i = 0; i < tbl.rows[0].cells.length; i++) {
            createCell(row.insertCell(i), i, 'row');
        }
}

function deafultRows() {
    var i = 0;
    for (i = 0; i < 5; i++) {
        appendRow();
    }
}

deafultRows();