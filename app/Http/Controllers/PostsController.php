<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\post;
use App\like;

class PostsController extends Controller
{
	public function update(Request $request)
	{
		$user = \Auth::user();
		$author = $user->email;
		$post = post::where('author',$author);
		$data = $request->only('title','content');
		$post -> update($data);
		return redirect('home/editor');
	}

	public function allpost()
	{
		$posts = post::get();
		$posts = $posts->toArray();
		// var_dump($posts[0]['title']);
		return view('welcome',compact('posts'));
	}

	public function showpost($id)
	{
		// echo $id;
		$user_id=1;
		$post = post::find($id);
		$post = $post->toArray();
		$like = like::get()->where('post_id',$id)->count();
		$my_like = like::where([
					['post_id','=',$id],
					['user_id','=',$user_id]
				])->get();
		$my_like = $my_like->toArray();
		//var_dump($my_like);
		//echo $my_like;
		//  if(empty($my_like))
		//  	echo "null";
		//echo $like;
		// var_dump($post);
		return view('post',compact('post','like','my_like','user_id','id'));
	}

	public function like($data)
	{
		json_decode($request);
		var_dump($request);
		// var_dump($request);
		//return "Hello";
	}
}
