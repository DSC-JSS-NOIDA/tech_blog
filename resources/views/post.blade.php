@extends('layouts.app')

@section('js')
	<meta property="og:url"           content="http://localhost:8000/post/{{$post['id']}}" />
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
@endsection

@section('content')
<div class="container">
	<div class="row header">
		<!-- ID: {{ $post['id'] }}<br> -->
		<div id="title" class="col-xs-12 col-md-6 col-lg-6">
			{{ $post['title'] }} 
		</div>
		<div id="author" class="col-xs-9 col-md-4 col-lg-4">
			&nbsp; by {{ $post['author'] }}
		</div>
<!-- 		<div id="like" class="col-xs-3 col-md-2 col-lg-2">
			<div class="fb-like" 
				data-href="http://techblog.pagekite.me/post/{{$post['id']}}" 
				data-layout="button_count" 
				data-action="like" 
				data-show-faces="true">
			</div>
		</div>
 -->
 	</div>
	<div class="row content">
		{!! $post['content'] !!}
	</div>
</div>
<div>
	@if($user_id)
	 	@if(empty($my_like))
	 		<!-- not liked -->
			<img class="heart" id="heart_active" src="{{asset('img/heart_active.png')}}">
			<span class="count">{{$like}}</span>
		@else
			<!-- already liked -->
			<img class="heart" id="heart_active" src="{{asset('img/heart_inactive.png')}}">
			<span class="count">{{$like}}</span>	
		@endif
	@else
		<!-- Not logged in -->
		<img class="heart" id="heart_login" src="{{asset('img/heart_login.png')}}">
		<span class="count">{{$like}}</span>
	@endif
</div>

@endsection

@section('script')
	<script>
		var user_id = {{$user_id}};
		var post_id = {{$id}};
	</script>
    <script type="text/javascript" src="{{asset('js/post.js')}}	"></script>
@endsection