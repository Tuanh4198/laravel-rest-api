@extends('frontend.main')

@section('title')
<title>Site Inspection</title>
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
    <a href="#">Site Inspection</a>
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
            <div class="table-responsive">
                <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Daily kWh</th>
                            <th>System size</th>
                            <th>Effective kW</th>
                            <th>TPC</th>
                            <th>EMI</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inspection as $key => $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->daily_kwh }}</td>
                                <td>{{ $value->system_size }}</td>
                                <td>{{ $value->effective_kw }}</td>
                                <td>{{ $value->TPC }}</td>
                                <td>{{ $value->EMI }}</td>
                                <td> <a href="{{URL::to('sale/view-inspection/'.$value->id)}}"> EDIT </a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Daily kWh</th>
                            <th>System size</th>
                            <th>Effective kW</th>
                            <th>TPC</th>
                            <th>EMI</th>
                            <th>Edit</th>
                        </tr>
                    </tfoot>
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