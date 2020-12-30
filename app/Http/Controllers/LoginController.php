<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Session;

class LoginController extends Controller
{
    //FUNCION LOGIN
    public function login(Request $request)
    {

        //PASO 1
        //======= Valida si existe la sesion ======/
        $auth=session('idClientUcrm');
        if (is_null($auth ))
        {
            return redirect('/');
        }
        //=========================================/



        //PASO 2
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
                
                //Condiciona o verifica que el cliente exista o no en la base de datos
                //En caso falle retorna al login
                if($response->failed()){     
                    return back();   
                }else  { 
                    //si el uausrio existe crear la sesion
                    $idClientUcrm = json_decode($response->getBody()->getContents())->id;
                    $request->session()->put('idClientUcrm', $idClientUcrm);

                    return redirect()->route('home');     
                }

            } catch (ClientException $e) {
                return back();
            }  //fin de try-catch
    } //fin de funcion login

    //************************************************************************************************************* */

    //FUNCION LOGOUT
    public function logout()
     {
        //Destuye la sesion 
        Session::flush();
        
        //redirecciona a la pagina de login
        return redirect('/');
     }  //fin de funcion logout




}//fin de clase LoginController
