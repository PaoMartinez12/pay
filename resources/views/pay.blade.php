@extends('layout.template')

@section('content')
<div class="container">
    <div class="page-header">
        <h4>Credit Card Payment Form <!-- small>A responsive credit card payment template</small--></h4>
        <hr>
    </div>
    
    <!-- Credit Card Payment Form - START -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-5 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Payment Details</h5>
                        <img class="img-fluid cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                    </div>
                    
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('pay') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label><strong>CARD NUMBER</strong></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Valid Card Number" id="creditcard" name="creditcard"/>
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
                                        <label><strong><span class="hidden-xs">EXPIRATION</span><span class="hidden-xs-inline">EXP</span> DATE</strong></label>
                                        <input type="text" class="form-control" placeholder="MM / YY" id="expiracion" name="expiracion"/>
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label><strong>CV CODE</strong></label>
                                        <input type="text" class="form-control" placeholder="CVC" id="cvcode" name="cvcode"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label><strong>CARD OWNER</strong></label>
                                        <input type="text" class="form-control" placeholder="Card Owner Names" id="titular" name="titular"/>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <input type="submit" value="Payment"/>
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