<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Event;
use App\post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data= \App\Event::
                where('id','1')
                ->select(array('status'))
                ->get();
            $data= $data->toArray();
            $data= $data["0"];
            $data= $data["status"];
            return view('home',compact('data'));
    }

    public function admin()
    {
        if(\Auth::user()->admin==1)
        {
            $data= \App\Event::
                where('id','1')
                ->select(array('status'))
                ->get();
            $data= $data->toArray();
            $data= $data["0"];
            $data= $data["status"];
            return view('admin',compact('data'));
        }
        else
            abort(404);
    }

    public function start()
    {
        \App\Event::
            where('id', 1)
            ->update(['status' => 1]);
        return redirect('/admin');
    }

    public function stop()
    {
        \App\Event::
            where('id', 1)
            ->update(['status' => 0]);
        return redirect('/admin');
    }

    public function user()
    {
        $data= \App\Event::
            where('id','1')
            ->select(array('status'))
            ->get();
        $data= $data->toArray();
        $data= $data["0"];
        $data= $data["status"];
        return $data;
    }

    public function editor()
    {
        if(\Auth::user()->admin==1)
            return redirect('/admin');
        else
        {
            $user = \Auth::user();
            $author = $user->email;
            $post = post::where('author',$author);
            $data = $post->get();
            $data = $data->toArray();
            $data = $data["0"];
            return view('editor',compact('data'));
        }
    }

}
