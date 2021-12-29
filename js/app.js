function preparePrint(ids) {
    for (var id of ids)
        document.getElementById(id).hidden = true;
    window.print();
    for (var id of ids)
        document.getElementById(id).hidden = false;
}