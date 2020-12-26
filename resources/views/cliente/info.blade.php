@extends('layout.template')

@section('content')
    <h2 class="mb-4">Mi Perfil</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-text"><strong>INFORMACION PERSONAL</strong></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-text"><strong>Cliente: </strong> {{ $info['clientName'] }}</h6>
                            <h6 class="card-text"><strong>Direccion:</strong> {{ $info['direccion'] }} </h6>
                            <h6 class="card-text"><strong>Departamento:</strong> {{ $info['departamento'] }} </h6>
                            <h6 class="card-text"><strong>Email:</strong> {{ $info['email'] }} </h6>
                            <h6 class="card-text"><strong>Telefono:</strong> {{ $info['phone'] }} </h6>
                        </div>
                        
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-text"><strong>INFORMACION DE SERVICIO</strong></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-text"><strong>Plan:</strong> {{ $info['serviceName'] }} </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-text"><strong>Saldo de Cuenta:</strong>     </h6>
                                </div>
                                <div class="col-md-6">
                                    <h6>$ {{ $info['saldo'] }}</h6>
                                </div>
                            </div>     
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-text"><strong>Credito:</strong>     </h6>
                                </div>
                                <div class="col-md-6">
                                    <h6>$ {{ $info['credito'] }}</h6>
                                </div>
                            </div>     
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-text"><strong>Pendiente:</strong>     </h6>
                                </div>
                                <div class="col-md-6">
                                    <h6>$ {{ $info['pendiente'] }}</h6>
                                </div>
                            </div>                         
                        </div>       
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6 class="card-text"><strong>FACTURA ACTUAL - </strong> REF: {{ $info['number_invoice'] }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="card-text"><strong>Total:</strong></h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$ {{ $info['total_invoice'] }}</h6>
                        </div>
                    </div>   
                    <a href="{{ route('invoice',$info['id_invoice']) }}" class="btn btn-primary">PAGAR</a>
                </div>
            </div>
        </div>
    </div>
    

    

@endsection