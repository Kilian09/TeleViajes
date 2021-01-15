<?php

namespace App\Http\Controllers;

use App\Paquetes;
use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function crearProducto()
    {
        return view('crearProducto');
    }


    public function numero_productos()
    {
        $productos = Products::all();
        $numeroProdictos = count($productos);
        echo $numeroProdictos;
    }

    public function listaProductos()
    {
        $productos = Products::get();

        return view('shopAdmin')->with('products', $productos);
    }


    public function addProducto(){
        if (isset($_POST["tipo"], $_POST["name"], $_POST["description"], $_POST["subtype"], $_POST["price"], $_POST["stock"])) {

            $tipo = $_POST["tipo"];

            $datosProducto = array();
            $datosProducto[0] = $tipo;

            $producto = new Products();
            $producto->id_user = session('user');
            $producto->type = $datosProducto[0];
            $producto->save();


            $tipoProducto = array();

            $tipoProducto[0] = $_POST["name"];
            $tipoProducto[1] = $_POST["description"];
            $tipoProducto[2] = $_POST["subtype"];
            $tipoProducto[3] = $_POST["price"];
            $tipoProducto[4] = $_POST["stock"];

            if($datosProducto[0] == "Paquetes"){
                $paquete = new Paquetes();
            } else{
                return redirect('/shopAdmin')->with('error', 'Tipo no disponible');
            }

            $paquete->id_product = $producto->id;
            $paquete->name = $tipoProducto[0];
            $paquete->description = $tipoProducto[1];
            $paquete->type = $tipoProducto[2];
            $paquete->price = $tipoProducto[3];
            $paquete->stock = $tipoProducto[4];

            $paquete->save();

            return redirect('/shopAdmin')->with('exito','Se ha añadido el producto ' . $_POST['name']);
        }else{
            return redirect('/shopAdmin')->with('error','No se ha añadido el producto ' . $_POST['name']);
        }
    }


}
