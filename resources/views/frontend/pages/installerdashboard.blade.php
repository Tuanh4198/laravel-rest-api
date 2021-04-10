@extends('frontend.main')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Installer Dashboard</a>
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
    <div class="row">
      <div class="col-sm-12">
        <div class="element-wrapper">
          <h6 class="element-header"> Projects </h6>
          <div class="element-box">
              <div class="table-responsive">
                  <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                      <thead>
                          <tr>
                            <th>Project ID</th>
                            <th>Name</th>
                            <th>Effective System Size</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($proj_installer as $key => $value)
                            <tr>
                                <td>{{ $value->id_project }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->effective_system_size }}</td>
                                <td> <a href="{{URL::to('installer/view-installer/'.$value->id_project)}}"> View More </a> </td>
                            </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>Project ID</th>
                            <th>Name</th>
                            <th>Effective System Size</th>
                            <th>Action</th>
                          </tr>
                      </tfoot>
                  </table>
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