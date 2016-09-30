@extends('layouts.app')

@section('js')
    <link rel="stylesheet" href="http://localhost/tech_blog/resources/assets/css/dashboard.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        @if(\Auth::user()->admin==1)
            <a href="admin" class="btn">VISIT ADMIN PANEL</a>
        @<?php else: ?>
            <div id="active">
                <a href="home/editor" class="btn">
                    <img class="image" src="http://localhost/tech_blog/resources/assets/img/eventstart.png">
                </a>
            </div>
            <div id="inactive">
                <a class="btn">
                    <img class="image" src="http://localhost/tech_blog/resources/assets/img/waiting.png">
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" src="http://localhost/tech_blog/resources/assets/js/user.js"></script>
@endsection