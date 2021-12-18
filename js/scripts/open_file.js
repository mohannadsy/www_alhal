function test1() {
    document.getElementById("new_text").hidden = false;

}

function test2() {
    document.getElementById("initial_balance").hidden = false;

}

function get_selected_database(id) {
    b = false;
    if (b) {
        var table = document.getElementById(id).innerHTML;
        document.getElementById("selected_database").value = table;
        document.getElementById(id).style.backgroundColor = 'blue';
        b = true;
    }
    document.getElementById(id).style.backgroundColor = 'none';


}