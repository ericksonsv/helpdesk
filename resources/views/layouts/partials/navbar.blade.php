<nav class="custom-navbar navbar-dark bg-dark">
	<div class="container">
		<div class="nav-separator">
			<a href="{{ route('pages.all-tasks') }}" class="custom-navbar-brand mr-4">
				<i class="fas fa-headset mr-2"></i><span>{{ config('app.name') }}</span>
			</a>
			<a class="custom-nav-link mx-2" href="{{ route('pages.all-tasks') }}"><i class="fas fa-tasks mr-2"></i><span class="d-none d-md-inline-block">{{ __('Tasks') }}</span></a>
			<a class="custom-nav-link mx-2" href="{{ route('pages.directory') }}"><i class="fas fa-address-card mr-2"></i><span class="d-none d-md-inline-block">{{ __('Directory') }}</span></a>
			<a class="custom-nav-link mx-2" href="{{ route('pages.signatures') }}"><i class="fas fa-address-card mr-2"></i><span class="d-none d-md-inline-block">{{ __('Signatures') }}</span></a>
		</div>
		<div class="nav-separator">
			@guest
				<a class="custom-nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt mr-2"></i><span>{{ __('Login') }}</span></a>
			@else
				<span class="custom-nav-text mr-3"><i class="fas fa-user-circle mr-2"></i><span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span></span>
				<a class="custom-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="fas fa-sign-out-alt mr-2"></i><span class="d-none d-md-inline-block">{{ __('Logout') }}</span>
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
			@endguest
		</div>
	</div>
</nav>

@auth
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto w-100 justify-content-center">
		    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt mr-2"></i><span>{{ __('Dashboard') }}</span></a></li>
		    <li class="nav-item"><a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-store mr-2"></i><span>{{ __('Companies') }}</span></a></li>
		    <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}"><i class="fas fa-archive mr-2"></i><span>{{ __('Departments') }}</span></a></li>
		    <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}"><i class="fas fa-users mr-2"></i><span>{{ __('Employees') }}</span></a></li>
		    <li class="nav-item"><a class="nav-link" href="{{ route('tasks.index') }}"><i class="fas fa-tasks mr-2"></i><span>{{ __('Tasks') }}</span></a></li>
		    <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-clipboard-list mr-2"></i><span>{{ __('Inventary') }}</span></a></li>
		    <li class="nav-item"><a class="nav-link" href="{{ route('tasks.index') }}"><i class="fas fa-database mr-2"></i><span>{{ __('Seeders') }}</span></a></li>
		  </ul>
		</div>
	</div>
</nav>
@endauth