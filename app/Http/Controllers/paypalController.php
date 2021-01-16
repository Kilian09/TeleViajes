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
                    $orderDetail->amount = session('PROD_'.$prodID);
                    $orderDetail->save();


                    if ($producto->type = "Paquetes") {

                        $paquetes = Paquetes::where('id_product', $producto[0]['id'])->get();

                        foreach ($paquetes as $paquete) {

                            $paquete->stock = $paquete[0]['stock'];
                            $paquete->save();
                        }
                    }

                    /*
                    else if ($producto[0]['type'] = "Cruceros") {

                        $cruceros = Cruceros::where('id_product', $prodID)->get();

                        $stockFinal = $cruceros[0]['stock'] - session('PROD_'.$prodID);
                        $cruceros->stock = $stockFinal;
                        $cruceros->save();

                    }else if ($producto[0]['type'] = "Actividades") {

                        $actividades = Actividades::where('id_product', $prodID)->get();

                        $stockFinal = $actividades[0]['stock'] - session('PROD_'.$prodID);
                        $actividades->stock = $stockFinal;
                        $actividades->save();

                    }else if ($producto[0]['type'] = "Escolares") {

                        $escolares = Escolares::where('id_product', $prodID)->get();

                        $stockFinal = $escolares[0]['stock'] - session('PROD_'.$prodID);
                        $escolares->stock = $stockFinal;
                        $escolares->save();

                    }else if ($producto[0]['type'] = "Universitarios") {

                        $universitarios = Universitarios::where('id_product', $prodID)->get();

                        $stockFinal = $universitarios[0]['stock'] - session('PROD_'.$prodID);
                        $universitarios->stock = $stockFinal;
                        $universitarios->save();

                    }else if ($producto[0]['type'] = "Vuelos") {

                        $vuelos = Vuelos::where('id_product', $prodID)->get();

                        $stockFinal = $vuelos[0]['stock'] - session('PROD_'.$prodID);
                        $vuelos->stock = $stockFinal;
                        $vuelos->save();

                    }else if ($producto[0]['type'] = "Ancianos") {

                        $ancianos = Ancianos::where('id_product', $prodID)->get();

                        $stockFinal = $ancianos[0]['stock'] - session('PROD_'.$prodID);
                        $ancianos->stock = $stockFinal;
                        $ancianos->save();

                    }else if ($producto[0]['type'] = "Familia") {

                        $familia = Familia::where('id_product', $prodID)->get();

                        $stockFinal = $familia[0]['stock'] - session('PROD_'.$prodID);
                        $familia->stock = $stockFinal;
                        $familia->save();

                    }
*/


                }
            }
                    $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
                    return redirect('/')->with('exito', $status);
                }

                $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
                return redirect('/')->with('error', $status);
            }


}



