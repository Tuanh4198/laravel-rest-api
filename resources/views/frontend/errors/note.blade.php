@if(Session::has('error'))
	<p class="text text-danger text-center">{{Session::get('error')}}</p>
@endif