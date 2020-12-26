@extends('layout.template')

@section('content')
    <!-- h3 class="mb-4">Bienvenido a Sistema de Pago</h3 -->    
    <div class="jumbotron">
        <h1 class="display-4">Sistema de Pago Beenet</h1>
        <p class="lead">Bienvenido, desde aqui podras pagar tus facturas de manera rapida.</p>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <a class="btn btn-primary btn-lg" href="{{ route('all_Invoices') }}" role="button">Ver mis Facturas</a>
            </div>
        </div>
    </div>
@endsection