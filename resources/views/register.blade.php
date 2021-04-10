<!DOCTYPE html>
<html>
   <head>
      <title>{{ __('Register') }}</title>
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
               {{ __('Contact Form') }}
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
            <form role="form" method="POST" action="{{ route('post.createcontact' )}}" enctype="multipart/form-data" id="contact_form">
               {{ csrf_field() }}
               <div class="form-group">
                  <label for="name">Name</label><input class="form-control" placeholder="Enter Name" type="text" name="name" id="name">
               </div>
               <div class="form-group">
                  <label for="adr_line_1"> Address Line-1</label><input class="form-control" placeholder="Enter Address Line-1" type="text" name="adr_line_1">
               </div>
               <div class="form-group">
                  <label for="adr_line_2">Address Line-2</label><input class="form-control" placeholder="Enter Address Line-2" type="text" name="adr_line_2">
               </div>
               <div class="form-group">
                  <label for="pincode">Pin Code</label>
                  <input class="form-control" placeholder="Enter Pin Code" type="text" name="pincode" id="pincode">
               </div>

               <div class="form-group">
                     <label for="state"> State Select</label>
                     <select class="form-control" name="state" id="state">
                        <option value="">Select State</option>
                     </select>
              </div>
               <div class="form-group">
                  <label for="city"> City Select</label>
                  <select class="form-control" name="city" id="city">
                     <option>
                        City
                     </option>
                  </select>
               </div>

                  <div class="row">
                        <div class="col-sm-8">
                           <div class="form-group">
                              <label for="meu">Electricity Ussage in Kwh</label>
                        <input class="form-control" placeholder="Enter Electricity Ussage in Kwh" data-rule-requireds="true" type="text" name="meu">
                           </div>
                        </div>
                        <div class="col-sm-4 mt-4">
                           <div class="form-check">
                              <label class="form-check-label"><input checked="" class="form-check-input" name="optionsRadios[]" type="radio" value="Year">Year</label>
                           </div>
                           <div class="form-check">
                              <label class="form-check-label"><input class="form-check-input" name="optionsRadios[]" type="radio" value="Month">Month</label>
                           </div>
                     </div>
               </div>
               <div class="form-group">
                  <label for="phone">Phone</label>
                  <input class="form-control" pattern="^[6-9]\d{9}$" placeholder="Enter Phone" type="text" name="phone" id="phone">
                  <span class="error error-keyup-4"></span>
               </div>
               
               <div class="form-group">
                  <label for="mail">Email</label>
                  <input class="form-control" placeholder="Enter Email" type="email" name="mail" id="mail">
               </div>
               <div class="form-group">
                  <label class="col-form-label" for="date">Visit Date and Time</label>
                  <div id='datetimepicker1'>
                     <input class="single-daterange form-control" placeholder="Visit Date and Time" type="date" name="date">
                  </div>
               </div>

               <div class="buttons-w">
                  <button class="btn btn-primary" id="submit_btn">{{ __('Contact Now') }}</button>
                  <a class="btn btn-primary" style="margin-left: 10px; color: white" href="{{ url('/login') }}">
                     {{ __('Login') }}
                  </a>
               </div>
            </form>
            <script src="{{ asset('public/dist/bower_components/jquery/dist/jquery.min.js') }}"></script>
            <script src="{{ asset('public/dist/bower_components/jquery/dist/jquery.validate.min.js') }}"></script>
         <script type="text/javascript">
               $(document).ready(function(){
                  $.ajax({
                     url: '<?php echo url('api/getState') ?>',  
                     type: 'GET',
                     dataType: 'json',
                     success: function(data){
                        $.each(data, function(key, value){
                           $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                        });
                     }
                  });

                  $('select[name="state"]').on('change', function(){
                     var state_id = $(this).val();
                     if(state_id){
                        $.ajax({
                           url: '<?php echo url('api/getCity') ?>/'+state_id,
                           type: 'GET',
                           dataType: 'json',
                           success: function(data){
                              $('select[name="city"]').empty();
                              $.each(data, function(key, value){
                                 $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                              });
                           }
                        });
                     }else{
                        $('select[name="city"]').empty();
                     }
                  });

                  $.validator.addMethod("regx", function(value, element, regexpr) {
                     return regexpr.test(value);
                  }, "Please enter a valid country India phone number.");
				  $.validator.addMethod( "requireds", function( value, element, regexpr ) {
					return regexpr.test(value);
				}, "You cannot enter must be a number." );
                     var formValidate = $("#contact_form").validate({
                     rules: {
                        name : {
                           required: true,
                        },  
                        phone : {
                           required: true,
                           regx: /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/,
                        },
                        email : {
                           required: true,
                        },
                        state : {
                           required: true,
                        },
                        city : {
                           required: true,
                        },
                        pincode : {
                           required: true,
                        },
                        mail : {
                           required: true,
                        },
                        date : {
                           required: true,
                        },
                        meu : {
                           required: true,
						   requireds: /^[0-9.]+$/u,
                        },
                        city : {
                           required: true,
                        },
                        adr_line_1 : {
                           required: true,
                        }
                     }
                  });
                  $(function() {
                     $("#submit_btn").click(function(){
                        var isValidate = $("#contact_form").valid();
                        if (isValidate){
                           confirm("Active Email");
                           $('form#contact_form').submit();
                        }
                     });
                  });
               });
         </script>
         </div>
      </div>
      </div>
      </div>
      </div>
   </body>
</html>