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
    <a href="index.html">S&C Dashboard</a>
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
          <h6 class="element-header">
            Site Inspection
          </h6>
          <div class="element-content">
            <div class="row">
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/gettobeconfirm')}}">
                  <div class="label">
                    To be Confirmed
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($customer as $key =>$value){
                        $count++;
                      }

                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/getconfirm')}}">
                  <div class="label">
                    Scheduled
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($contact_confirm as $key =>$value){
                        $count++;
                      }
                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="element-wrapper">
          <h6 class="element-header">
            Projects
          </h6>
          <div class="element-content">
            <div class="row">
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/get-compare-discom')}}">
                  <div class="label">
                    DISCOM Application to be Submitted
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($discom as $key =>$value){
                        $count++;
                      }
                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/get-compare-finance')}}">
                  <div class="label">
                    Finance Application to be Submitted
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($finance as $key =>$value){
                        $count++;
                      }
                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/get-compare-components')}}">
                  <div class="label">
                    Components to be Ordered
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($components as $key =>$value){
                        $count++;
                      }
                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/get-compare-installation')}}">
                  <div class="label">
                    Installation to be Scheduled
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($installation as $key =>$value){
                        $count++;
                      }
                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/get-compare-compliance')}}">
                  <div class="label">
                    Compliance to be Scheduled
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($compliance as $key =>$value){
                        $count++;
                      }
                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
              <div class="col-sm-6 col-xxxl-3">
                <a class="element-box el-tablo" href="{{URL::to('/sale/get-compare-commissioning')}}"> 
                  <div class="label">
                    Commissioning Application to be Submitted
                  </div>
                  <div class="value">
                    <?php 
                      $count = 0;
                      foreach($commissioning as $key =>$value){
                        $count++;
                      }
                    ?>
                    {{$count}}
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection