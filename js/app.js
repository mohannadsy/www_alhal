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