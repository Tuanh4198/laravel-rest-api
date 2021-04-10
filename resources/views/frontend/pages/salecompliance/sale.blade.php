@extends('frontend.main')

@section('title')
<title>Sales & Compliance (S&C) List</title>
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
    <a href="#">Sales & Compliance (S&C)</a>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
        <h6 class="element-header"> Sales & Compliance (S&C) </h6>
        @include('frontend.errors.success')
        @include('frontend.errors.note')
        <div class="element-box">
            <div class="steps-w">
              <div class="step-contents">
                <div class="step-content active" id="stepContent1">
                    <div class="table-responsive">
                        <a class="btn btn-primary btn-sm" href="{{URL::to('admin/formsale')}}"><span>Add New Sales & Compliance (S&C)</span></a>
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale as $key => $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>
                                            <a href="{{ route('deleteSale', $value->id) }}">Delete</a>
                                            <a href="{{ route('editSale', $value->id) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="step-content" id="stepContent2">
                    Confirmed
                </div>
              </div>
            </div>
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