

function numero_productos(){
    $("#products").load("numero_productos");
    setTimeout(numero_productos,2000); //2 segundos
}
