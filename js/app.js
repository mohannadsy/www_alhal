function preparePrint(ids) {
    for (var id of ids)
        document.getElementById(id).hidden = true;
    window.print();
    for (var id of ids)
        document.getElementById(id).hidden = false;
}

function disableEnterKey(evt) {
    var evt = (evt) ? evt : ((event) ? event : null);
    var elem = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (elem.type == 'text')) { return false; }
}
document.onkeypress = disableEnterKey;


function addRows(table, numberOfRows, names, ids) {
    let tbl = document.getElementById(table);
    let tbody = document.createElement('tbody');
    tbody.setAttribute('class', 'text-center');
    for (i = 0; i < numberOfRows; i++) {
        let row = document.createElement('tr');
        for (j = 0; j < tbl.rows[0].cells.length; j++) {
            let col = document.createElement('td');
            let input = document.createElement('input');
            input.setAttribute('name', names[j]);
            input.setAttribute('id', ids[j] + '_' + i);
            input.setAttribute('style', 'color:blue; min-width:100%; min-height:100%; padding:2%; text-align:center; border-radius:5px;');
            col.setAttribute('style', 'padding:4;');
            if (j == 0) {
                input.setAttribute('value', i + 1);
                input.setAttribute('readonly', 'readonly');
            }
            input.setAttribute('class', 'text-center');
            col.appendChild(input);
            row.appendChild(col);
        }
        tbody.appendChild(row);
    }
    tbl.appendChild(tbody);

}