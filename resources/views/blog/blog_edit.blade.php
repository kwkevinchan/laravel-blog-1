@extends('layouts.blog')

@section('content')
    <form class="form-group" action="/blogs/{{ $blog->id }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT')}}

        <div class="form-group row">
            <label for="static_username" class="col-sm-3 col-form-label">標題</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="blog_title"  id="static_username" value="{{ $blog-> blog_title}}" required>
            </div>
        </div>


        @if( $blog->blog_type === "新聞")
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="新聞" checked>
                <label class="form-check-label" for="exampleRadios1">
                    新聞
                </label>
            </div>
        @else
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="新聞">
                <label class="form-check-label" for="exampleRadios1">
                    新聞
                </label>
            </div>
        @endif

        @if( $blog->blog_type === "遊戲")
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="遊戲" checked>
                <label class="form-check-label" for="exampleRadios1">
                    遊戲
                </label>
            </div>
        @else
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="遊戲">
                <label class="form-check-label" for="exampleRadios1">
                    遊戲
                </label>
            </div>
        @endif
        @if( $blog->blog_type === "動畫")
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="動畫" checked>
                <label class="form-check-label" for="exampleRadios1">
                    動畫
                </label>
            </div>
        @else
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="blog_type" id="exampleRadios1" value="動畫" >
                <label class="form-check-label" for="exampleRadios1">
                    動畫
                </label>
            </div>
        @endif

        <input type="hidden" name="user_id" value="{{$blog-> user_id}}">

        <div class="form-group">
            <label for="exampleFormControlTextarea1">內文</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="blog_content">{{$blog->blog_content}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">修改</button>
    </form>
@endsection