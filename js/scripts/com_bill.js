/*
function addColumn() {
    [...document.querySelectorAll('table tr')].forEach((row, i) => {
        const input = document.createElement("th")
        input.setAttribute('type', 'text')
        const cell = document.createElement(i ? "td" : "th")
        cell.appendChild(input)
        row.appendChild(cell)
    });
 }
 
 document.querySelector('button').onclick = addColumn

*/
function createCell(cell, text, style) {
    var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode(text); // create text node
    // div.appendChild(txt);                    // append text node to the DIV
    div.setAttribute('class', style); // set DIV class attribute
    div.setAttribute('className', style); // set DIV class attribute for IE (?!)
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

function appendRow() {
    var tbl = document.getElementById('tbl'), // table reference
        row = tbl.insertRow(tbl.rows.length), // append table row
        i;
    // insert table cells to the new row
    if (tbl.rows.length < 11)
        for (i = 0; i < tbl.rows[0].cells.length; i++) {
            createCell(row.insertCell(i), i, 'row');
        }
}

document.querySelector('#add_col').onclick = appendColumn
document.querySelector('#add_row').onclick = appendRow
    /*
    function addColumn(tblSample)
    {
    	var tblHeadObj = document.getElementById(tblSample).tHead;
    	for (var h=0; h<tblHeadObj.rows.length; h++) {
    		var newTH = document.createElement('th');
    		tblHeadObj.rows[h].appendChild(newTH);
    		newTH.innerHTML = h +  (tblHeadObj.rows[h].cells.length - 1)
    	}

    	var tblBodyObj = document.getElementById(tblSample).tBodies[0];
    	for (var i=0; i<tblBodyObj.rows.length; i++) {
    		var newCell = tblBodyObj.rows[i].insertCell(-1);
    		newCell.innerHTML =   i + (tblBodyObj.rows[i].cells.length - 1)
    	}
    }

    function addColumn(){
        var rows=document.getElementById('tbl').getElementsByTagName('tr'), i=0, r, c, clone;
            while(r=rows[i++]){
            c=r.getElementsByTagName('td');
            clone=cloneEl(c[c.length-1]);
            c[0].parentNode.appendChild(clone);
            }
        }
    function cloneEl(el){
        var clo=el.cloneNode(true);
        return clo;
        }
    document.querySelector('button').onclick = addColumn
    */