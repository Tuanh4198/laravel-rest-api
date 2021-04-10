@extends('frontend.main')

@section('title')
<title>Project Detail</title>
@endsection
@section('content')
<style type="text/css">
.hidden { 
	display: none;
	padding: 5px;
}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
	-webkit-appearance: none;
	margin: 0;
}
video {
	margin-right: 10px;
	margin-left: 10px;
	margin-bottom: 10px;
}
img {
	border: 1px solid #80808021;
	max-width: 200px;
}
.selectedFiles .selFile{
    margin: 0 10px;
}
.selectedFiles {
    display: -webkit-box;
	display: flex;
	flex-wrap: wrap;
	margin-right: -10px;
	margin-left: -10px;
}
.form-control:disabled, .form-control[readonly] {
	background-color: white;
}
</style>
<link href="{{ asset('public/dist/css/projectform.css') }}" rel="stylesheet">
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
<li class="breadcrumb-item">
	<a href="#">Home</a>
</li>
<li class="breadcrumb-item">
	<a href="#">View Project</a>
</li>
</ul>
<!--------------------
END - Breadcrumbs 
-------------------->
<div class="content-i">
<div class="content-box">
	<div class="element-wrapper">
		<h6 class="element-header"> Project Detail </h6>
	</div>
	<!--  -->
	@include('frontend.layout.message')
	<div class="element-box element-wrapper">
		<div class="steps-w">
			<div class="step-contents">
				<div class="white-bg">
					<div class="row toggle-tab">Design</div>
					<div class="toggle-content">
						<div class="step-content-tab" data-session="session_2">
							<div class="form-group">
								<div class="show_img">
									<?php if ($proj_detail->panel_image){ ?>
										<a href="{{$proj_detail->panel_image}}" target="_blank"><img src="{{$proj_detail->panel_image}}" width="200"/></a>
									<?php } ?>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<b for="sm_leg">Mounting</b>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="sm_leg">Small Leg (in IN): </label>
										<div class="d-flex justify-content-between align-items-center">
											<input type="text" class="form-control input" disabled value="{{$proj_detail->small_leg}}">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="lg_leg">Large Leg (in IN): </label>
										<div class="d-flex justify-content-between align-items-center">
											<input type="text" class="form-control input" disabled value="{{$proj_detail->large_leg}}">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="number_rows">Number of Rows: </label>
										<div class="d-flex justify-content-between align-items-center">
											<input type="text" class="form-control input" disabled value="{{$proj_detail->number_of_rows}}">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="white-bg">
					<div class="row toggle-tab">Site Picture</div>
					<div class="toggle-content">
						<div class="step-content-tab">
							<div class="row">
								<div class="col-sm-12">
									<div class="wrapper_file_img">
										<div class="form-group">
											<label class="label">Panel Area</label> 
										</div>
										<div class="form-group">
											<div class="selectedFiles">
												<?php $panel_area = json_decode($proj_detail->panel_area) ?>
												@if($panel_area)
												@foreach($panel_area as $value_panel)
												<div class='selFile'><a href="{{$value_panel}}" target="_blank"><img src="{{ $value_panel }}"/></a></div>
												@endforeach 
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="wrapper_file_img">
										<div class="form-group">
											<label class="label">Inverter Area</label>
										</div>
										<div class="form-group">
											<div class="selectedFiles">
												<?php $inverter_area = json_decode($proj_detail->inverter_area) ?>
												@if($inverter_area)
												@foreach($inverter_area as $value_inverter)
												<div class='selFile'><a href="{{$value_inverter}}" target="_blank"><img src="{{ $value_inverter }}"/></a></div>
												@endforeach
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="wrapper_file_img">
										<div class="form-group">
											<label class="label">Wiring Path Video</label> 
										</div>
										<div class="form-group">
											<div class="selectedFiles">
												<?php $file_wiring_path_video = json_decode($proj_detail->wiring_path_video) ?>
												@if($file_wiring_path_video)
												@foreach($file_wiring_path_video as $value_video)
												<video width="400" height="300" controls>
													<source src="{{ $value_video }}" type="video/mp4">
														Your browser does not support HTML video.
													</video>
													@endforeach
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--  -->
@endsection

@section('script')
<script type="text/javascript"> //jquerry
$(document).ready(function(){
$('.toggle-tab').on('click', function(){
		$(this).parent().find('.toggle-content').slideToggle();
		$(this).toggleClass('active');
    });
});
</script>

@endsection