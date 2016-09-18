<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Event;

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
        return view('home');
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
}
