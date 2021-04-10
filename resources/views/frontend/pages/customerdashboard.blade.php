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
    <a href="index.html">Customer Dashboard</a>
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
        <div class="row">
          <div class="col-sm-4 col-xxxl-4">
            <h3>Project ID - {{$project_tracker->project_id}}</h3>
          </div>            
          <div class="col-sm-4 col-xxxl-4">
          </div>            
          <div class="col-sm-4 col-xxxl-4">
            <div>Effective</div>
            <div>System Size</div>
            <h3>{{$project_tracker->effective_system_size}} kW</h3>
          </div>
        </div>  
        <h3>Project Tracker</h3>
        <div class="element-wrapper background">
          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>            
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->site_inspection_scheduled}}" >
               <div class="text-box">
                  Site Inspection Scheduled
                </div>
              </div>
            </div>            
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div>          

          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>            
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->site_inspection_completed}}" >
               <div class="text-box">
                  Site Inspection Completed
                </div>
              </div>
            </div>            
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div>  

          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>            
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->project_accepted}}" >
               <div class="text-box">
                  Project Accepted
                </div>
              </div>
            </div>            
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div> 

          <div class="row">
            <div class="col-sm-3 col-xxxl-3 col-6">
              <div class="element-box el-tablo status-{{$project_tracker->discom_application}}">
                <div class="text-box">
                  DISCOM Application
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xxxl-6">
            </div>
            <div class="col-sm-3 col-xxxl-3 col-6">
              <div class="element-box el-tablo status-{{$project_tracker->finance_application}}">
                <div class="text-box">
                  Finance Application
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->components_received}}">
                <div class="text-box">
                  Components Received
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div>          

          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->installation}}">
                <div class="text-box">
                  Installation
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div>           

          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->compliance}}">
                <div class="text-box">
                  Compliance
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div>           

          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->discom_commissioning_application}}">
                <div class="text-box">
                  DISCOM Commissioning Application
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div>           
          <div class="row">
            <div class="col-sm-4 col-xxxl-4">
            </div>
            <div class="col-sm-4 col-xxxl-4">
              <div class="element-box el-tablo status-{{$project_tracker->commissioned}}">
                <div class="text-box">
                  Commissioned
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xxxl-4">
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-sm-4 col-xxxl-4">
            <h3>Payment plan selected</h3>
            <div>{{$project_tracker->bank_branch}}</div>
            <div>EMI: {{$project_tracker->emi}}</div>
          </div>            
          <div class="col-sm-8 col-xxxl-8">
          </div>            
        </div>
      </div>
    </div>
  </div>
</div>
@endsection