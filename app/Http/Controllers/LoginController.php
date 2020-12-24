<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {

        $incoming = $request->all();
        $login_info['username'] = $incoming['username'];
        $login_info['password'] = $incoming['password'];
       

    try {
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
        ])->post('https://ucrm.beenet.com.sv/api/v1.0/clients/authenticated', [
                'username'=> $login_info['username'] ,
                'password'=>  $login_info['password']
        ]);

        $idClientUcrm = json_decode($response->getBody()->getContents())->id;
        $request->session()->put('idClientUcrm', $idClientUcrm);
        
     
        if($response->failed()){     
             return back();   
         }else  {
                //Guardar id_client en session laravel   
                return view('payment',compact('idClientUcrm'));
         }

     } catch (ClientException $e) {
        return back();
        }  

       
   
        
    }
}
