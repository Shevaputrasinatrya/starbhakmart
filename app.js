function tambahbarang(id) {
    $.get('setsession.php?session=' + id);
    location.reload();
}
function kurangBarang(id) {
    $.get('sessionKurang.php?session=' + id);
    location.reload();
}

function hapusBarang(id) {
    $.get('delSession.php?session=' + id);
    location.reload();
}
