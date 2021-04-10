<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="{{ __('Reset Password') }}" name="keywords">
    <meta content="Tony" name="author">
    <meta content="{{ __('Reset Password') }}" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('public/dist/favicon.png') }}" rel="shortcut icon">
    <link href="{{ asset('public/dist/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/dist/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/dropzone/dist/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/bower_components/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/css/main.css?version=4.5.0') }}" rel="stylesheet">
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <div class="menu-mobile menu-activated-on-click color-scheme-dark">
          <div class="mm-logo-buttons-w">
            <a class="mm-logo" href="{{route('home')}}"><img src="{{ asset('public/dist/img/logo.png') }}"><span>{{ __('WEB - API') }}</span></a>
            <div class="mm-buttons">
              <div class="color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                  <div class="top-bar color-scheme-transparent">
                    <div class="top-menu-controls">
                      <div class="logged-user-w">
                        <div class="logged-user-i">
                          <div class="avatar-w">
                            <img alt="" src="{{ asset('public/dist/img/avatar1.jpg') }}">
                          </div>
                          <div class="logged-user-menu color-style-bright">
                            <div class="logged-user-avatar-info">
                              <div class="avatar-w">
                                <img alt="" src="{{ asset('public/dist/img/avatar1.jpg') }}">
                              </div>
                              <div class="logged-user-info-w">
                                <div class="logged-user-name text-uppercase">
                                  @if(Auth::check())
                                  {{Auth::user()->first_name}}
                                  {{Auth::user()->last_name}}
                                  @endif
                                </div>
                                <div class="logged-user-role">
                                  @if(Auth::check())
                                  <?php  
                                  $role = Auth::user()->role;
                                  if($role==1)
                                    echo "Admin";
                                  else if($role==0)
                                    echo "Vendor";
                                  else
                                    echo "Operations";
                                  ?>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="bg-icon">
                              <i class="os-icon os-icon-wallet-loaded"></i>
                            </div>
                            <ul>
                              <li>
                                <a href="@if(Auth::check()) {{asset('backend/user/details/'.Auth::user()->id)}} @endif"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                              </li>
                              <li>
                                <a href="{{route('logout')}}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>


              <div class="mobile-menu-trigger">
                 <div class="os-icon os-icon-hamburger-menu-1" style="line-height: 55px"></div>
              </div>
            </div>
          </div>
          <div class="menu-and-user">
           
            <!--------------------
            START - Mobile Menu List
            -------------------->
            <ul class="main-menu">
              <li>
                <a href="{{route('home')}}">
                  <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                  </div>
                  <span>Dashboard</span></a>
              </li>
             
              
            </ul>
            <!--------------------
            END - Mobile Menu List
            -------------------->
          </div>
        </div>
        <!--------------------
        END - Mobile Menu
        --------------------><!--------------------
        START - Main Menu
        -------------------->
        <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
          <div class="logo-w">
            <a class="logo" href="{{ url('/home') }}">
              <div class="logo-element"></div>
              <div class="logo-label">
                {{ __('WEB - API') }}
              </div>
            </a>
          </div>
          <ul class="main-menu">
            <li class="selected">
              <a href="{{route('home')}}">
                <div class="icon-w">
                  <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Dashboard</span></a>
            </li>
             <li>
                <a href="{{route('getRegister')}}">
                  <div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                  </div>
                  <span>FORM Register</span></a>
              </li>
          </ul>
        </div>
        <!--------------------
        END - Main Menu
        -------------------->
        <div class="content-w">
          <!--------------------
          START - Top Bar
          -------------------->
          <div class="top-bar color-scheme-transparent">
            <!--------------------
            START - Top Menu Controls
            -------------------->
            <div class="top-menu-controls">
              <!--------------------
              START - Settings Link in secondary top menu
              -------------------->
              <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                <div class="os-dropdown">
                  <div class="icon-w">
                    <i class="os-icon os-icon-ui-46"></i>
                  </div>
                  <ul>
                    <li>
                      <a href="#"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                    </li>
                    <li>
                      <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <!--------------------
              END - Settings Link in secondary top menu
              --------------------><!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
              <div class="logged-user-w">
                <div class="logged-user-i">
                  <div class="avatar-w">
                    <img alt="" src="{{ asset('public/dist/img/avatar1.jpg') }}" target="_pic">
                  </div>
                  <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                      <div class="avatar-w">
                        <img alt="" src="{{ asset('public/dist/img/avatar1.jpg') }}">
                      </div>
                      <div class="logged-user-info-w">
                        <div class="logged-user-name text-uppercase">
                          @if(Auth::check())
                          {{Auth::user()->first_name}}
                          {{Auth::user()->last_name}}
                          @endif
                        </div>
                        <div class="logged-user-role">
                          @if(Auth::check())
                          <?php  
                          $role = Auth::user()->role;
                          if($role==1)
                            echo "Admin";
                          else if($role==0)
                            echo "Vendor";
                          else
                            echo "Operations";
                          ?>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="bg-icon">
                      <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                    <ul>
                      <li>
                        <a href="@if(Auth::check()) {{asset('backend/user/details/'.Auth::user()->id)}} @endif"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                      </li>
                      <li>
                        <a href="{{route('logout')}}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--------------------
              END - User avatar and menu in secondary top menu
              -------------------->
            </div>
            <!--------------------
            END - Top Menu Controls
            -------------------->
          </div>
          <!--------------------
          END - Top Bar
          --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
          <!-- <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
          </ul> -->
          <!--------------------
          END - Breadcrumbs
          -------------------->
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                     @yield('content')
                  </div>
                </div>
              </div>         <div class="floated-colors-btn second-floated-btn">
                <div class="os-toggler-w">
                  <div class="os-toggler-i">
                    <div class="os-toggler-pill"></div>
                  </div>
                </div>
                <span>Dark </span><span>Colors</span>
              </div>
              <!--------------------
              END - Color Scheme Toggler
              --------------------><!--------------------
              START - Demo Customizer
              -------------------->
              <div class="floated-customizer-btn third-floated-btn">
                <div class="icon-w">
                  <i class="os-icon os-icon-ui-46"></i>
                </div>
                <span>Customizer</span>
              </div>
              <div class="floated-customizer-panel">
                <div class="fcp-content">
                  <div class="close-customizer-btn">
                    <i class="os-icon os-icon-x"></i>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Menu Settings
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Menu Position</label><select class="menu-position-selector">
                          <option value="left">
                            Left
                          </option>
                          <option value="right">
                            Right
                          </option>
                          <option value="top">
                            Top
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Menu Style</label><select class="menu-layout-selector">
                          <option value="compact">
                            Compact
                          </option>
                          <option value="full">
                            Full
                          </option>
                          <option value="mini">
                            Mini
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field with-image-selector-w">
                        <label for="">With Image</label><select class="with-image-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Menu Color</label>
                        <div class="fcp-colors menu-color-selector">
                          <div class="color-selector menu-color-selector color-bright selected"></div>
                          <div class="color-selector menu-color-selector color-dark"></div>
                          <div class="color-selector menu-color-selector color-light"></div>
                          <div class="color-selector menu-color-selector color-transparent"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Sub Menu
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                          <option value="flyout">
                            Flyout
                          </option>
                          <option value="inside">
                            Inside/Click
                          </option>
                          <option value="over">
                            Over
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Sub Menu Color</label>
                        <div class="fcp-colors">
                          <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                          <div class="color-selector sub-menu-color-selector color-dark"></div>
                          <div class="color-selector sub-menu-color-selector color-light"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="fcp-group">
                    <div class="fcp-group-header">
                      Other Settings
                    </div>
                    <div class="fcp-group-contents">
                      <div class="fcp-field">
                        <label for="">Full Screen?</label><select class="full-screen-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                          <option value="yes">
                            Yes
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                      <div class="fcp-field">
                        <label for="">Top Bar Color</label>
                        <div class="fcp-colors">
                          <div class="color-selector top-bar-color-selector color-bright selected"></div>
                          <div class="color-selector top-bar-color-selector color-dark"></div>
                          <div class="color-selector top-bar-color-selector color-light"></div>
                          <div class="color-selector top-bar-color-selector color-transparent"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Demo Customizer
              --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
              <div class="floated-chat-btn">
                <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
              </div>
              <div class="floated-chat-w">
                <div class="floated-chat-i">
                  <div class="chat-close">
                    <i class="os-icon os-icon-close"></i>
                  </div>
                  <div class="chat-head">
                    <div class="user-w with-status status-green">
                      <div class="user-avatar-w">
                        <div class="user-avatar">
                          <img alt="" src="img/avatar1.jpg">
                        </div>
                      </div>
                      <div class="user-name">
                        <h6 class="user-title">
                          John Mayers
                        </h6>
                        <div class="user-role">
                          Account Manager
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="chat-messages">
                    <div class="message">
                      <div class="message-content">
                        Hi, how can I help you?
                      </div>
                    </div>
                    <div class="date-break">
                      Mon 10:20am
                    </div>
                    <div class="message">
                      <div class="message-content">
                        Hi, my name is Mike, I will be happy to assist you
                      </div>
                    </div>
                    <div class="message self">
                      <div class="message-content">
                        Hi, I tried ordering this product and it keeps showing me error code.
                      </div>
                    </div>
                  </div>
                  <div class="chat-controls">
                    <input class="message-input" placeholder="Type your message here..." type="text">
                    <div class="chat-extra">
                      <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <!--------------------
              END - Chat Popup Box
              -------------------->
            </div>
            <!--------------------
            START - Sidebar
            -------------------->
            <!--------------------
            END - Sidebar
            -------------------->
            </div>
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
    <script src="{{ asset('public/dist/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/moment/moment.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap-validator/dist/validator.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/dropzone/dist/dropzone.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/editable-table/mindmup-editabletable.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/util.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/alert.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/button.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/carousel.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/collapse.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/dropdown.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/modal.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/tab.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/tooltip.js') }}"></script>
    <script src="{{ asset('public/dist/bower_components/bootstrap/js/dist/popover.js') }}"></script>
    <script src="{{ asset('public/dist/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/demo_customizer.js?version=4.5.0') }}"></script>
    <script src="{{ asset('public/dist/js/main.js?version=4.5.0') }}"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-XXXXXXXX-9', 'auto');
      ga('send', 'pageview');
    </script>

    @yield('script')

  </body>
</html>