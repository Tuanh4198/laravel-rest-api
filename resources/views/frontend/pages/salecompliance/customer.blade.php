@extends('frontend.main')

@section('title')
<title>Customer List</title>
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
    <a href="#">Customer</a>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
        <h6 class="element-header">Customer List</h6>
        <div class="element-box">
            <div class="steps-w">
              <div class="step-contents">
                <div class="step-content active" id="stepContent1">
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
									<th>State</th>
									<th>City</th>
                                    <th>Address 1</th>
                                    <th>Address 2</th>
                                    <th>Pincode</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $key => $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
										<td>{{ $value->contact_state }}</td>
										<td>{{ $value->contact_city }}</td>
                                        <td>{{ $value->contact_adr_1 }}</td>
                                        <td>{{ $value->contact_adr_2 }}</td>
                                        <td>{{ $value->contact_pincode }}</td>
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