@extends('frontend.main')

@section('title')
<title>Installer List</title>
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
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
        <h6 class="element-header"> Installer </h6>
        @include('frontend.errors.success')
        @include('frontend.errors.note')
        <div class="element-box">
            <div class="table-responsive">
				<a class="btn btn-primary btn-sm" href="{{URL::to('admin/forminstaller')}}"><span>Add New Installer</span></a>
				<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
					<thead>
						<tr>
							<th>Company Name</th>
							<th>Contact Name</th>
							<th>Phone Number</th>
							<th>Email</th>
							<th>City</th>
							<th>State</th>
							<th>PinCode</th> 
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($installer as $key => $value) 
							<tr>
								<td>{{ $value->installer_name }}</td>
								<td>{{ $value->installer_contact_name }}</td>
								<td>{{ $value->installer_phone }}</td>
								<td>{{ $value->installer_email }}</td>
								<td>{{ $value->installer_city }}</td>
								<td>{{ $value->installer_state }}</td>
								<td>{{ $value->installer_pincode }}</td>
								<td>
									<a href="{{ route('deleteInstaller', $value->id_user) }}">Delete</a>
									<a href="{{ route('editInstaller', $value->id_user) }}">Edit</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
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