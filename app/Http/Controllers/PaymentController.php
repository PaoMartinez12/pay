<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayInvoice;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use \Firebase\JWT\JWT;

class PaymentController extends Controller
{

    //Llama al formulario de Pago
    public function payForm($id, $monto){

        //dd("Dentro de PlaymentController; Id de factura mas reciente: ".$id);
        //dd($id, $monto);
        //return view('payment');
        return view('pay', compact('monto'));
    }


    //
    public function pay(Request $request)
    {
        $incoming = $request->all();
        $publicKey = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAope3yoLSdQB2SppViaoR
SzFpRAVRMS/GL/Yr8WULjLjBznj1AOXcSJwnUAFj7nINP4CjgMsqwRknyuPObNcM
DFeV52LccqriwXwvAPtxF22STvoJVrhkfu8WV9S/BTfI6ndq9NumG07vu/Lr9Kg3
tg6Ki+eZkm0j7THXi4LClxK/nS2OaFzS6H43hnz81ma7TEH/8LYahBbrCxQkZFkU
FCp75IzQp6tdbFcolN+kXzzrHPPX84U7Ia6j5SOX+qcPMD7SRD5Sd7WUZr/vjyI8
oiptDvJgaKS0ynVmvWhgH3dC9QxTzANfpXQ4eZ0X+u4ygt0JqcQKR045zSmSEHK3
mwIDAQAB
-----END PUBLIC KEY-----
EOD;
		$payload = array(
   				 'Card' => $incoming['creditcard'],
                 'InfoS' => $incoming['cvcode'],
                 'InfoV' => $incoming['expiracion'],
                 'Amount' => $incoming['monto']
);
		
		//$jwt = JWT::encode($payload, $publicKey, 'RS256');
		//dd($jwt);

       

                 $response = Http::withOptions([
                 'debug' => false,
                 'verify' => false
                 ])->withHeaders([
                 
                 ])->post('https://testcheckout.redserfinsa.com:8087/PaymentRest/Payment', [
				 
				 'KeyInfo' => '522b226f-55e0-4330-a167-4cf7bd83b912',
				 'PaymentData' => 'MlSIYBmz2WoNZOz0xZz9jI1UlzI/4LP5XMBQHDtOhsO+0MhhI1O5l4aY47BPTSrlmMJszPOS+WwbrPfboVGcQ7S9ZCMxB2MxZTOv7CZ5Hw2Dgvna/ZpCN0P6F70R3q3id5tCDuWSFK8h8bj8c6kVS+arGsQIFtJodNW0hvI64DS5ESd6ZbEadNQNy7Sj4l83qauwgjTX9mwvpIuF++602wqMxI52CrPZhJeblpSV2xwnPUMx8AHoDfLw5Tvng=='
                  ]);
              

              return $response->json();

    }

    

   
}
