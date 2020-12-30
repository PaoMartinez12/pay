@extends('layout.template')

@section('content')
    <h2 class="mb-4">Mis Facturas</h2>

    <table class="table" id="facturasDetalle">
        <thead class="thead-dark" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Numero de Factura</th>
                <th scope="col">Fecha de Vencimiento</th>
                <th scope="col">Monto</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <th scope="row">{{ $invoice->id }}</th>
                    <td>{{ $invoice->number }}</td>
                    <td>{{ date('d-m-Y', strtotime($invoice->dueDate)) }}</td>
                    <td>$ {{ $invoice->total }}</td>
                    <td>
                        @if ($invoice->status == '1')
                            <p class="text-center">Pendiente</p>
                        @endif
                        @if ($invoice->status == '2')
                            <p class="text-center">Pago Parcial</p>
                        @endif
                        @if ($invoice->status == '3')
                            <p class="text-center">Pagada</p>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('invoice',$invoice->id) }}" role="button">Ver</a>
                        @if ($invoice->status != '3')
                            <a class="btn btn-primary" href="{{ route('payForm',array($invoice->id, $invoice->total)) }}" role="button">Pagar</a>
                        @endif
                    </td>
                </tr>
            @endforeach          
        </tbody>
    </table>
      
@endsection