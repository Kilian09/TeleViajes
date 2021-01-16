

function numero_productos(){
    $("#products").load("numero_productos");
    setTimeout(numero_productos,2000); //2 segundos
}

function get_numTransc() {
    $('#numTransc').load('get_numTransc');
    setTimeout(get_numTransc, 3000);
}
