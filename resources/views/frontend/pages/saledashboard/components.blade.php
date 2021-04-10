@extends('frontend.main')

@section('title')
<title>Dashboard</title>
<link href="{{ asset('public/dist/css/customerdashboard.css') }}" rel="stylesheet">
<link href="{{ asset('public/dist/icon_fonts_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Project List</a>
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
      <h6 class="element-header"> Project List </h6>
      @include('frontend.errors.success')
      @include('frontend.errors.note')
      <div class="element-box">
        <div class="steps-w">
          <div class="step-contents">
            <div class="step-content active" id="stepContent1">
              <div class="table-responsive">
                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                  <thead>
                    <tr>
                      <th>SI Date</th>
                      <th>Project ID</th>
                      <th>Name</th>
                      <th>Effective System Size</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key => $value)
                    <tr>
                      <td>{{ $value->created_date }}</td>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->effective_system_size }} kW</td>
                      <td><a href="{{ route('projectDetail', $value->id) }}">Detail</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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