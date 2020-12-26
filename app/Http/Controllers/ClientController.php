<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function index(Request $request){

        return view('cliente.start');

    }

        //Informacion
    public function info(){
    // UCRM Login
        /*
        $response = Http::withOptions([
            'debug' => false,
            'verify' => false
        ])->withHeaders([
            'X-Auth-App-Key' => '71KulvlqqWo77ZDv902IpT9V+WuiD2rZjJKC+d1ociobgVtD2Gg08CQRXGU7oe9y'
        ])->post('https://ucrm.beenet.com.sv/api/v1.0/clients/authenticated', [
                'username'=>'mmiranda',
                'password'=>'12345678'
        ]);
        //dd(json_decode($response->getBody()->getContents())->id);
        $id_client = json_decode($response->getBody()->getContents())->id;
        //Guardar id_client en session laravel
        $request->session()->put('id_client', $id_client);
        //dd(session('id_client'));

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
        $last_invoice = $invoices[count($invoices)-1];
        //dd($last_invoice);

    /*************************** */
    
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
        //dd($info);
        //dd($info['clientName']);

        //dd("Variable de Session de Paola: ".session('idClientUcrm'));
        

        return view('cliente.info',compact('info'));
        
    }

        //Todas las Facturas
    public function allInvoices(){

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

        return view('cliente.all_invoices',compact('invoices'));
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
        //dd(json_decode($response->getBody()->getContents()));

        $invoice = json_decode($response);

        //dd($invoice);

        return view('cliente.details_invoice',compact('invoice'));
    }

}
