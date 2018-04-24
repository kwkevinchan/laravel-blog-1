@extends('layouts.blog')

@section('content')
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

				<form action="blog/{{ $blog-> id }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE')}}
					<button type="submit" class="btn btn-primary">刪除</button>
					<a class="btn btn-primary" href="blogs/{{ $blog-> id }}/edit">修改</a>
				</form>

				<hr />
		@endforeach

		<form class="form-group" action="/blog" method="post">
        	{{ csrf_field() }}
			<div class="form-group row">
				<label for="static_username" class="col-sm-3 col-form-label">標題</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="blog_title"  id="static_username" required>
				</div>
			</div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="新聞" checked>
                <label class="form-check-label" for="exampleRadios1">
                    新聞
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="遊戲">
                <label class="form-check-label" for="exampleRadios1">
                    遊戲
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="動畫" >
                <label class="form-check-label" for="exampleRadios1">
                    動畫
                </label>
            </div>


			<input type="hidden" name="user_id" value="{{Auth::user()->name}}">

			<div class="form-group">
				<label for="exampleFormControlTextarea1">內文</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="blog_content"></textarea>
			</div>

			<button type="submit" class="btn btn-primary">新增</button>

		</form>
@endsection