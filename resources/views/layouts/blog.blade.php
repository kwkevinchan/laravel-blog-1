<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>BLOG</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
	<header class="header"><h1 style="text-align: center;">BLOG</h1></header>
	<nav class="navbar navbar-expand-md navbar-light" style="background-color: #7986CB ;">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse flex-row" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="/">前台</a>
				</li>
				@auth
				<li class="nav-item">
					<a class="nav-link" href="blog_back">後台</a>
				</li>
				@endauth
			</ul>
		</div>
		<!--登入控制-->
		<div class="flex-row-reverse">
			<ul class="navbar-nav">
				<li class="nav-item" style="padding:10px">
					登入系統
				</li>

				<li class="nav-item">
				@if (Route::has('login'))
                    @auth
					<li class="nav-item"  style="padding:10px">
						使用者:{{Auth::user()->name}}
					</li>
					<li class="nav-item">
						<a class="nav-link" href=""
							onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
							登出
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
                    @else
					<li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">登入</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">註冊</a>
					</li>
                    @endauth
            	@endif
			</ul>
		</div>
	</nav>

    <!-- 導入內容 -->
    <div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		@yield('content')
	</div>    
    </div>
	<script scr="{{asset('js/jquery.min.js')}}"></script>
	<script scr="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>	