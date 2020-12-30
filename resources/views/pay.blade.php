@extends('layout.template')

@section('content')
<div class="container">
    <div class="page-header">
        <h4>Formulario de pago <!-- small>A responsive credit card payment template</small--></h4>
        <hr>
    </div>
    
    <!-- Credit Card Payment Form - START -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-header ">
                        
                        <img class="img-fluid cc-img" src="{{asset('img/logos/metodosPago.png')}}">
                    </div>
                    
                    <div class="card-body text-white bg-dark  ">
                        <form role="form" method="POST" action="{{ route('pay') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label><strong>Numero de tarjeta</strong></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="0000 0000 0000 0000" id="creditcard" name="creditcard" required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text fa fa-credit-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><strong><span class="hidden-xs"> Fecha de Expiración</span><span class="hidden-xs-inline"></span> </strong></label>
                                        <input type="text" class="form-control" placeholder="MM / YY" id="expiracion" name="expiracion" required/>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label><strong>Codigo CV </strong></label>
                                        <input type="text" class="form-control" placeholder="CVC" id="cvcode" name="cvcode" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label><strong>Propietario</strong></label>
                                        <input type="text" class="form-control" placeholder="Nombre propietario" id="titular" name="titular" required/>
                                    </div>
									
                                </div>
								{{--<div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label><strong>Monto</strong></label>
                                        <input type="text" class="form-control" placeholder="monto" id="momto" name="monto" value="$ {{$monto}}" required/>
                                    </div>
                                </div>--}}
                                <div class="col-xs-12 col-md-12">
                                    <label><strong>Monto</strong></label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-text fa fa-dollar"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="monto" id="momto" name="monto" value="{{$monto}}" required/>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <center><input class="btn btn-primary" type="submit" value="Payment"/><center>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <style>
        .cc-img {
            margin: 0 auto;
        }
    </style>
    <!-- Credit Card Payment Form - END -->
    
    </div>    
@endsection