
<div class="top-bar color-scheme-transparent">
	<!--------------------
	START - Top Menu Controls
	-------------------->
	<div class="top-menu-controls">
		<div class="logged-user-w">
			<div class="logged-user-i">
				<div class="avatar-w">
					<img alt="" src="{{asset('public/dist/img/avatar1.jpg')}}">
				</div>
				<div class="logged-user-menu color-style-bright">
					<div class="logged-user-avatar-info">
					  <div class="avatar-w">
						<img alt="" src="{{asset('public/dist/img/avatar1.jpg')}}">
					  </div>
					  <div class="logged-user-info-w">
						<div class="logged-user-name">
							{{Auth::user()->name}}
						</div>
					  </div>
					</div>
					<div class="bg-icon">
						<i class="os-icon os-icon-wallet-loaded"></i>
					</div>
					<ul>
						<li>
							<a href="{{URL::to('/logout')}}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
						</li>
					</ul>
				</div> 
			</div>
		</div>
	</div>
</div>