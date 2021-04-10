@extends('frontend.main')

@section('title')
<title>Site Inspection</title>
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
  	margin-bottom: 10px;
  }
  .irs-from:after, .irs-to:after, .irs-single:after {
  	border-top-color: #047bf8;
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
    <a href="#">Site Inspection</a>
    </li>
</ul>
<!--------------------
END - Breadcrumbs 
-------------------->
<div class="content-i">
  <div class="content-box">
    <div class="element-wrapper">
      <h6 class="element-header"> Site Inspection Detail </h6>
    </div>
    <!--  -->
	@include('frontend.layout.message')
    <div class="element-box element-wrapper">
        <div class="steps-w">
          <div class="step-contents">
            <form method="POST" enctype="multipart/form-data" action="{{route('submitInspection')}}" id="basic_form">
				{{ csrf_field() }}
				<input type="hidden" name="id" value="{{ $value->id }}">
				<input type="hidden" value="{{ $value->status }}">
				<div class="white-bg">
					<div class="row toggle-tab">Basic @if($value->session_1 == 1)<span class="icon"></span>@endif</div>
					<div class="toggle-content">
						<div class="step-content-tab" data-session="session_1">
							<div class="row">
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="average_monthly"> Average Monthly Usage in kWh</label>
									  <div class="d-flex justify-content-between align-items-center">
										<input class="form-control input" placeholder="" type="number" name="average_monthly_usage" value="{{$value->average_monthly_usage}}"/>
										<i class="fa fa-check hidden text-success"></i>
									  </div>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="potential">Potential Install Area</label>
									  <div class="d-flex justify-content-between align-items-center">
										<input class="form-control input" placeholder="" type="number" name="potential_install_area" value="{{$value->potential_install_area}}"/>
										<i class="fa fa-check hidden text-success"></i>
									  </div>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="average">Average Sun Hours</label>
									  <div class="d-flex justify-content-between align-items-center">
										<input class="form-control input" placeholder="" type="number" name="average_sun_hours" value="{{$value->average_sun_hours}}"/>
										<i class="fa fa-check hidden text-success"></i>
									  </div>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="bill">Bill Offset</label>
									  <input class="form-control bill input" placeholder="" type="number" name="bill_offset" value="{{$value->bill_offset}}"/>
								  </div>
								</div>
								<div class="col-12 message_basic">
									<div class="form-group text-center">
										<label for="">Estimated System Size</label> 
										<div class="system_size_value"><h3 class="system_size">{{formatAmountKw($value->system_size)}}<h3></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="white-bg">
					<div class="row toggle-tab">Design @if($value->session_2 == 1)<span class="icon"></span>@endif</div>
					<div class="toggle-content">
						<div class="step-content-tab" data-session="session_2">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<label>Panel Array (Installation)</label>
										@if($value->status == 0)
										<button class="btn btn-primary" id="btn_modal_skeleton" style="margin: 0 5px;"> DRAW </button>
										@endif
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="show_img">
									<?php if ($value->panel_image){ ?>
										<a href="{{$value->panel_image}}" target="_blank"><img src="{{$value->panel_image}}" width="200"/></a>
									<?php } ?>
							  </div>
							</div>
							<div class="row">
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="sm_leg"> Small Leg (in IN)</label>
									  <input class="form-control input" placeholder="" type="number" name="small_leg" value="{{$value->small_leg}}"/>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="lg_leg">Large Leg (in IN)</label>
									  <input class="form-control input" placeholder="" type="number" name="large_leg" value="{{$value->large_leg}}"/>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="number_rows">Number of Rows</label>
									  <input class="form-control input" placeholder="" type="number" name="number_of_rows" value="{{$value->number_of_rows}}"/>
								  </div>
								</div>
								<div class="col-sm-6">
								  <div class="form-group">
									  <label for="inverter_length">Panel to Inverter Length (Apprex)</label>
									  <input class="form-control input" placeholder="" type="number" name="inverter_length" value="{{$value->inverter_length}}"/>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="white-bg">
					<div class="row toggle-tab">Payment Plan @if($value->session_3 == 1)<span class="icon"></span>@endif</div>
					<div class="toggle-content">
						<div class="step-content-tab" data-session="session_3">
							<div class="form-header-w text-center">
								<h6> Total Project Cost (includes 2 years old AMC) </h6>
								<h4><span id="tpc" class="money"> {{formatAmount($value->tpc)}} </span> </h4>
							</div>
							<div class="step-content-child">
								<div class="container mt-3">
								<!-- Nav tabs -->
									<ul class="nav nav-tabs">
										<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#home">Cash</a>
										</li>
										<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#menu1">IMS</a>
										</li>
									</ul>
								<!-- Tab panes -->
									<div class="tab-content">
											<div id="home" class="container tab-pane active"><br>
											  <h4>Cash</h4><br>
											  <div class="form-group">
												  <label for="deposit">Deposit</label>
												  <input class="form-control input" placeholder="" type="number" name="deposit"  value="{{$value->deposit}}"/>
											  </div>
											  <div class="form-group"> 
												  <h4><label for="remaining">Remaining</label><span id="remaining" class="money">{{formatAmount($value->remaining)}}</span></h4>
											  </div>
											</div>
										<div id="menu1" class="container tab-pane fade"><br>
										  <h4>IMS</h4><br>
										  <div class="form-group">
											  <label for="down_payment">Down Payment</label>
											  <input class="form-control input" placeholder="" type="number" name="down_payment" value="{{$value->down_payment}}"/>
										  </div>
										  <div class="form-group">
											  <label for="months">No. of Months</label>
											  <input class="form-control months input" placeholder="" type="number" name="of_months" value="{{$value->of_months}}"/>
										  </div>
										  <div class="form-group">
											  <label for="interest">Interest (est.)</label>
											  <input class="form-control input" placeholder="" type="number" name="interest" value="{{$value->interest}}"/>
										  </div>
										  <div class="form-group">
											  <h4><label for="EMI">EMI: </label><span id="emi" class="money"> {{formatAmount($value->emi)}} </span></h4>
										  </div>
										  <div class="form-group">
												<label for="existing_home">Existing Home Loaan</label>
												<div class="md-switch">
													<input type="checkbox" id="switch" class="md-switch-input input" name="existing_home" @if($value->existing_home == 1) checked @endif/>
													<label for="switch" class="md-switch-label">
														<div class="md-switch-label-rail"></div>
														<div class="md-switch-label-rail-slider"/></div>
													</label>
												</div> 
											</div>
											<div class="form-group">
											  <label for="bank">Banking Partner</label>
											  <select class="form-control input" name="bank_id">
												<option value=""> Select bank </option>
												@foreach ($bank as $key => $value_bank)
												  <option value="{{ $value_bank->id }}" @if($value_bank->id == $value->bank_id) selected @endif > {{ $value_bank->bank_name }} </option>
												@endforeach
											  </select>
											</div>
											<div class="form-group">
												<label for="bank_brand">Bank Branch</label>
												<input class="form-control input" type="text" name="bank_branch" value="{{$value->bank_branch}}"/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="white-bg">
					<div class="row toggle-tab">Pagework @if($value->session_4 == 1)<span class="icon"></span>@endif</div>
					<div class="toggle-content">
						<div class="step-content-tab">
							<div class="row">
								<div class="col-sm-12">
									<div class="wrapper_file" title="Select file docx, txt, pdf">
										<div class="form-group">
										<label class="label" for="input">Document - 1</label> <br>
										@if($value->status == 0)
										<div class="input">
											<input name="document_1" class="file hidden" type="file">
											<input type="button" value="Upload" class="btn btn-primary upload">
										</div>
										@endif
										<div class="link">
											@if($value->document_1)<a href="{{$value->document_1}}">View Document</a>@endif
										</div>

										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="wrapper_file" title="Select file docx, txt, pdf">
										<div class="form-group">
										<label class="label" for="input">Document - 2</label> <br>
										@if($value->status == 0)
										<div class="input">
											<input name="document_2" class="file hidden" type="file">
											<input type="button" value="Upload" class="btn btn-primary upload">
										</div>
										@endif
										<div class="link">
											@if($value->document_2)<a href="{{$value->document_2}}">View Document</a>@endif
										</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="wrapper_file" title="Select file docx, txt, pdf">
										<div class="form-group">
										<label class="label" for="input">Document - 3</label> <br>
										@if($value->status == 0)
										<div class="input">
											<input name="document_3" class="file hidden" type="file">
											<input type="button" value="Upload" class="btn btn-primary upload">
										</div>
										@endif
										<div class="link">
											@if($value->document_3)<a href="{{$value->document_3}}">View Document</a>@endif
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="white-bg">
					<div class="row toggle-tab">Site Picture @if($value->session_5 == 1)<span class="icon"></span>@endif</div>
					<div class="toggle-content">
						<div class="step-content-tab">
							<div class="row">
							  <div class="col-sm-12">
								<div class="wrapper_file_img">
								  <div class="form-group">
									<label class="label">Panel Area</label> <br>
									<div class="input_">
										@if($value->status == 0)
											<input name="panel_area" type="file" class="file_img hidden" multiple>
											<input type="button" value="Upload" class="btn btn-primary upload">
										@endif
									</div>
								  </div>
								  <div class="form-group">
									<div class="selectedFiles">
										<?php $panel_area = json_decode($value->panel_area) ?>
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
									<label class="label">Inverter Area</label> <br>
									@if($value->status == 0)
									<div class="input_">
									  <input name="inverter_area" type="file" class="file_img hidden" multiple>
									  <input type="button" value="Upload" class="btn btn-primary upload">
									</div>
									@endif
								  </div>
								  <div class="form-group">
									<div class="selectedFiles">
										<?php $inverter_area = json_decode($value->inverter_area) ?>
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
									<label class="label">Wiring Path Video</label> <br>
									@if($value->status == 0)
									<div class="input_">
									  <input name="wiring_path_video" type="file" class="file_img hidden" multiple>
									  <input type="button" value="Upload" class="btn btn-primary upload">
									</div>
									@endif
								  </div>
								  <div class="form-group">
									<div class="selectedFiles">
										<?php $file_wiring_path_video = json_decode($value->wiring_path_video) ?>
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
					<div class="form-buttons-w">
						@if($value->status == 0)
							@if($value->session_1 == 1 && $value->session_2 == 1 && $value->session_3 == 1 && $value->session_4 == 1 && $value->session_5 == 1)
								<button class="btn btn-primary" type="submit"> Submit</button>
							@endif
						@endif
					</div>
				</div>
              <!--  -->
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@if($value->status == 0)
<div class="modal-wrapper">
    <div class="modal_skeleton">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Design Panel </h5>
            <button class="btn" id="btn_modal_skeleton_close">
            <span aria-hidden="true"> &times;</span>
            </button>
        </div>
        <section class="modal-body">
            <div class="row">
            <div class="col-xl-8">
                <div id="sketchpad"></div>
            </div>
            <div class="col-xl-4">
                <div class="form-group">
                <label for="line-color-input">Set Line Color</label>
                <div class="color-picker-block">
                    <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#000000" id="hexcolor" class="u-full-width"></input>
                    <input type="color" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#000000" class="u-full-width">
                </div>
                </div>
                <!--  -->
                <div class="form-group">
                <label for="line-size-input">Set Line Size</label>
                <input class="u-full-width" type="number" value="5" id="line-size-input">
                </div>
                <!--  -->
                <div class="row">
                <div class="col-sm-6 form-group">
                    <button class="btn btn-light btn-block" id="undo">Undo</button>
                </div>
                <div class="col-sm-6 form-group">
                    <button class="btn btn-light btn-block" id="redo">Redo</button>
                </div>
                <div class="col-sm-12 form-group">
                    <button class="btn btn-light btn-block" id="clear">Clear</button>
                </div>
                </div>
                <!--  -->
                <div class="docs-section text-center">
                <p>Read and write sketchpad data</p>
                <div class="row">
                    <div class="col-sm-6 form-group">
                    <a class="btn btn-light btn-block" id="uploadJson" download="image.png">Upload</a>
                    <input type="file" id="uploadJsonInput" accept="application/json" style="display: none;" />
                    </div>
                    <div class="col-sm-6 form-group">
                    <a class="btn btn-light btn-block" id="downloadJson" download="data.json">Download</a>
                    </div>
                    <div class="col-sm-12 form-group">
                    <a class="btn btn-light btn-block" id="downloadPng">Download PNG</a>
                    </div>
                </div>
                </div>
                <!--  -->
            </div>
            </div>
        </section>
    </div>
    <!--  -->
</div>
@endif
<!--  -->
<style type="text/css">
  .selectedFiles {
    display: flex;
  }
  .selFile:not(:last-child) {
    margin-right: 15px;
  }
  .selectedFiles img {
    max-width: 200px;
    max-height: 200px;
    margin-bottom:10px;
  }
  h6 {
    margin-top: 0;
    margin-bottom:10px;
  }
</style>
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
<!--  -->
@if($value->status == 0)
<script type="text/javascript"> //jquerry
$(document).ready(function(){
  // js
  $(".bill").ionRangeSlider({
      min: 0,
      max: 200,
      from: $("input.bill").val()
  });

  $(".months").ionRangeSlider({
      min: 12,
      max: 72,
      from: $("input.months").val(),
      step: 12
  });

  $('#colorpicker').on('change', function() {
    $('#hexcolor').val(this.value);
  });

  $('#hexcolor').on('change', function() {
    $('#colorpicker').val(this.value);
  });

  $('#btn_modal_skeleton').on('click', function(event) {
      event.preventDefault()
    $('.modal_skeleton').addClass('active');
    $(this).addClass('active');
  });

  $('#btn_modal_skeleton_close').on('click', function(event) {
      event.preventDefault()
    $('.modal_skeleton').removeClass('active');
    $('#btn_modal_skeleton').removeClass('active');
  });
	
  // number format
  function numberWithCommas(number) {
    var parts = number.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
  }
  $(document).ready(function() {
    $(".money").each(function() {
      var num = $(this).text();
      var commaNum = numberWithCommas(num);
      $(this).text(commaNum);
    });
  });
});
</script>
<script type="text/javascript"> // javascript
    var el = document.getElementById('sketchpad');
    var pad = new Sketchpad(el);
    // setLineColor
    function setLineColor(e) {
      var color = e.target.value;
      if (!color.startsWith('#')) {
        color = '#' + color;
      }
      pad.setLineColor(color);
    }
    document.getElementById('colorpicker').oninput = setLineColor;
    // setLineSize
    function setLineSize(e) {
      var size = e.target.value;
      pad.setLineSize(size);
    }
    document.getElementById('line-size-input').oninput = setLineSize;
    // undo
    function undo() {
      pad.undo();
    }
    document.getElementById('undo').onclick = undo;
    // redo
    function redo() {
      pad.redo();
    }
    document.getElementById('redo').onclick = redo;
    // clear
    function clear() {
      pad.clear();
    }
    document.getElementById('clear').onclick = clear;
    function uploadJson() {
      document.getElementById('uploadJsonInput').click();
    }
    document.getElementById('uploadJson').addEventListener('click', uploadJson, false);
    function changeJson(e, a) {
      const files = e.target.files;
      if (files.length == 0) return;

      const reader = new FileReader();
      reader.addEventListener('load', (event) => {
        try {
          var data = JSON.parse(event.target.result);
        } catch (e) {
          alert("Unable to read JSON file");
          throw e;
        }
        pad.loadJSON(data);
      });
      reader.readAsText(files[0]);
    }
    document.getElementById('uploadJsonInput').addEventListener('change', changeJson, false);
    function downloadJson() {
      var data = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(pad.toJSON()));
      this.href = data;
    }
    document.getElementById('downloadJson').addEventListener('click', downloadJson, false);
    function downloadPng() {
      var data = pad.canvas.toDataURL("image/png");
      this.href = data;
    }
    $('#downloadPng').on('click', function(event) {
		event.preventDefault();
		$('.modal_skeleton').removeClass('active');
		$('#btn_modal_skeleton').removeClass('active');
		$('.loading-mask').show();
		var data = pad.canvas.toDataURL("image/png");
		var $this = $(this);
		$.ajax({
			url: '/webapp/api/update-inspection',
			type: 'POST',
			data: {
				id:$('input[name="id"]').val(),
				name : 'panel_image',
				session : 'session_2',
				value: data
			},
			success: function(data){
				if(data.success){
					$('.show_img').html('<a href="' + data.session_2.panel_image + '" target="_blank"><img src="' + data.session_2.panel_image + '" width="200" /></a>');
					if(data.session_2.session == 1){
						if($this.closest(".white-bg").find(".icon").length == 0){
							console.log($this.closest(".white-bg").find(".icon").length);
							$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
						}
					}
					if(data.submit){
						$('.form-buttons-w').html('<button class="btn btn-primary" type="submit"> Submit</button>')
					}
				}else{
					alert(data.errors);
				}
				$('.loading-mask').hide();
			}
		});
    });
    window.onresize = function (e) {
      pad.resize(el.offsetWidth);
    }
</script> 
<script type="text/javascript"> //ajax load
$(document).ready(function(){
	// load ajax
	$(function(){
		$('.form-group input').on('change', function(){
			if($(this).attr("type") == 'text' || $(this).attr("type") == 'number' || $(this).attr("type") == 'checkbox'){
				$('.loading-mask').show();
				var $this = $(this);
				if($(this).attr("type") == 'checkbox'){
					var value = $(this).is(":checked") ? 1 : 0;
				}else{
					var value = $(this).val();
				}
				var session = $(this).closest(".step-content-tab").data("session");
				$.ajax({
					type: "post",
					url: "<?php echo url('api/update-inspection') ?>", 
					data: {
						id:$('input[name="id"]').val(),
						name : $(this).attr("name"),
						session : session,
						value: value
					},
					success: function(data){
						if(data.success){
							$('.message_basic .system_size').text(data.data_session.system_size);
							$('#emi').text(data.data_session.emi);
							$('#remaining').text(data.data_session.remaining);
							$('#tpc').text(data.data_session.tpc);
							if(session == 'session_1'){
								if(data.session_1.session == 1){
									if($this.closest(".white-bg").find(".icon").length == 0){
										console.log($this.closest(".white-bg").find(".icon").length);
										$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
									}
								}
							}else if(session == 'session_2'){
								if(data.session_2.session == 1){
									if($this.closest(".white-bg").find(".icon").length == 0){
										console.log($this.closest(".white-bg").find(".icon").length);
										$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
									}
								}
							}else if(session == 'session_3'){
								if(data.session_3.session == 1){
									if($this.closest(".white-bg").find(".icon").length == 0){
										console.log($this.closest(".white-bg").find(".icon").length);
										$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
									}
								}
							}
							if(data.submit){
								$('.form-buttons-w').html('<button class="btn btn-primary" type="submit"> Submit</button>')
							}
						}else{
							alert(data.errors);
						}
						$('.loading-mask').hide();
					}
				});
			}
	    });	
		$('.form-group select').on('change', function(){
	        $('.loading-mask').show();
			var $this = $(this);
			var session = $(this).closest(".step-content-tab").data("session");
	        $.ajax({
				type: "post",
				url: "<?php echo url('api/update-inspection') ?>", 
				data: {
					id:$('input[name="id"]').val(),
					name : $(this).attr("name"),
					session : session,
					value: $(this).val()
				},
				success: function(data){
					if(data.success){
						$('.message_basic .system_size').text(data.data_session.system_size);
						$('#emi').text(data.data_session.emi);
						$('#remaining').text(data.data_session.remaining);
						$('#tpc').text(data.data_session.tpc);
						if(session == 'session_1'){
							if(data.session_1.session == 1){
								if($this.closest(".white-bg").find(".icon").length == 0){
									console.log($this.closest(".white-bg").find(".icon").length);
									$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
								}
							}
						}else if(session == 'session_2'){
							if(data.session_2.session == 1){
								if($this.closest(".white-bg").find(".icon").length == 0){
									console.log($this.closest(".white-bg").find(".icon").length);
									$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
								}
							}
						}else if(session == 'session_3'){
							if(data.session_3.session == 1){
								if($this.closest(".white-bg").find(".icon").length == 0){
									console.log($this.closest(".white-bg").find(".icon").length);
									$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
								}
							}
						}
						if(data.submit){
							$('.form-buttons-w').html('<button class="btn btn-primary" type="submit"> Submit</button>')
						}
					}else{
						alert(data.errors);
					}
					$('.loading-mask').hide();
				}
	        });
	    });	
	}); 

	// input file
	$(function(){
		var container = $('.wrapper_file');

		container.each(function(index, el) {
			$(this).find('.upload').on('click', function(event) {
				event.preventDefault();
				$(this).parents('.wrapper_file').find('.file').click();
			});
			$(this).find('.file').on('change', function(e){
				$('.loading-mask').show();
				var $this = $(this),
					formData = new FormData();
					formData.append('value', $(this).prop('files')[0]);
					formData.append('name', $(this).attr("name"));
					formData.append('id', $('input[name="id"]').val());
					formData.append('session', 'session_4');
				$.ajax({
					type: 'POST',
					url: "<?php echo url('api/update-inspection') ?>", 
					type: 'POST',
					contentType: false,
					processData: false,
					data: formData,
					dataType: 'json',
					success: function(data){
						if(data.success){
							$this.parents('.wrapper_file').find('.link').html('<a href="'+data.session_4.document_upload+'">View Document</a>');
							if(data.session_4.session == 1){
								if($this.closest(".white-bg").find(".icon").length == 0){
									console.log($this.closest(".white-bg").find(".icon").length);
									$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
								}
							}
							if(data.submit){
								$('.form-buttons-w').html('<button class="btn btn-primary" type="submit"> Submit</button>')
							}
							$('.loading-mask').hide();
						}else{
							alert(data.errors);
							$('.loading-mask').hide();
						}
					}
				})
			});
		});
	});

	// upload img, video
	$(function(){
	    var container = $('.wrapper_file_img'),
	        storedFiles = [];
	    container.each(function(index, el) {
			$(this).find('.upload').on('click', function(event) {
				event.preventDefault();
				$(this).parents('.wrapper_file_img').find('.file_img').click();
			});
			$(this).find('.file_img').on("change", handleFileSelect);
	    }); 
	    function handleFileSelect(e) {
	        var $this = $(this),
	            files = e.target.files,
	            filesArr = Array.prototype.slice.call(files),
	            formData = new FormData();

	        for (var i = 0; i < filesArr.length; i++) {
				formData.append('value['+ i +']', filesArr[i]);
	        }
	        formData.append('session', 'session_5');
	        formData.append('name', $(this).attr("name"));
	        formData.append('id', $('input[name="id"]').val());
			$('.loading-mask').show();
			var name = $(this).attr("name");
	        $.ajax({
				type: 'POST',
				url: "<?php echo url('api/update-inspection') ?>",  
				contentType: false,
				processData: false, 
				data: formData,
				success: function(data){
					if(!data.success){
						alert(data.errors)
					}else{
						$this.parents('.wrapper_file_img').find('.selectedFiles').children().remove();
						var files = data.session_5.data_upload;
						if ( name == 'wiring_path_video') {
							files.forEach(function(item, index, array) {
								var html = '<video width="400" height="300" controls><source src="'+ item +'" type="video/mp4">Your browser does not support HTML video.</video>';
								$this.parents('.wrapper_file_img').find('.selectedFiles').append(html)
							});
						} else {
							files.forEach(function(item, index, array) {
								var html = "<div class='selFile'><a href='"+ item + "' target='_blank' ><img src='" + item + "' width='200'/></a></div>";
								$this.parents('.wrapper_file_img').find('.selectedFiles').append(html)
							});
						}
						if(data.session_5.session == 1){
							if($this.closest(".white-bg").find(".icon").length == 0){
								console.log($this.closest(".white-bg").find(".icon").length);
								$this.closest(".white-bg").find(".toggle-tab").append('<span class="icon"></span>');
							}
						}
						if(data.submit){
							$('.form-buttons-w').html('<button class="btn btn-primary" type="submit"> Submit</button>')
						}
					}
					$('.loading-mask').hide();
				}
	        });
	      //
	    }
	});
});
</script>
@endif
<!--  -->
@endsection