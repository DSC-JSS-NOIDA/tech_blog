@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @foreach ($posts as $post)
                        <a href=post/{{ $post['id'] }}>
                            {{ $post['id'] }}. 
                            {{ $post['title'] }}<br>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
