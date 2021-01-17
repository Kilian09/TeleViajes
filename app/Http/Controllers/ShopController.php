<?php

namespace App\Http\Controllers;

use App\Actividades;
use App\Ancianos;
use App\Cruceros;
use App\Escolares;
use App\Familia;
use App\OrderDetail;
use App\Orders;
use App\Paquetes;
use App\Payment;
use App\Products;
use App\Universitarios;
use App\Vuelos;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function listaTransaciones()
    {

        $transacciones = Payment::get();

        return view('/listatransaciones')
            ->with('transacciones', $transacciones);

    }

    public function listaOrdenes()
    {
        $orders = Orders::get();

        return view('/listaOrdenes')
            ->with('orders', $orders);

    }

    public function listaInventario()
    {
        $ordersDet = OrderDetail::get();

        return view('/inventarioDeVentas')
            ->with('ordersDet', $ordersDet);

    }

    public function addCart($id)
    {
        if (isset($_GET["amount"])) {
            $amount = $_GET["amount"];

            $producto = Products::where('id', $id)->get();

            $tipoDeProducto = $producto[0]['type'];

            switch ($tipoDeProducto) {

                case "Paquetes":

                    $paquete = Paquetes::where('id_product', $producto[0]['id'])->get();

                    $stockPacket = $paquete[0]['stock'];

                    if ($stockPacket < $amount) {
                        return redirect('/paquetes')->with('error', 'No hay suficiente stock');

                    } else if ($stockPacket == 0) {
                        return redirect('/paquetes')->with('error', 'No hay suficiente stock');

                    } else {

                        $totalPrice = ($amount * $paquete[0]['price']);
                        break;
                    }

                case "Cruceros":

                    $crucero = Cruceros::where('id_product', $producto[0]['id'])->get();

                    $stockCruise = $crucero[0]['stock'];

                    if ($stockCruise < $amount) {
                        return redirect('/cruceros')->with('error', 'No hay suficiente stock');

                    } else if ($stockCruise  == 0) {
                        return redirect('/cruceros')->with('error', 'No hay suficiente stock');

                    } else {
                        $totalPrice = ($amount * $crucero[0]['price']);
                        break;
                    }

                case "Actividades" :

                    $actividad = Actividades::where('id_product', $producto[0]['id'])->get();

                    $stockActivity = $actividad[0]['stock'];

                    if ($stockActivity < $amount) {
                        return redirect('/actividades')->with('error', 'No hay suficiente stock');

                    } else if ($stockActivity == 0) {
                        return redirect('/actividades')->with('error', 'No hay suficiente stock');

                    } else {
                        $totalPrice = ($amount * $actividad[0]['price']);
                        break;
                    }

                case "Escolares":

                    $escolar = Escolares::where('id_product', $producto[0]['id'])->get();

                    $stockCollege = $escolar[0]['stock'];

                    if ($stockCollege < $amount) {

                        return redirect('/escolares')->with('error', 'No hay suficiente stock');

                    } else if ($stockCollege == 0) {
                        return redirect('/escolares')->with('error', 'No hay suficiente stock');

                    } else {
                        $totalPrice = ($amount * $escolar[0]['price']);
                        break;
                    }

                case "Universitarios" :

                    $universitario = Universitarios::where('id_product', $producto[0]['id'])->get();

                    $stockUniversity = $universitario[0]['stock'];

                    if ($stockUniversity < $amount) {

                        return redirect('/universitarios')->with('error', 'No hay suficiente stock');

                    } else if ($stockUniversity == 0) {
                        return redirect('/universitarios')->with('error', 'No hay suficiente stock');

                    } else {
                        $totalPrice = ($amount * $universitario[0]['price']);
                        break;
                    }

                case "Vuelos" :

                    $vuelo = Vuelos::where('id_product', $producto[0]['id'])->get();

                    $stockFlight = $vuelo[0]['stock'];

                    if ($stockFlight < $amount) {

                        return redirect('/')->with('error', 'No hay suficiente stock');

                    } else if ($stockFlight == 0) {
                        return redirect('/')->with('error', 'No hay suficiente stock');

                    } else {

                        $totalPrice = $amount * $vuelo[0]['price'];
                        break;
                    }

                case "Ancianos" :

                    $anciano = Ancianos::where('id_product', $producto[0]['id'])->get();

                    $stockElder = $anciano[0]['stock'];

                    if ($stockElder < $amount) {

                        return redirect('/ancianos')->with('error', 'No hay suficiente stock');

                    } else if ($stockElder == 0) {
                        return redirect('/ancianos')->with('error', 'No hay suficiente stock');

                    } else {
                        $totalPrice = $amount * $anciano[0]['price'];
                        break;
                    }

                case "Familias":

                    $familia = Familia::where('id_product', $producto[0]['id'])->get();

                    $stockFamily = $familia[0]['stock'];

                    if ($stockFamily < $amount) {
                        return redirect('/familias')->with('error', 'No hay suficiente stock');

                    } else if ($stockFamily == 0) {
                        return redirect('/familias')->with('error', 'No hay suficiente stock');

                    } else {
                        $totalPrice = ($amount * $familia[0]['price']);
                        break;
                    }
            }

            //Añadida la cantidad totaly el precio total al carrito mediante sesiones.
            $result = $totalPrice + session('totalAnterior');
            session(['totalAnterior' => $result]);
            session(['total' => $result]);

            $cantidadFinal = $amount + session('cantidadAnterior');
            session(['cantidadAnterior' => $cantidadFinal]);
            session(['cantidadTotal' => $cantidadFinal]);

            session(['product_id' => $producto[0]['id']]);
            session(['amount' => $amount]);

            if (session()->has('product_id') == true) {
                if (session()->has('amount') == true) {

                    //Añadir producto al carrito
                    if (session('PROD_' . session('product_id')) != null) {
                        $cantidad = session('PROD_' . session('product_id')) + session('amount');
                        session(['PROD_' . session('product_id') => $cantidad]);

                        session(['amountProducto' => session('PROD_' . session('product_id'))]);

                        session()->forget(['product_id', 'amount']);

                    } else
                        session(['PROD_' . session('product_id') => session('amount')]);

                    session(['amountProducto' => session('PROD_' . session('product_id'))]);

                    session()->forget(['product_id', 'amount']);

                }

            }

            // Para ir a cada una de las vista dependiendo del tipo de product.
            switch ($tipoDeProducto) {
                case "Paquetes":
                    return redirect('/paquetes')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

                case "Cruceros":
                    return redirect('/cruceros')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

                case "Actividades" :
                    return redirect('/actividades')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

                case "Escolares":
                    return redirect('/escolares')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

                case "Universitarios" :
                    return redirect('/universitarios')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

                case "Vuelos" :
                    return redirect('/')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

                case "Ancianos" :
                    return redirect('/ancianos')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

                case "Familias":
                    return redirect('/familia')->with('exito', 'Se ha añadido ' . $_GET["amount"] . ' producto(s) al carrito');

            }

        }
    }

    public function eliminarProductoCarrito($id)
    {
        $producto = Products::where('id', $id)->get();
        $typeProduct = $producto[0]['type'];

        session(['amountProducto' => session('PROD_' . $id)]);
        session()->forget('PROD_' . $id);

        $totalPrice = session('total');

        switch ($typeProduct) {

            case "Paquetes":
                $paquete = Paquetes::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $paquete[0]['price'];
                break;

            case "Cruceros":
                $crucero = Cruceros::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $crucero[0]['price'];
                break;

            case "Actividades":
                $actividades = Actividades::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $actividades[0]['price'];
                break;

            case "Escolares":
                $escolares = Escolares::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $escolares[0]['price'];
                break;


            case "Universitarios":
                $universitarios = Universitarios::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $universitarios[0]['price'];
                break;

            case "Vuelos":
                $vuelos = Vuelos::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $vuelos[0]['price'];
                break;

            case "Ancianos":
                $ancianos = Ancianos::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $ancianos[0]['price'];
                break;

            case "Familia":
                $familia = Familia::where('id_product', $producto[0]['id'])->get();

                $precioARestar = session('amountProducto') * $familia[0]['price'];
                break;

        }

        $result = $totalPrice - $precioARestar;
        session(['totalAnterior' => $result]);
        session(['total' => $result]);

        $cantidadFinal = session('cantidadTotal');

        $result = $cantidadFinal - session('amountProducto');
        session(['cantidadAnterior' => $result]);
        session(['cantidadTotal' => $result]);

        switch ($typeProduct) {
            case "Paquetes":
                return redirect('/paquetes')->with('exito', 'Se ha eliminado el producto del carrito.');

            case "Cruceros":
                return redirect('/cruceros')->with('exito', 'Se ha eliminado el producto del carrito.');

            case "Actividades":
                return redirect('/actividades')->with('exito', 'Se ha eliminado el producto del carrito.');

            case "Escolares":
                return redirect('/escolares')->with('exito', 'Se ha eliminado el producto del carrito.');

            case "Universitarios":
                return redirect('/universitarios')->with('exito', 'Se ha eliminado el producto del carrito.');

            case "Vuelos":
                return redirect('/')->with('exito', 'Se ha eliminado el producto del carrito.');

            case "Ancianos":
                return redirect('/ancianos')->with('exito', 'Se ha eliminado el producto del carrito.');

            case "Familia":
                return redirect('/familia')->with('exito', 'Se ha eliminado el producto del carrito.');

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

        return redirect('/')->with('exito', 'Se ha vaciado el carrito correctamente.');
    }

}

