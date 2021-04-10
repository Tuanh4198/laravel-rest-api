@extends('frontend.main')

@section('title')
<title>Potentials List</title>
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
    <a href="#">Potentials</a>
    </li>
</ul>
<!--------------------
END - Breadcrumbs
-------------------->
<div class="content-i">
    <div class="content-box">
        <div class="element-wrapper">
        <h6 class="element-header">Potentials List</h6>
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
                                    <th>Potential ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
									<th>Effective System Size</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
								@foreach ($datas as $key => $value)
								<tr>
									<td>{{ $value->id }}</td>
									<td>{{ $value->name }}</td>
									<td>{{ $value->email }}</td>
									<td>{{ $value->effective_system_size }} kW</td>
									<td><a href="{{ route('viewPotentials', $value->id) }}">{{ $value->name_status }}</a></td>
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