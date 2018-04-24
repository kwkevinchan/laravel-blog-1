<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;

class BlogController extends Controller
{
	//前後台使用，抓取資料
    public function index()
    {
    	$blogs = Blog::latest()->get();
    	//dd($blogs);
    	// $blogs = $blogs->reverse();
    	return view('blog.blog', [
    		'blogs' => $blogs
    	]);
    }
    //前台文章分類
    public function index_news()
    {
        $blogs = Blog::where('blog_type', '=', '新聞')->get();
    	$blogs = $blogs->reverse();
    	return view('blog.blog', [
    		'blogs' => $blogs
    	]);
    }
    public function index_games()
    {
        $blogs = Blog::where('blog_type', '=', '遊戲')->get();
    	$blogs = $blogs->reverse();
    	return view('blog.blog', [
    		'blogs' => $blogs
    	]);
    }
    public function index_anime()
    {
        $blogs = Blog::where('blog_type', '=', '動畫')->get();
    	$blogs = $blogs->reverse();
    	return view('blog.blog', [
    		'blogs' => $blogs
    	]);
    }
    //存入新增部落格，並導回後台
    public function blog_create(Request $request)
    {
    	$blog = Blog::create($request->all());
		return redirect('blog_back');
    }
    //刪除資料，並導回後台
    public function blog_delete(Request $request, Blog $blog)
    {
		$blog->delete();
		return redirect('blog_back');
    }
    //導向後台，並列出資料
    public function index_back()
    {
        $user_id = Auth::user()->name;
        $blogs = Blog::where('user_id', '=', $user_id)->get();
    	return view('blog.blog_back', [
    		'blogs' => $blogs
    	]);
    }
    //登入頁面導向
    public function blog_login()
    {
        return view('blog.blog_login');
    }
    //導向建立帳號頁面
    public function blog_register()
    {
        return view('blog.blog_register');
    }
    //REST架構
    public function show($id)
    {
        return $id;
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blog.blog_edit', [
            'blog' => $blog
        ]);
    }
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id)->update($request->all());
		return redirect('blog_back');

    }

}
