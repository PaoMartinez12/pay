<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;

class LoginController extends Controller
{
    //Funcion login 
    public function login(Request $request)
    {
        //se capturan todos los datos del formulario
        $incoming = $request->all();
        //se declaran las variables de los respectivos campos
        $login_info['username'] = $incoming['username'];
        $login_info['password'] = $incoming['password'];

            try {

                //se hace la llamada a la api del ucrm
                $response = Http::withOptions([
                    'debug' => false,
                    'verify' => false
                ])->withHeaders([
                    'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
                ])->post('https://ucrm.beenet.com.sv/api/v1.0/clients/authenticated', [
                        //se envian los valores ingresados en el formulario
                        'username'=> $login_info['username'] ,
                        'password'=>  $login_info['password']
                ]);


                //Se obtiene el id del cliente 
                $idClientUcrm = json_decode($response->getBody()->getContents())->id;
                //Se crea la sesion
                $request->session()->put('idClientUcrm', $idClientUcrm);
                
                //Condiciona o verifica que el cliente exista o no en la base de datos

                //En caso falle retorna al login
                if($response->failed()){     
                    return back();   
                }else  { 
                        return redirect()->route('home');
                }

            } catch (ClientException $e) {
                return back();
            }  //fin de try-catch
    } //fin de funcion login



    //Funcion logout
    public function logout()
     {
        //Destuye la sesion 
        Session::flush();
        
        //redirecciona a la pagina de login
        return redirect('/');
     }  //fin de funcion logout

}//fin de clase LoginController
