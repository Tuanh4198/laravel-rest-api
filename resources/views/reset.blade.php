<!DOCTYPE html>
<html>
  <head>
    <title>{{ __('Reset Password') }}</title>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="{{ __('Reset Password') }}" name="keywords">
    <meta content="Tony" name="author">
    <meta content="{{ __('Reset Password') }}" name="description">
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
            {{ __('Reset Password') }}
        </h4>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                @error('email')
                     <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled"><li>{{ $message }}</li></ul>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
                @error('password')
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled"><li>{{ $message }}</li></ul>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </body>
</html>