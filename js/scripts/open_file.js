function test1() {
    document.getElementById("new_text").hidden = false;

}

function test2() {
    document.getElementById("initial_balance").hidden = false;

}

function get_selected_database(id) {
    var table = document.getElementById(id).innerHTML;
    document.getElementById("selected_database").value = table;
    $('table tr').each(function(a, b) {
        $(b).click(function() {
            $('table tr').css('background', '#ffffff');
            $(this).css('background', 'blue');
        });
    });
}