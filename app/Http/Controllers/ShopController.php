<?php

namespace App\Http\Controllers;

use App\Cruceros;
use App\Paquetes;
use App\Products;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function obtenerId($id)
    {
        if (isset($_GET["amount"])) {
            $amount = $_GET["amount"];

            $producto = Products::where('id', $id)->get();

            $paquete = Paquetes::where('id_product', $producto[0]['id'])->get();

            $crucero = Cruceros::where('id_product', $producto[0]['id'])->get();


            if ($producto[0]['type'] == "Paquetes") {

                $totalPrice = ($amount * $paquete[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/paquetes');

            } else if ($producto[0]['type'] == "Cruceros") {

                $totalPrice = ($amount * $crucero[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/cruceros');
            }

        }
    }

    public function vaciarCarrito()
    {
        $data = session()->all();

        session()->forget(['total', 'totalAnterior', 'cantidadTotal', 'cantidadAnterior', 'carrito']);


        foreach ($data as $key => $valor) {
            if ($key[0] == 'P') {
                session()->forget($key);
            }
        }

        return redirect('/');
    }


    public function eliminarProductoCarrito($id)
    {
        $producto = Products::where('id', $id)->get();

        $paquete = Paquetes::where('id_product', $producto[0]['id'])->get();

        $crucero = Cruceros::where('id_product', $producto[0]['id'])->get();


        if ($producto[0]['type'] == "Paquetes") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $paquete[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');
            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/paquetes');

        }else  if ($producto[0]['type'] == "Cruceros") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $crucero[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');

            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/cruceros');
        }
    }

}

