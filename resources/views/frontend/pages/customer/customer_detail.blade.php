@extends('frontend.main')

@section('title')
<title>Customer Detail</title>
@endsection

@section('content')
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{URL::to('/get-contact')}}">LIST CONTATC CUSTOMER</a>
    </li>
    <li class="breadcrumb-item">
        <span>CONTATC DETAIL</span>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-panel-toggler">
    <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
</div>
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
            <div class="element-box">
                <form role="form" method="POST" action="{{URL::to('sale/confirm-contact')}}" enctype="multipart/form-data" id="contact_form">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $detail_arr->id }}">
					<input type="hidden" name="id_user" value="{{ $detail_arr->id_user }}"> 
					<input type="hidden" name="email" value="{{ $detail_arr->contact_email }}">
					<input type="hidden" name="name" value="{{ $detail_arr->contact_name }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="created_at">Create at: </label>
                                <?php
                                    $date=date_create($detail_arr->created_at);
                                    echo '<b>' . date_format($date,"Y/m/d - H:i") . '</b>';
                                ?>
                            </div>
							<div class="form-group">
                                <label for="phone">Monthly Electricity Usage in kWh: </label> <b>{{ $detail_arr->contact_meu }}</b>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="visit">Visit date and time: </label>
                                <input class="form-control" value="{{ $detail_arr->contact_visit }}" type="date" name="visit" id="visit">
                                <div id="error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Name: </label> <b> {{ $detail_arr->contact_name }}</b>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone number: </label> <b>{{ $detail_arr->contact_phone }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email: </label> <b>{{ $detail_arr->contact_email }}</b>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pincode">Pincode: </label> <b>{{ $detail_arr->contact_pincode }}</b>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label for="city">City: </label> <b>{{ $detail_arr->contact_city }}</b>
                                </div>
                                <div>
                                    <label for="state">State: </label> <b>{{ $detail_arr->contact_state }}</b>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div><label for="adr_1">Address 1: </label> <b>{{ $detail_arr->contact_adr_1 }}</b></div>
                                <div><label for="adr_2">Address 2: </label> <b>{{ $detail_arr->contact_adr_2 }}</b></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-buttons-w text-right">
                        <button class="btn btn-primary" type="submit"> Confirmed </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection