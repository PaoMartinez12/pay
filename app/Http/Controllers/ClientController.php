<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function __construct()
    {
        # code...
        
    }



    public function index(Request $request){


       //======= Valida si existe la sesion ======/        
        $auth=session('idClientUcrm');
        if (is_null($auth ))
        {
            return redirect('/');
        }else{

            //si existe redirecciona a la pagina cliente.start
            return view('cliente.start');
        }
         //========================================//

      
    }//fin funcion index

        //Informacion
    public function info(){

        //======= Valida si existe la sesion ======/
            $auth=session('idClientUcrm');
    
            if (is_null($auth ))
            {
                return redirect('/');
            }
        //========================================//



    /************************************/
    // UCRM Get Client Info
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
        ])->get('https://ucrm.beenet.com.sv/api/v1.0/clients/'.session('idClientUcrm'), []);
        //dd(json_decode($response->getBody()->getContents()));

        $info_client = json_decode($response->getBody()->getContents());

    /***********************************/
    // UCRM Get Client Service
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
        ])->get('https://ucrm.beenet.com.sv/api/v1.0/clients/'.session('idClientUcrm').'/services', []);
        //dd(json_decode($response->getBody()->getContents()));

        $services = json_decode($response);
    
    /********************************/
    // UCRM Get Client Invoices
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
        ])->get('https://ucrm.beenet.com.sv/api/v1.0/clients/'.session('idClientUcrm').'/invoices', []);
        //dd(json_decode($response->getBody()->getContents()));

        $invoices = json_decode($response);

        //factura reciente
        if (count($invoices) == 0) {
            //dd("No hay facturas");    
            $last_invoice = $invoices;

            $info = [
                'clientName'=> $info_client->firstName.' '.$info_client->lastName,
                'direccion'=> $info_client->street1.', '.$info_client->street2,
                'departamento'=>$info_client->city,
                'email'=> $info_client->contacts[0]->email,
                'phone'=> $info_client->contacts[0]->phone,
                'saldo'=> $info_client->accountBalance,
                'credito'=> $info_client->accountCredit,
                'pendiente'=> $info_client->accountOutstanding,
                'serviceName' => $services[0]->servicePlanName,
                'number_invoice'=> null
            ];
            
        }else{
            //dd("Tiene al menos 1 factura");
            $last_invoice = $invoices[count($invoices)-1];
            
            $info = [
                'clientName'=> $info_client->firstName.' '.$info_client->lastName,
                'direccion'=> $info_client->street1.', '.$info_client->street2,
                'departamento'=>$info_client->city,
                'email'=> $info_client->contacts[0]->email,
                'phone'=> $info_client->contacts[0]->phone,
                'saldo'=> $info_client->accountBalance,
                'credito'=> $info_client->accountCredit,
                'pendiente'=> $info_client->accountOutstanding,
                'id_invoice'=> $last_invoice->id,
                'serviceName' => $services[0]->servicePlanName,
                'number_invoice'=> $last_invoice->number,
                'total_invoice'=> $last_invoice->total
            ];
        }

        //dd($last_invoice);

    /*************************** */
    
        
        //dd($info);
        //dd($info['clientName']);

        //dd("Variable de Session de Paola: ".session('idClientUcrm'));
        

        return view('cliente.info',compact('info'));
        
    }




        //Todas las Facturas
    public function allInvoices(){


         //======= Valida si existe la sesion ======/
         $auth=session('idClientUcrm');
    
         if (is_null($auth ))
         {
             return redirect('/');
         }
        //========================================//

        // UCRM Get Client Invoices
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
        ])->get('https://ucrm.beenet.com.sv/api/v1.0/clients/'.session('idClientUcrm').'/invoices', []);
        //dd(json_decode($response->getBody()->getContents()));

        $invoices = json_decode($response);
        //dd($invoices);


      
    }

        //Detalle de Factura
    public function detailInvoice($id){

        // UCRM Get details Invoices
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
        ])->get('https://ucrm.beenet.com.sv/api/v1.0/invoices/'.$id, []);

        $invoice = json_decode($response);
        
            return view('cliente.details_invoice',compact('invoice'));

        

    }

}
