<?php

namespace App\Http\Controllers;

use App\Actividades;
use App\Ancianos;
use App\Cruceros;
use App\Escolares;
use App\Familia;
use App\Paquetes;
use App\Products;
use App\Universitarios;
use App\Vuelos;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function listaTransaciones()
    {
        return view('/listatransaciones');
    }

    public function obtenerId($id)
    {
        if (isset($_GET["amount"])) {
            $amount = $_GET["amount"];

            $producto = Products::where('id', $id)->get();


            if ($producto[0]['type'] == "Paquetes") {

                $paquete = Paquetes::where('id_product', $producto[0]['id'])->get();

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

                $crucero = Cruceros::where('id_product', $producto[0]['id'])->get();

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

            } else if ($producto[0]['type'] == "Actividades") {

                $actividades = Actividades::where('id_product', $producto[0]['id'])->get();

                $totalPrice = ($amount * $actividades[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/actividades');

            }else if ($producto[0]['type'] == "Escolares") {

                $escolares = Escolares::where('id_product', $producto[0]['id'])->get();

                $totalPrice = ($amount * $escolares[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/escolares');

            }else if ($producto[0]['type'] == "Universitarios") {

                $universitarios = Universitarios::where('id_product', $producto[0]['id'])->get();

                $totalPrice = ($amount * $universitarios[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/universitarios');

            }else if ($producto[0]['type'] == "Vuelos") {

                $vuelos = Vuelos::where('id_product', $producto[0]['id'])->get();

                $totalPrice = ($amount * $vuelos[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/vuelos');

            }else if ($producto[0]['type'] == "Ancianos") {

                $ancianos = Ancianos::where('id_product', $producto[0]['id'])->get();

                $totalPrice = ($amount * $ancianos[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/ancianos');

            }else if ($producto[0]['type'] == "Familia") {

                $familia = Familia::where('id_product', $producto[0]['id'])->get();

                $totalPrice = ($amount * $familia[0]['price']);
                $result = $totalPrice + session('totalAnterior');
                session(['totalAnterior' => $result]);
                session(['total' => $result]);

                $cantidadFinal = $amount + session('cantidadAnterior');
                session(['cantidadAnterior' => $cantidadFinal]);
                session(['cantidadTotal' => $cantidadFinal]);

                session(['product_id' => $producto[0]['id']]);
                session(['amount' => $amount]);

                return redirect('/familia');
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

        if ($producto[0]['type'] == "Paquetes") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $paquete = Paquetes::where('id_product', $producto[0]['id'])->get();

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

            $crucero = Cruceros::where('id_product', $producto[0]['id'])->get();

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

        }else if ($producto[0]['type'] == "Actividades") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $actividades = Actividades::where('id_product', $producto[0]['id'])->get();

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $actividades[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');

            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/actividades');

        }else if ($producto[0]['type'] == "Escolares") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $escolares = Escolares::where('id_product', $producto[0]['id'])->get();

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $escolares[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');

            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/escolares');

        }else if ($producto[0]['type'] == "Universitarios") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $universitarios = Universitarios::where('id_product', $producto[0]['id'])->get();

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $universitarios[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');

            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/universitarios');

        }else if ($producto[0]['type'] == "Vuelos") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $vuelos = Vuelos::where('id_product', $producto[0]['id'])->get();

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $vuelos[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');

            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/vuelos');

        }else if ($producto[0]['type'] == "Ancianos") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $ancianos = Ancianos::where('id_product', $producto[0]['id'])->get();

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $ancianos[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');

            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/ancianos');

        }else if ($producto[0]['type'] == "Familia") {

            session(['amountProducto' => session('PROD_' . $id)]);

            session()->forget('PROD_' . $id);

            $familia = Familia::where('id_product', $producto[0]['id'])->get();

            $totalPrice = session('total');
            $precioARestar = session('amountProducto') * $familia[0]['price'];
            $result = $totalPrice - $precioARestar;
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = session('cantidadTotal');

            $result = $cantidadFinal - session('amountProducto');
            session(['cantidadAnterior' => $result]);
            session(['cantidadTotal' => $result]);

            return redirect('/familia');
        }
    }

}
