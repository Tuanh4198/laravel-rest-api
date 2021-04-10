@extends('frontend.main')

@section('title')
<title>Installer Dashboard</title>
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
    <a href="#">Installer</a>
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
        <h6 class="element-header"> Installer </h6>
        <div class="element-box">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
			  @foreach ($errors->all() as $error)
				  {{ $error }}
			  @endforeach
			</div>
		@endif
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
			{{ $message }}
			</div>
		@endif
		@if(isset($user))
        <form id="formValidate" method="POST" action="{{route('updateIns', $user->id_user)}}">
			{{ csrf_field() }}

			<input type="hidden" name="id_user" value="{{$user->id_user}}">
			<input type="hidden" name="id_user_installer" value="{{$user->id}}">

			<div class="form-group">
				<label for=""> Company Name </label><input class="form-control" data-error="Your company name is invalid" placeholder="Enter company name" required="required" type="text" name="installer_name" value="{{$user->installer_name}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for=""> Contact Name </label><input class="form-control" data-error="Your contact name is invalid" placeholder="Enter contact name" required="required" type="text" name="installer_contact_name" value="{{$user->installer_contact_name}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Phone Number </label><input class="form-control" data-error="Please enter a valid country India phone number." pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$" placeholder="Enter phone number" required="required" type="text" name="installer_phone" value="{{$user->installer_phone}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for=""> Email address</label><input class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email" name="installer_email" value="{{$user->installer_email}}" readonly>
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Address Line-1</label><input class="form-control" placeholder="Enter Address Line-1" type="text" name="installer_adr_1" value="{{$user->installer_adr_1}}">
			</div>
			<div class="form-group">
				<label for="">Address Line-2</label><input class="form-control" placeholder="Enter Address Line-2" type="text" name="installer_adr_2" value="{{$user->installer_adr_2}}">
			</div>

			<div class="form-group">
				<label for="state"> State Select</label>
				<select class="form-control" name="installer_state" id="state" required>
				</select>
			</div>
			<div class="form-group">
				<label for="city"> City Select</label>
				<select class="form-control" name="installer_city" id="city">
				</select>
			</div>
			<div class="form-group">
				<label for="">Pin Code</label>
				<input class="form-control" placeholder="Enter Pin Code" type="text" data-error="Please enter a valid country India Pin Code." pattern="^[1-9][0-9]{5}$" name="installer_pincode" id="pincode" value="{{$user->installer_pincode}}" required="required">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Number of project installer </label><input class="form-control" required="required" placeholder="Enter Number of project installer" type="text" pattern="[0-9]+([.][0-9]+)?"  data-error="The number input must start with a number and use a dot as a decimal character." name="installer_number_of_project" value="{{$user->installer_number_of_project}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Total Installed Capacity in kW </label><input class="form-control" required="required" placeholder="Enter Total Installed Capacity in kW" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." name="installer_total_installer" value="{{$user->installer_total_installer}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Maximum Instal Experience in kW </label><input class="form-control" required="required" placeholder="Enter Maximum Instal Experience in kW" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." name="installer_maximum_installer" value="{{$user->installer_maximum_installer}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Number of employees </label><input class="form-control"  required="required" placeholder="Enter Number of employees" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." name="installer_number_of_employees" value="{{$user->installer_number_of_employees}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Maximum distance served (in km) </label><input class="form-control" required="required" placeholder="Enter Maximum distance served (in km)" type="text" pattern="[0-9]+([.][0-9]+)?" data-error="The number input must start with a number and use a dot as a decimal character." name="installer_maximum_distance" value="{{$user->installer_maximum_distance}}">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-buttons-w">
				<button class="btn btn-primary" type="submit"> Submit</button>
			</div>
			
        </form>

		@else

		<form id="formValidate" method="POST" action="{{route('addInstaller')}}">
			{{ csrf_field() }}

			<div class="form-group">
				<label for=""> Company Name </label><input class="form-control" data-error="Your company name is invalid" placeholder="Enter company name" required="required" type="text" name="installer_name">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for=""> Contact Name </label><input class="form-control" data-error="Your contact name is invalid" placeholder="Enter contact name" required="required" type="text" name="installer_contact_name">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Phone Number </label><input class="form-control"  placeholder="Enter phone number" required="required" type="text" name="installer_phone">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for=""> Email address</label><input class="form-control" data-error="Your email address is invalid"  placeholder="Enter email" required="required" type="email" name="installer_email">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Address Line-1</label><input class="form-control" placeholder="Enter Address Line-1" type="text" name="installer_adr_1" required="required">
			</div>
			<div class="form-group">
				<label for="">Address Line-2</label><input class="form-control" placeholder="Enter Address Line-2" type="text" name="installer_adr_2" required="required">
			</div>

			<div class="form-group">
				<label for="state"> State Select</label>
					<select class="form-control" name="installer_state" id="state" required>
						<option value="">Select State</option>
					</select>
					<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for="city"> City Select</label>
				<select class="form-control" name="installer_city" id="city" required>
					<option>
						City
					</option>
				</select>
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for="">Pin Code</label>
				<input class="form-control" placeholder="Enter Pin Code" type="text" data-error="Please enter a valid country India Pin Code." pattern="^[1-9][0-9]{5}$" name="installer_pincode" id="pincode" required="required">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Number of project installer </label><input class="form-control" required="required" placeholder="Enter Number of project installer" type="text" pattern="[0-9]+([.][0-9]+)?"  data-error="The number input must start with a number and use a dot as a decimal character." name="installer_number_of_project">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for=""> Total Installed Capacity in kW </label><input class="form-control" required="required" placeholder="Enter Total Installed Capacity in kW" type="text" pattern="[0-9]+([.][0-9]+)?"  data-error="The number input must start with a number and use a dot as a decimal character." name="installer_total_installer">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>
			<div class="form-group">
				<label for=""> Maximum Instal Experience in kW </label><input class="form-control" required="required" placeholder="Enter Maximum Instal Experience in kW" type="text" pattern="[0-9]+([.][0-9]+)?"  data-error="The number input must start with a number and use a dot as a decimal character." name="installer_maximum_installer">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Number of employees </label><input class="form-control"  required="required" placeholder="Enter Number of employees" type="text" pattern="[0-9]+([.][0-9]+)?"  data-error="The number input must start with a number and use a dot as a decimal character." name="installer_number_of_employees">
				<div class="help-block form-text with-errors form-control-feedback"></div>
			</div>

			<div class="form-group">
				<label for=""> Maximum distance served (in km) </label><input class="form-control" required="required" placeholder="Enter Maximum distance served (in km)" type="text" pattern="[0-9]+([.][0-9]+)?"  data-error="The number input must start with a number and use a dot as a decimal character." name="installer_maximum_distance">
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
        <script src="{{ asset('public/dist/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					url: '<?php echo url('api/getState') ?>',
					type: 'GET',
					dataType: 'json',
					success: function(data){
						$.each(data, function(key, value){
							if(<?php echo $user->installer_state ?> == key){
								html = '<option value="'+key+'" selected>'+value+'</option>'
							}else{
								html = '<option value="'+key+'" >'+value+'</option>'
							}
							$('select[name="installer_state"]').append(html);
						});
					}		
				});
				$.ajax({
					url: '<?php echo url('api/getCity/'.$user->installer_city.'') ?>',
					type: 'GET',
					dataType: 'json',
					success: function(data){
						$('select[name="installer_city"]').empty();
						$.each(data, function(key, value){
							if(<?php echo $user->installer_city ?> == key){
								html = '<option value="'+key+'" selected>'+value+'</option>'
							}else{
								html = '<option value="'+key+'" >'+value+'</option>'
							}
							$('select[name="installer_city"]').append(html);
						});
					}
				});
				$('select[name="installer_state"]').on('change', function(){
					var state_id = $(this).val();
					if(state_id){
						$.ajax({
							url: '<?php echo url('api/getCity') ?>/'+state_id,
							type: 'GET',
							dataType: 'json',
							success: function(data){
								$('select[name="installer_city"]').empty();
								$.each(data, function(key, value){
									$('select[name="installer_city"]').append('<option value="'+key+'">'+value+'</option>');
												});
							}
						});
					}else{
						$('select[name="installer_city"]').empty();
					}
				});
			});
		</script>

        </div>
        </div>
    </div>
</div>
<!-- end content -->
@endsection