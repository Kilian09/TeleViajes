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
use App\Products;
use App\Universitarios;
use App\Vuelos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Order;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class paypalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    // ...

    public function payWithPayPal()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $cantidad = session('total');
        $amount = new Amount();
        $amount->setTotal($cantidad);
        $amount->setCurrency('EUR');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('See your IQ results');

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/')->with('error', $status);
        }

        $payment = Payment::get($paymentId, $this->apiContext);
        $transaction = $payment->getTransactions();
        $amount = $transaction[0]->getAmount()->getTotal();
        $email = $payment->getPayer()->getPayerInfo()->getEmail();
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {

            //Insertar en BD
            $orders = new Orders();
            $orders->user_id = session('user');
            $orders->total = session('total');
            $orders->state = "COMPLETADO";
            $orders->save();

            //Insertar en BD
            $insertarPayment = new \App\payment();
            $insertarPayment->order_id = $orders->id;
            $insertarPayment->payerId = $payerId;
            $insertarPayment->paymentId = $paymentId;
            $insertarPayment->token = $token;
            $insertarPayment->amount = $amount;
            $insertarPayment->email = $email;

            $insertarPayment->save();

            $datos = session()->all();
            foreach ($datos as $producto => $cantidad) {
                if (substr($producto, 0, 5) == 'PROD_') {
                    $prodID = substr($producto, 5);

                    $producto = Products::where('id', $prodID)->get();

                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $orders->id;
                    $orderDetail->product_id = $prodID;
                    $orderDetail->amount = session('PROD_' . $prodID);
                    $orderDetail->save();

                    $productType = $producto[0]['type'];

                    switch ($productType) {

                        case "Paquetes";

                            $paquetes = Paquetes::where('id_product', $producto[0]['id'])->get();

                            foreach ($paquetes as $paquete) {
                                $result = $paquete->stock - session('PROD_' . $prodID);
                                $paquete->stock = $result;
                                $paquete->save();
                            }
                            break;

                        case "Cruceros":

                            $cruceros = Cruceros::where('id_product', $producto[0]['id'])->get();

                            foreach ($cruceros as $crucero) {
                                $result = $crucero->stock - session('PROD_' . $prodID);
                                $crucero->stock = $result;
                                $crucero->save();
                            }
                            break;

                        case  "Actividades":

                            $actividades = Actividades::where('id_product', $producto[0]['id'])->get();

                            foreach ($actividades as $actividad) {
                                $result = $actividad->stock - session('PROD_' . $prodID);
                                $actividad->stock = $result;
                                $actividad->save();
                            }
                            break;

                        case"Escolares":

                            $escolares = Escolares::where('id_product', $producto[0]['id'])->get();

                            foreach ($escolares as $escolar) {
                                $result = $escolar->stock - session('PROD_' . $prodID);
                                $escolar->stock = $result;
                                $escolar->save();
                            }
                            break;

                        case "Universitarios":

                            $universitarios = Universitarios::where('id_product', $producto[0]['id'])->get();

                            foreach ($universitarios as $universitario) {
                                $result = $universitario->stock - session('PROD_' . $prodID);
                                $universitario->stock = $result;
                                $universitario->save();
                            }
                            break;

                        case "Vuelos":

                            $vuelos = Vuelos::where('id_product', $producto[0]['id'])->get();

                            foreach ($vuelos as $vuelo) {
                                $result = $vuelo->stock - session('PROD_' . $prodID);
                                $vuelo->stock = $result;
                                $vuelo->save();
                            }
                            break;

                        case "Ancianos":

                            $ancianos = Ancianos::where('id_product', $producto[0]['id'])->get();

                            foreach ($ancianos as $anciano) {
                                $result = $anciano->stock - session('PROD_' . $prodID);
                                $anciano->stock = $result;
                                $anciano->save();
                            }
                            break;

                        case "Familia":

                            $familias = Familia::where('id_product', $producto[0]['id'])->get();

                            foreach ($familias as $familia) {
                                $result = $familia->stock - session('PROD_' . $prodID);
                                $familia->stock = $result;
                                $familia->save();
                            }
                            break;

                    }
                }


            }

            $data = session()->all();

            session()->forget(['total', 'totalAnterior', 'cantidadTotal', 'cantidadAnterior', 'carrito']);

            foreach ($data as $key => $valor) {
                if ($key[0] == 'P') {
                    session()->forget($key);
                }
            }

            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            return redirect('/')->with('exito', $status);
        }
        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('/')->with('error', $status);

    }

}






