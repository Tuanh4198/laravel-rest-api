<!DOCTYPE html>
<html>
  <head>
    <title>{{ __('Login') }}</title>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="{{ __('Login') }}" name="keywords">
    <meta content="Tony" name="author">
    <meta content="{{ __('Login') }}" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('public/dist/favicon.png') }}" rel="shortcut icon">
    <link href="{{ asset('public/dist/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/dist/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/css/main.css?version=4.5.0g') }}" rel="stylesheet">
  </head>
  <body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
        <div class="logo-w">
          <a href="{{ url('/') }}"><img alt="" src="{{ asset('public/dist/img/logo-big.png') }}"></a>
        </div>
        <h4 class="auth-header">
            {{ __('Login') }}
        </h4>
        <?php
            $message = Session::get('message');
            $status = Session::get('status');
            if($status == 1 && $message) {
              echo '<p class="text-success text-center">'.$message.'</p>';
              Session::put('message',null);
            }
            if($status == 0 && $message) {
              echo '<p class="text-danger text-center">'.$message.'</p>';
              Session::put('message',null);
            }
        ?>
        <form method="POST" id="formValidate" novalidate="true" action="{{route('password.postLogin')}}">
            @csrf
            @include('frontend.errors.note')
          <div class="form-group">
            <label for="username"> {{ __('Email') }}</label>
            <input id="username" type="email" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            <!-- @error('username')
                <div class="help-block form-text with-errors form-control-feedback">
                    <ul class="list-unstyled"><li>{{ $message }}</li></ul>
                </div>
            @enderror -->
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
           <!--  @error('password')
                <div class="help-block form-text with-errors form-control-feedback">
                    <ul class="list-unstyled"><li>{{ $message }}</li></ul>
                </div>
            @enderror -->
          </div>
          <div class="buttons-w">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            <button type="submit" class="btn btn-primary"><a href="{{route('getRegister')}}"  style="color: white">{{ __('Contact') }}</a></button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>