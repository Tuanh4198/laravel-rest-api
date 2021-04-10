@extends('frontend.main')

@section('title')
<title>Potentials Detail</title>
<link href="{{ asset('public/dist/css/fixdetail.css') }}" rel="stylesheet">
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
    <a href="#">Potentials Detail</a>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
			<h6 class="element-header">Potentials Detail</h6>
			<div class="element-box">
				<div class="row">
					<div class="col-sm-9 col-xs-6">
						<h5>Potentials ID - {{$potential->id}}</h5>
						<div class="link-view"><a href="{{route('viewInspection', $potential->site_inspection_id)}}">Survey ID</a></div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<div class="system-size">
							<h5>Effective System Size</h5>
							<h3>{{$potential->effective_system_size}} kW</h3>
						</div>
					</div>
				</div>
				@include('frontend.errors.success')
				@include('frontend.errors.note')
				<form id="formValidate" method="POST" action="{{route('updatePotential')}}" >
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{$potential->id}}">
					<div class="form-group potential-status">
						<label for="">Potential Status</label>
						<select class="form-control" name="status">
							@foreach ($potential_status as $key => $value) 
								<option value="{{$value->id}}" @if($potential->status == $value->id) selected="true" @endif >{{$value->name_status}}</option>
							@endforeach
						</select>
					</div>
					@if($potential->status == 3 || $potential->status == 4)
					<div class="reason-comments">
						<div class="form-group">
							<label for=""> Reason</label>
							<select class="form-control" name="reason-after">
								<option value="{{$potential->reason}}">
									{{$potential->reason}}
								</option>
							</select>
						</div>
						<div class="form-group">
							<label>Comments</label>
							<textarea class="form-control" rows="3" name="comments-after">{{$potential->comments}}</textarea>
						</div>
					</div>
					@endif

					<div class="reason-comments" style="display:none;">
						<div class="form-group">
							<label for=""> Reason</label>
							<select class="form-control" name="reason">
								<option value="Found Better Pricing">
									Found Better Pricing
								</option>
								<option value="Better Components Found">
									Better Components Found
								</option>
								<option value="Finance Issue">
									Finance Issue
								</option>
								<option value="Unable to Afford">
									Unable to Afford
								</option>
								<option value="No shadow free Space on roof" >
									No shadow free Space on roof
								</option>
								<option value="Roof not easily accessible">
									Roof not easily accessible
								</option>
								<option value="Maintenance is a burden">
									Maintenance is a burden
								</option>
								<option value="Don't think Solar is a Viable Option">
									Don't think Solar is a Viable Option
								</option>	
							</select>
						</div>
						<div class="form-group">
							<label>Comments</label>
							<textarea class="form-control" rows="3" name="comments"></textarea>
						</div>
					</div>
					@if($potential->status == 2)
					<fieldset class="form-group agreement">
						<legend><span>Agreement</span></legend>
						<div class="agreement-text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu justo a purus interdum facilisis. In et erat a quam lobortis tincidunt. Donec sed pulvinar lacus. In orci velit, consequat eu malesuada quis, egestas nec nisl. Aenean sed diam molestie, volutpat metus ornare, fringilla lectus. Nunc in nunc cursus, pharetra lorem id, pharetra augue. Mauris facilisis tempor ligula, ultricies fermentum nulla ultricies eget. In non mollis nulla, non fringilla magna. Vivamus efficitur lorem eu pulvinar tincidunt. Sed at nisi pretium, sollicitudin ex sed, aliquam diam. Mauris eget tincidunt nisi.</p>
							<div class="read-link" style="text-align: right;">
								<a href="#">Read a full Agreement</a>
							</div>
						</div>
					</fieldset>
					@endif
					<fieldset class="form-group agreement" style="display:none;">
						<legend><span>Agreement</span></legend>
						<div class="agreement-text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu justo a purus interdum facilisis. In et erat a quam lobortis tincidunt. Donec sed pulvinar lacus. In orci velit, consequat eu malesuada quis, egestas nec nisl. Aenean sed diam molestie, volutpat metus ornare, fringilla lectus. Nunc in nunc cursus, pharetra lorem id, pharetra augue. Mauris facilisis tempor ligula, ultricies fermentum nulla ultricies eget. In non mollis nulla, non fringilla magna. Vivamus efficitur lorem eu pulvinar tincidunt. Sed at nisi pretium, sollicitudin ex sed, aliquam diam. Mauris eget tincidunt nisi.</p>
							<div class="read-link" style="text-align: right;">
								<a href="#">Read a full Agreement</a>
							</div>
						</div>
					</fieldset>
					@if($potential->status == 1)
					<div class="form-buttons-w">
						<button class="btn btn-primary" type="submit"> Submit</button>
					</div>
					@endif
				</form> 
			</div>
        </div>
    </div>
</div>

<!-- end content -->
@endsection
<script src="{{ asset('public/dist/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('public/dist/bower_components/jquery/dist/jquery.validate.min.js') }}"></script>
@section('script')
@if($potential->status == 1)
	<script type="text/javascript">
	$(document).ready(function(){
		$('select[name="status"]').on('change', function(){
			var id = $(this).val();
			if(id == 2){
				$('.form-group.agreement').css('display', 'block');
				$('.reason-comments').css('display', 'none');
			}else if(id == 3 || id == 4){
				$('.reason-comments').css('display', 'block');
				$('.form-group.agreement').css('display', 'none');

				$("#formValidate").validate({
					rules: {
						reason : {
							required: true, 
						},
						comments : {
							required: true,
						},
					}
				});


			}else if(id == 1){
				$('.form-group.agreement').css('display', 'none');
				$('.reason-comments').css('display', 'none');
			}
		});
	});
	</script>
@endif
@endsection