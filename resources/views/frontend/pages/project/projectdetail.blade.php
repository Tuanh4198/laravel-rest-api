@extends('frontend.main')

@section('title')
<title>Project Detail</title>
<link href="{{ asset('public/dist/css/projectform.css') }}" rel="stylesheet">
<link href="{{ asset('public/dist/icon_fonts_assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
@endsection

@section('content')
<style type="text/css">
  span.icon,
  .content_check {
    display: none;
  }
  .alert {
    font-weight: 300;
    position: fixed;
    width: 100%;
    text-align: 0;
    top: 0;
    left: 0;
    text-align: center;
    z-index: 10;
    border-radius: 0;
    padding: 5px 15px;
  }
  .alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
  }
  .alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
  }
</style>
<!--------------------
START - Breadcrumbs
-------------------->
<ul class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Project Detail</a>
  </li>
</ul>
<!--------------------
-------------------->
<div class="content-i">
  <div class="content-box">
    <div class="element-wrapper">
      <div id="message"></div>
      <div class="white-bg" data-model="DiscomApplication" data-session="{{ $projects->discom_application }}">
        <div class="row">
          <div class="col-12 col-sm-6 item-child">
            <h5>Project ID - {{$projects->id_project}}</h5>
            <input type="hidden" name="id" value="{{$projects->id_project}}">
            <a href="#">Survey - 111</a>
          </div>
          <div class="col-12 col-sm-6 item-child">
            <h5>Effective System Size</h5>
            <h5>{{$projects->effective_system_size}} kW</h5>
          </div>
        </div>
        <div class="row toggle-tab">DISCOM Application <span class="icon"></span> </div>
        <div class="toggle-content">
          <div class="form-content">
            <a href="#">Download Forms</a>
          </div>
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Application Submitted </div>
                <span class="icon"></span>
              </div>
              <div class="col-6">
                <div class="md-switch">
                  <input type="checkbox" id="switch_1" class="md-switch-input input btn_check field_prj" name="d_application_submitted" value="{{ $projects->d_application_submitted }}" data-checkbox="{{ $projects->d_application_submitted }}"/>
                  <label for="switch_1" class="md-switch-label">
                    <div class="md-switch-label-rail"></div>
                    <div class="md-switch-label-rail-slider"/></div>
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-content content_check">
            <div class="row">
              <div class="col-6"> Status </div>
              <div class="col-6">
                <div class="form-group">
                 <select class="form-control field_prj" name="d_status" id="discom_app_status" data-value="{{ $projects->d_status }}">
                    <option value="Denied">Denied</option>
                    <option value="Approved">Approved</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="white-bg" data-model="FinanceApplication" data-session="{{ $projects->finance_application }}">
        <div class="row toggle-tab">Finance Application<span class="icon"></span></div>
        <div class="toggle-content">
          <div class="form-content">
            <a href="#"> Download Finance Package </a>
          </div>
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Application Submitted </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_2" class="md-switch-input input btn_check field_prj" name="f_application_submitted" value="{{ $projects->f_application_submitted }}"  data-checkbox="{{ $projects->f_application_submitted }}"/>
                    <label for="switch_2" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-content content_check">
            <div class="row">
              <div class="col-6"> Status </div>
              <div class="col-6">
                <div class="form-group">
                 <select class="form-control field_prj" name="f_status" id="finance_app_status" data-value="{{ $projects->f_status }}">
                    <option value="Denied">Denied</option>
                    <option value="Approved">Approved</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="white-bg" data-model="ComponentsApplication" data-session="{{ $projects->components }}">
        <div class="row toggle-tab">Components <span class="icon"></span> </div>
        <div class="toggle-content">
          <div class="form-content">
            <div class="row">
              <div class="col-4">
              </div>
              <div class="col-4">
                <div>Ordered</div>
              </div>                
              <div class="col-4">
                <div>Received</div>
              </div>
            </div>
          </div>            
          <div class="form-content">
            <div class="row">
              <div class="col-4">
                <div>Panels</div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_3" class="md-switch-input input field_prj" name="panels_ordered" value="{{ $projects->panels_ordered }}" data-checkbox="{{ $projects->panels_ordered }}"/>
                    <label for="switch_3" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>                
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_4" class="md-switch-input input field_prj" name="panels_received" value="{{ $projects->panels_received }}" data-checkbox="{{ $projects->panels_received }}"/>
                    <label for="switch_4" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>               
          <div class="form-content">
            <div class="row">
              <div class="col-4">
                <div>Inverter</div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_5" class="md-switch-input input field_prj" name="inverter_ordered" value="{{ $projects->inverter_ordered }}" data-checkbox="{{ $projects->inverter_ordered }}"/>
                    <label for="switch_5" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>                
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_6" class="md-switch-input input field_prj" name="inverter_received" value="{{ $projects->inverter_received }}" data-checkbox="{{ $projects->inverter_received }}"/>
                    <label for="switch_6" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>               
          <div class="form-content">
            <div class="row">
              <div class="col-4">
                <div>Frame</div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_7" class="md-switch-input input field_prj" name="frame_ordered" value="{{ $projects->frame_ordered }}" data-checkbox="{{ $projects->frame_ordered }}"/>
                    <label for="switch_7" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>                
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_8" class="md-switch-input input field_prj" name="frame_received" value="{{ $projects->frame_received }}" data-checkbox="{{ $projects->frame_received }}"/>
                    <label for="switch_8" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>               
          <div class="form-content">
            <div class="row">
              <div class="col-4">
                <div>Wire</div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_9" class="md-switch-input input field_prj" name="wire_ordered" value="{{ $projects->wire_ordered }}" data-checkbox="{{ $projects->wire_ordered }}"/>
                    <label for="switch_9" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>                
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_10" class="md-switch-input input field_prj" name="wire_received" value="{{ $projects->wire_received }}" data-checkbox="{{ $projects->wire_received }}"/>
                    <label for="switch_10" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>               
          <div class="form-content">
            <div class="row">
              <div class="col-4">
                <div>Accessories</div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_11" class="md-switch-input input field_prj" name="accessories_ordered" value="{{ $projects->accessories_ordered }}" data-checkbox="{{ $projects->accessories_ordered }}"/>
                    <label for="switch_11" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>                
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_12" class="md-switch-input input field_prj" name="accessories_received" value="{{ $projects->accessories_received }}" data-checkbox="{{ $projects->accessories_received }}"/>
                    <label for="switch_12" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>               
          <div class="form-content">
            <div class="row">
              <div class="col-4">
                <div>Monitoring System</div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_13" class="md-switch-input input field_prj" name="monitoring_system_ordered" value="{{ $projects->monitoring_system_ordered }}" data-checkbox="{{ $projects->monitoring_system_ordered }}"/>
                    <label for="switch_13" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>                
              <div class="col-4">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_14" class="md-switch-input input field_prj" name="monitoring_system_received" value="{{ $projects->monitoring_system_received }}" data-checkbox="{{ $projects->monitoring_system_received }}"/>
                    <label for="switch_14" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>            
        </div>  
      </div>
      <!--  -->
      <div class="white-bg" data-model="InstallationApplication" data-session="{{ $projects->installation }}">
        <div class="row toggle-tab">Installation <span class="icon"></span> </div>
        <div class="toggle-content">
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Assign Installer </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <select class="form-control field_prj" name="assign_installer" id="installer_user" data-value="{{ $projects->assign_installer }}">
                    <option value="">Select User</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Date Scheduled </div>
              </div>
              <div class="col-6">
                <input type="date" name="i_date_scheduled" class="field_prj" value="{{ $projects->i_date_scheduled }}" data-date="{{ $projects->i_date_scheduled }}">
              </div>
            </div>
          </div>
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Installation Completed </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_15" class="md-switch-input input field_prj" name="installation_completed" value="{{ $projects->installation_completed }}" data-checkbox="{{ $projects->installation_completed }}"/>
                    <label for="switch_15" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <!--  -->
      <div class="white-bg" data-model="ComplianceApplication" data-session="{{ $projects->compliance }}">
        <div class="row toggle-tab">Compliance <span class="icon"></span> </div>
        <div class="toggle-content">
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Date Scheduled </div>
              </div>
              <div class="col-6">
                <input type="date" name="c_date_scheduled" class="field_prj" value="{{ $projects->c_date_scheduled }}" data-date="{{ $projects->c_date_scheduled }}">
              </div>
            </div>
          </div>
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Compliance Completed </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_16" class="md-switch-input input field_prj" name="compliance_completed" value="{{ $projects->compliance_completed }}" data-checkbox="{{ $projects->compliance_completed }}"/>
                    <label for="switch_16" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="white-bg" data-model="DiscomAommissioningApplication" data-session="{{ $projects->discom_commissioning_application }}">
        <div class="row toggle-tab">DISCOM Commissioning Application <span class="icon"></span> </div>
        <div class="toggle-content">
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Application Completed </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_17" class="md-switch-input input field_prj" name="application_completed" value="{{ $projects->application_completed }}" data-checkbox="{{ $projects->application_completed }}"/>
                    <label for="switch_17" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>            
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Date Scheduled </div>
              </div>
              <div class="col-6">
                <input type="date" name="d_date_scheduled" class="field_prj" value="{{ $projects->d_date_scheduled }}" data-date="{{ $projects->d_date_scheduled }}">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="white-bg" data-model="CommissionApplication" data-session="{{ $projects->commissioned }}">
        <div class="row toggle-tab">Commission <span class="icon"></span> </div>
        <div class="toggle-content">
          <div class="form-content">
            <div class="row">
              <div class="col-6">
                <div> Commissioned </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <div class="md-switch">
                    <input type="checkbox" id="switch_18" class="md-switch-input input field_prj" name="commissioned" value="{{ $projects->commissioned }}" data-checkbox="{{ $projects->commissioned }}"/>
                    <label for="switch_18" class="md-switch-label">
                      <div class="md-switch-label-rail"></div>
                      <div class="md-switch-label-rail-slider"/></div>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
    </div>
  </div>
</div>
@endsection

@section('script')
<!-- Dev Manh -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.toggle-tab').on('click', function(){
      $(this).parent().find('.toggle-content').slideToggle();
      $(this).toggleClass('active');
    });

    $('.os-toggler-w').on('click', function(){
      $(this).toggleClass('on');
    });
    // $('select[name="installer_user"]').select2();
    $.ajax({
       url: '<?php echo url('api/getinstaller') ?>',
       type: 'GET',
       dataType: 'json',
       success: function(data){
        $.each(data, function(id, email){
         $('select[name="assign_installer"]').append('<option value="'+data[id].id_user+'">'+email.email+'</option>');
        });
        select = $('select');
        select.each(function() {
          var $this = $(this);
          $this.find('option').each(function() {
            if ($(this).val() == $this.data('value')) {
              $(this).attr("selected","selected");
            }
          });
        });
      }
    });

  });
</script>
<!-- Dev Anh Nguyen -->
<script type="text/javascript">
  $(document).ready(function(){
    $(function(){
      var field = $(".field_prj");
          id = $('input[name="id"]').val();
          id_user = $('input[name="id_user"]').val();
          session = $('.white-bg');
      session.each(function() {
        if ($(this).data('session') == 1) {
          $(this).find('span.icon').show();
          $(this).find('.field_prj').each(function(){
            $(this).prop('disabled', true);
          });
        } else {
          $(this).find('span.icon').hide();
        }
      });
      // 
      field.each(function() {
        if ($(this).attr('type') == 'checkbox') {
          if ($(this).val() == 0) {
            $(this).prop('checked', false);
            $(this).parents('.toggle-content').find('.content_check').slideUp();
          } else {
            $(this).prop('checked', true);
            $(this).parents('.toggle-content').find('.content_check').slideDown();
          }
        }
        // 
        $(this).on('change', show);
      });
      // 
      function show(){
        if ($(this).attr('type') == 'checkbox') {
          if ($(this).val() == 0) {
            $(this).val(1);
          } else {
            $(this).val(0);
          }
        }
        // 
        $('.loading-mask').show();
        // 
        var value = $(this).val(),
          name = $(this).attr('name'),
          model = $(this).parents('.white-bg').data("model"),
          $this = $(this);
        // 
        $.ajax({
          url: '<?php echo url('api/editProjectStatusFlow') ?>', 
          type: 'POST',
          dataType: 'json',
          data: {
            model: model,
            id: id,
            id_user: id_user,
            value: value,
            name: name,
          },
          success: function(data){
            console.log(data);
            $('.loading-mask').hide(); 
            if (data.errors != null) {
              var html = '<div class="alert alert-danger"><strong>'+data.errors+'</strong></div>';
              $('#message').append(html);
              if ($this.attr('type') == 'checkbox') {
                $this.val($this.data("checkbox"));
                if ($this.data("checkbox") == 0) {
                  $this.prop( "checked", false );
                  $this.parents('.toggle-content').find('.content_check').slideUp();
                } else {
                  $this.prop( "checked", true );
                  $this.parents('.toggle-content').find('.content_check').slideDown();
                }
              } if ($this.attr('type') == 'date') {
                $this.val($this.data('date'));
              } else {
                $this.prop("selectedIndex", 0);
              }
            } else {
              var html = '<div class="alert alert-success"><strong>'+data.message+'</strong></div>';
              $('#message').append(html);
              if ($this.attr('type') == 'checkbox') {
                $this.is(":checked") ? $this.parents('.toggle-content').find('.content_check').slideDown() : $this.parents('.toggle-content').find('.content_check').slideUp();
                $this.data('checkbox', 1);
              }
              $('.white-bg').each(function() {
                if ($(this).data('model') == data.model) {
                  $(this).find('span.icon').show();
                  $(this).find('.field_prj').each(function(){
                    $(this).prop('disabled', true);
                  });
                }
              });
            }
            setTimeout(function() {
                $('#message').empty();
            }, 3000);
          },
          error: function(err) {
            $('.loading-mask').hide();
            console.log(err);
          }
        });
        // 
      }
    });
  });
</script>
@endsection