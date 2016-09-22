@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                @if(\Auth::user()->admin==1)
                    <a href="admin" class="btn">VISIT ADMIN PANEL</a>
                @<?php else: ?>
                    <div id="active">
                        <a href="home/editor" class="btn">Start Writing Article</a>
                    </div>
                    <div id="inactive">
                        Waiting for the event to start ...
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" src="http://localhost/tech_blog/resources/assets/js/user.js"></script>
@endsection