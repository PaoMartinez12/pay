@extends('layout.template')

@section('content')
    <!-- h3 class="mb-4">Bienvenido a Sistema de Pago</h3 -->    
    <div class="jumbotron" id="div_container" style="">
        <center>
        <h1 class="display-4 title">Sistema de Pago</h1>
        <img src="{{asset('img/logos/Beenet-logo.png')}}" width="175px" height="100px" >
       
        <br><br>
        <strong><h3 class="lead descripcion">Bienvenido, desde aquí podras pagar tus facturas de manera rapida.</h3></strong>
        </center>
        <hr class="my-4">
       
        <div class="row">
            
            <div class="col-md-6 offset-md-4">
                <a class="btn btn-primary btn-lg" href="{{ route('all_Invoices') }}" role="button" id="btn_verFacturas">Ver mis Facturas</a>
            </div>
            
        </div>

    </div>
@endsection