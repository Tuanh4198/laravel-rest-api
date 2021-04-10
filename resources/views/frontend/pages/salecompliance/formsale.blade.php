@extends('frontend.main')

@section('title')
<title>Customer Dashboard</title>
@endsection

@section('content')
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item">
    <a href="#">Sale</a>
    </li>
    <li class="breadcrumb-item">
    <span>  </span>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
        <h6 class="element-header"> Sale </h6>
        <div class="element-box">
          @if(isset($user))

          <form id="formValidate" method="POST" action="{{route('updateSale')}}" >
            <input type="hidden" name="id" value="{{$user[0]->id}}">
            {{ csrf_field() }}
            @include('frontend.errors.note')

            <div class="form-group">
              <label for=""> Name </label><input class="form-control" data-error="Your name is invalid" value="{{$user[0]->name}}" placeholder="Enter your name" required="required" type="text" name="name">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>

            <div class="form-group">
              <label for=""> Phone </label><input class="form-control" data-error="Your phone is invalid" value="{{$user[0]->phone}}" placeholder="Enter your phone" required="required" type="text" name="phone">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>
            <div class="form-group">
              <label for=""> Email address </label><input class="form-control" data-error="Your email address is invalid" value="{{$user[0]->email}}" placeholder="Enter your email" required="required" type="email" name="email" readonly>
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>
            <div class="form-buttons-w">
              <button class="btn btn-primary" type="submit"> Submit</button>
            </div>
          </form>

          @else

          <form id="formValidate" method="POST" action="{{route('addSale')}}" >
            {{ csrf_field() }}
            @include('frontend.errors.note')

            <div class="form-group">
              <label for=""> Name </label><input class="form-control" data-error="Your name is invalid" placeholder="Enter your name" required="required" type="text" name="name">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>

            <div class="form-group">
              <label for=""> Phone </label><input class="form-control" data-error="Please enter a valid country India phone number." pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" placeholder="Enter your phone" required="required" type="text" name="phone">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>
            <div class="form-group">
              <label for=""> Email address </label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter your email" required="required" type="email" name="email">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Password</label><input class="form-control" data-minlength="6" placeholder="Password" required="required" type="password" name="password">
                  <div class="help-block form-text text-muted form-control-feedback">
                    Minimum of 6 characters
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Confirm Password</label><input class="form-control" data-match-error="Passwords don&#39;t match" placeholder="Confirm Password" required="required" type="password" name="confirm_password">
                  <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
              </div>
            </div>
            <div class="form-buttons-w">
              <button class="btn btn-primary" type="submit"> Submit</button>
            </div>
          </form>

          @endif

        </div>
        </div>
    </div>
</div>
<!-- end content -->
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    (function ($) {
		$("#dataTable1_wrapper").removeAttr('class').addClass("dataTables_wrapper container-fluid dt-bootstrap4");
		$("#dataTable1_paginate .paginate_button").addClass("page-item");
		$("#dataTable1_paginate .paginate_button a").addClass("page-link");
	})($);
  });
</script>
@endsection