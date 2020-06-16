<!doctype html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '掲示板もどき') }}</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="css/vendor/bootstrap.min.css" rel="stylesheet">
	<link href="css/flat-ui.css" rel="stylesheet">
	<link href="css/docs.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

	<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-expand-lg" role="navigation">
			<a class="navbar-brand" href="top">掲示板もどき</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01"></button>
			<div class="collapse navbar-collapse" id="navbar-collapse-01">
				<form class="navbar-form form-inline my-2 my-lg-0" method="get" action="top" role="search">
					<div class="form-group">
						<div class="input-group">
							<input class="form-control" id="navbarInput-01" name ="search_word" type="search" placeholder="Search">
							<span class="input-group-btn">
								<button type="submit" class="btn"><span class="fui-search"></span></button>
							</span>
						</div>
					</div>
				</form>
			</div>
			@if (Route::has('login'))
				<div style="display:inline-flex; float:right;">
					@auth
						<div class="btn-group">
						<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()->name}}</button>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
								</li>
							</ul>
						</div>
					@else
						<button onclick="location.href='login'" class="btn btn-default navbar-btn" type="button">Sign In</button>
						@if (Route::has('register'))
							<button onclick="location.href='register'"  class="btn btn-default navbar-btn" type="button">Sign On</button>
						@endif
					@endauth
				</div>
			@endif
		</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
