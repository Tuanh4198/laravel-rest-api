@extends('frontend.main')

@section('title')
<title>Customer Dashboard</title>
@endsection

@section('content')
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item">
    <a href="#">List Contact Customer</a>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
        <h6 class="element-header"> Contacts </h6>
        <div class="element-box">
			@include('frontend.layout.message')
            <div class="steps-w">
              <div class="step-triggers">
                <a class="step-trigger active" href="#stepContent1">To Be Confirmed</a>
                <a class="step-trigger" href="#stepContent2">Confirmed</a>
              </div>
              <div class="step-contents">
                <div class="step-content active" id="stepContent1">
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                                <tr>
									<th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Monthly Electricity Usage in kWh</th>
                                    <th>Visit date and time</th>
                                    <th>Confirm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $key => $value)
                                    <tr>
										<td>{{ $value->id }}</td>
                                        <td>{{ $value->contact_name }}</td>
                                        <td>{{ $value->contact_email }}</td>
                                        <td>{{ $value->contact_phone }}</td>
                                        <td>{{ $value->contact_meu }}</td>
                                        <td>{{ $value->contact_visit }}</td>
                                        <td> <a href="{{URL::to('sale/view-contact/'.$value->id)}}"> Confirm </a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="step-content" id="stepContent2">
                    <div class="table-responsive">
                        <table id="dataTable2" width="100%" class="table table-striped table-lightfont">
                            <thead>
                                <tr>
									<th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Monthly Electricity Usage in kWh</th>
                                    <th>Visit date and time</th>
                                    <th>Confirm</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact_confirm as $key => $value)
                                    <tr>
										<td>{{ $value->id }}</td>
                                        <td>{{ $value->contact_name }}</td>
                                        <td>{{ $value->contact_email }}</td>
                                        <td>{{ $value->contact_phone }}</td>
                                        <td>{{ $value->contact_meu }}</td>
                                        <td>{{ $value->contact_visit }}</td>
                                        <td> <a href="{{route('viewInspection',$value->id)}}"> Confirm </a> </td>
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
<!-- end content -->
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
});
</script>
@endsection