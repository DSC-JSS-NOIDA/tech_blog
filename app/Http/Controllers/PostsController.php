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
		$user = \Auth::user();
		if($user)
		{
			$user_id= $user->id;
			$my_like = like::where([
						['post_id','=',$id],
						['user_id','=',$user_id]
					])->get();
			$my_like = $my_like->toArray();
			// echo "U:".$user_id."P:".$id;
		}
		else
			$user_id=0;
		// var_dump($my_like);
		$post = post::find($id);
		$post = $post->toArray();
		$like = like::get()->where('post_id',$id)->count();
		return view('post',compact('post','like','my_like','user_id','id'));
	}

	public function like($post_id,$user_id)
	{
		if(\Auth::user())
		{
			$my_like = like::where([
						['post_id','=',$post_id],
						['user_id','=',$user_id]
					])->get();
			$my_like = $my_like->toArray();
			if(empty($my_like))
			{
				//like
				like::insert(
						['post_id'=>$post_id,'user_id'=>$user_id]
					);
				$like = like::get()->where('post_id',$post_id)->count();
				echo $like;
			}
			else
			{
				//unlike
				like::where([
						['post_id','=',$post_id],
						['user_id','=',$user_id]
					])->delete();
				$like = like::get()->where('post_id',$post_id)->count();
				echo $like;
			}
		}
		else
			return view('auth.login');
	}
}
