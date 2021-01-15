<?php

namespace App\Http\Controllers;

use App\Paquetes;
use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{

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
        if (isset($_POST["id_user"],$_POST["tipo"], $_POST["name"], $_POST["descripcion"], $_POST["type"], $_POST["precio"], $_POST["stock"])) {

            $id_user = $_POST["id_user"];
            $tipo = $_POST["tipo"];

            $datosProducto = array();
            $datosProducto[0] = $id_user;
            $datosProducto[1] = $tipo;

            $producto = new Products();
            $producto->id_user = $datosProducto[0];
            $producto->tipo = $datosProducto[1];
            $producto->save();


            $tipoProducto = array();

            $tipoProducto[0] = $_POST["name"];
            $tipoProducto[1] = $_POST["descripcion"];
            $tipoProducto[2] = $_POST["type"];
            $tipoProducto[3] = $_POST["precio"];
            $tipoProducto[4] = $_POST["stock"];

            if($datosProducto[1] == "Paquete"){
                $paquete = new Paquetes();
            } else{
                return redirect('/shopAdmin')->with('error', 'Tipo no disponible');
            }

            $paquete->id_producto = $producto->id;
            $paquete->name = $tipoProducto[0];
            $paquete->descripcion = $tipoProducto[1];
            $paquete->type = $tipoProducto[2];
            $paquete->precio = $tipoProducto[3];
            $paquete->stock = $tipoProducto[4];

            $paquete->save();
            return redirect('/shopAdmin')->with('exito','Se ha añadido el producto ' . $_POST['name']);
        }else{
            return redirect('/shopAdmin')->with('error','No se ha añadido el producto ' . $_POST['name']);
        }
    }


}
