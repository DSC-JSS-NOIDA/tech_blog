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
}
