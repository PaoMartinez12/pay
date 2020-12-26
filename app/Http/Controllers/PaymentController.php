<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayInvoice;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{

    //Llama al formulario de Pago
    public function payForm($id){

        //dd("Dentro de PlaymentController; Id de factura mas reciente: ".$id);

        return view('payment');
    }


    //
    public function pay(Request $request)
    {
        $incoming = $request->all();
        $payment_info['creditcard'] = $incoming['creditcard'];
        $payment_info['expiracion'] = $incoming['expiracion'];
        $payment_info['cvcode'] = $incoming['cvcode'];
        $payment_info['titular'] = $incoming['titular'];
        dd($payment_info);
    }

    

   
}
