const number_of_rows = 5;

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
    if ((evt.keyCode == 13)) { return false; }
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


/**
 * 2 functions to make to sum to a column in table using id(daen-maden) and put the sum onblur in the total field(other_id)
 */
function count_sum_ids(id, number_of_rows) {
    var count = 0;
    for (var i = 0; i < number_of_rows; i++) {
        var value = document.getElementById(id + "_" + i).value;
        if (value == '') {
            value = '0';
        }
        count += parseFloat(value);
    }
    return count;
}

function set_blur_to_input_ids_to_count_in_id(id, other_id, number_of_rows) {
    for (var i = 0; i < number_of_rows; i++) {
        document.getElementById(id + "_" + i).addEventListener('blur', function() {
            document.getElementById(other_id).value = count_sum_ids(id, number_of_rows);
        });
    }

}

function scrollToTop() {
    window.scroll(0, 0);
}


// Function to make the f1 key a shortcut that takes me to the help page

function f1(path = "help_file.php") {
    $("body").keydown(function(e) {
        var keyCode = e.keyCode || e.which;
        console.log(keyCode);
        if (keyCode == 112) {
            window.open(path, '_self');
        }
    });
}