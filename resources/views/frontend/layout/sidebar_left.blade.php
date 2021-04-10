<!--------------------
START - Mobile Menu
-------------------->
<div class="menu-mobile menu-activated-on-click color-scheme-dark">
  <div class="mm-logo-buttons-w">
    <a class="mm-logo" href="{{URL::to('admin/dashboard')}}">
		<img src="{{asset('public/dist/img/logo.png')}}">
		<span>Clean Admin</span></a>
    <div class="mm-buttons">
      <div class="content-panel-open">
        <div class="os-icon os-icon-grid-circles"></div>
      </div>
      <div class="mobile-menu-trigger">
        <div class="os-icon os-icon-hamburger-menu-1"></div>
      </div>
    </div>
  </div>
  <div class="menu-and-user">
    <div class="logged-user-w">
      <div class="avatar-w">
        <img alt="" src="{{asset('public/dist/img/avatar1.jpg')}}">
      </div>
      <div class="logged-user-info-w">
        <div class="logged-user-name">
			{{Auth::user()->email}}
        </div>
        <div class="logged-user-role">
          Administrator
        </div>
      </div>
    </div>
    <!--------------------
    START - Mobile Menu List
    -------------------->
    <ul class="main-menu">
		<li>
			<a href="{{URL::to('admin/dashboard')}}">
				<div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div>
                <span>Dashboard</span>
			</a>
		</li>
		@if(Auth::user()->user_type == 1)
		<li>
			<a href="{{URL::to('sale/dashboard')}}">
				<div class="icon-w">
                    <div class="os-icon os-icon-layout"></div>
                </div>
                <span>(S&C) Dashboard</span>
			</a>
		</li>
		<li class="has-sub-menu">
			<a href="#">
				<div class="icon-w">
				  <div class="os-icon os-icon-users"></div>
				</div>
				<span>Users</span>
			</a>
			<ul class="sub-menu">
				<li>
				  <a href="{{URL::to('admin/getcustomer')}}">Customer</a>
				</li>
				<li>
				  <a href="{{URL::to('admin/getsale')}}">Sale</a>
				</li>
				<li>
				  <a href="{{URL::to('admin/getinstaller')}}">Installer</a>
				</li>
			</ul>
		</li>
		@endif
		<!--  -->
		@if(Auth::user()->user_type == 1 || Auth::user()->user_type == 2)
		<li>
			<a href="{{URL::to('sale/get-contact')}}">
				<div class="icon-w">
					<div class="os-icon os-icon-layout"></div>
				</div>
				<span>S&C Visit Confirmation</span>
			</a>
		</li>
		<li>
			<a href="{{URL::to('sale/potentials-list')}}">
				<div class="icon-w">
					<div class="os-icon os-icon-layout"></div>
				</div>
				<span>Potentials List</span>
			</a>
		</li>

		<li>
			<a href="{{URL::to('sale/project-list')}}">
				<div class="icon-w">
					<div class="os-icon os-icon-layout"></div>
				</div>
				<span>Project List</span>
			</a>
		</li>
		@endif
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
    <a class="logo" href="{{URL::to('admin/dashboard')}}">
		<div class="logo-element"></div>
		<div class="logo-label">
			Clean Admin
		</div>
    </a>
  </div>
  <div class="logged-user-w avatar-inline">
    <div class="logged-user-i">
      <div class="avatar-w">
        <img alt="" src="{{asset('public/dist/img/avatar1.jpg')}}">
      </div>
      <div class="logged-user-info-w">
        <div class="logged-user-name">
          {{Auth::user()->email}}
        </div>
        <div class="logged-user-role">
          {{Auth::user()->name}}
        </div>
      </div>
      
    </div>
  </div>
  <h1 class="menu-page-header">
    Page Header
  </h1>
  <ul class="main-menu">
    <li class="sub-header">
      <span>Menu</span>
    </li>
    <li class="selected has-sub-menu">
      <a href="{{URL::to('admin/dashboard')}}">
        <div class="icon-w">
          <div class="os-icon os-icon-layout"></div>
        </div>
        <span>Dashboard</span>
      </a>
    </li>
	@if(Auth::user()->user_type == 1)
	<li>
		<a href="{{URL::to('sale/dashboard')}}">
			<div class="icon-w">
				<div class="os-icon os-icon-layout"></div>
			</div>
			<span>(S&C) Dashboard</span>
		</a>
	</li>
	<li class="has-sub-menu">
		<a href="#">
			<div class="icon-w">
			  <div class="os-icon os-icon-users"></div>
			</div>
			<span>Users</span>
		</a>
		<div class="sub-menu-w">
			<div class="sub-menu-header">
			  Users
			</div>
			<div class="sub-menu-icon">
			  <i class="os-icon os-icon-users"></i>
			</div>
			<div class="sub-menu-i">
				<ul class="sub-menu">
					<li>
					  <a href="{{URL::to('admin/getcustomer')}}">Customer</a>
					</li>
					<li>
					  <a href="{{URL::to('admin/getsale')}}">Sale</a>
					</li>
					<li>
					  <a href="{{URL::to('admin/getinstaller')}}">Installer</a>
					</li>
				</ul>
			</div>
	  </div>
	</li>
	@endif
    <!--  -->
	@if(Auth::user()->user_type == 1 || Auth::user()->user_type == 2)
    <li class="selected has-sub-menu">
		<a href="{{URL::to('sale/get-contact')}}">
			<div class="icon-w">
				<div class="os-icon os-icon-layout"></div>
			</div>
			<span>S&C Visit Confirmation</span>
		</a>
    </li>
	<li class="selected has-sub-menu">
		<a href="{{URL::to('sale/potentials-list')}}">
			<div class="icon-w">
				<div class="os-icon os-icon-layout"></div>
			</div>
			<span>Potentials List</span>
		</a>
    </li>

    <li class="selected has-sub-menu">
		<a href="{{URL::to('sale/project-list')}}">
			<div class="icon-w">
				<div class="os-icon os-icon-layout"></div>
			</div>
			<span>Project List</span>
		</a>
    </li>
	@endif
  </ul>  
</div>
<!--------------------
END - Main Menu
-------------------->