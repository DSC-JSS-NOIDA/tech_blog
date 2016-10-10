<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\post;

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
		$post = post::find($id);
		$post = $post->toArray();
		// var_dump($post);
		return view('post',compact('post'));
	}

    public function leader()
    {
        return view('leaderboard');
    }

}
