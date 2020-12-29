@extends('layout.template')
@section('content')
    <h2 class="mb-4">Detalles Factura</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-text"><strong>No. Factura - {{ $invoice->number }}</strong></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6 class="card-text"><strong>Cliente:</strong> {{ $invoice->clientFirstName." ".$invoice->clientLastName}} </h6>
                            <h6 class="card-text"><strong>Direccion:</strong> {{ $invoice->clientStreet1." ".$invoice->clientStreet2}} </h6>
                            <h6 class="card-text"><strong>Departamento:</strong> {{ $invoice->clientCity}}</h6>
                            <h6 class="card-text"><strong>Fecha de Vencimiento:</strong> {{ date('d-m-Y', strtotime($invoice->dueDate))}}</h6>
                            <h6 class="card-text">
                                <strong>Estado: </strong> 
                                @if ($invoice->status == '1')
                                    Pendiente
                                @endif
                                @if ($invoice->status == '2')
                                    Pago Parcial
                                @endif
                                @if ($invoice->status == '3')
                                    Pagada
                                @endif
                            </h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Etiqueta</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->items as $detail)
                                        <tr>
                                            <th scope="row">{{ $detail->type }}</th>
                                            <td>{{ $detail->label }}</td>
                                            <td>$ {{ round($detail->price,2) }}</td>
                                            <td>{{ round($detail->quantity,2) }}</td>
                                            <td>$ {{ round($detail->total,2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <hr>
                    @foreach ($invoice->taxes as $tax)
                        <div class="row">
                            <div class="col-md-6 offset-md-10" style="margin-right: 20px">
                                <strong>{{ $tax->name }} : </strong> $ {{ $tax->totalValue }}
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="col-md-6 offset-md-10">
                            <h6 class="card-text"><strong>Total:</strong> $ {{ $invoice->total}}</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 offset-md-5">
                            @if ($invoice->status == '1')
                                <a class="btn btn-primary" href="{{ route('payForm',array($invoice->id,$invoice->total)) }}" role="button">Pagar</a>
                            @endif   
                        </div>
                    </div>
                                    
                </div>
            </div>
        </div>
        
    </div>
@endsection