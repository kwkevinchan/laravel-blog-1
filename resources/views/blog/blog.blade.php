@extends('layouts.blog')

@section('content')
		<nav class="navbar navbar-expand-lg navbar-light">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="/">所有文章</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/news">新聞</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/games">遊戲</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/anime">動漫</a>
					</li>
				</ul>
			</div>
		</nav>
		@foreach($blogs as $blog)
				<table class="table">
					<thead>
						<h2>{{ $blog-> blog_title}}</h2>
					</thead>
					<tbody>
						<tr>
						<th scope="row">類型</th>
						<td>{{ $blog-> blog_type}}</td>
						</tr>
						<tr>
						<th scope="row">作者</th>
						<td>{{$blog-> user_id}}</td>
						</tr>
						<tr>
						<th scope="row">時間</th>
						<td>{{$blog-> updated_at}}</td>
						</tr>
					</tbody>
				</table>
				
		<p>{!! nl2br($blog-> blog_content) !!}}</p>

		@endforeach
@endsection