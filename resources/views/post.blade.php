@extends('layouts.app')

@section('js')
	<meta property="og:url"           content="http://localhost:8000/post/{{$post['id']}}" />
    <link rel="stylesheet" href="http://localhost/tech_blog/resources/assets/css/post.css">
@endsection

@section('content')
<div class="container">
	<div class="row header">
		<!-- ID: {{ $post['id'] }}<br> -->
		<div class="title">
			{{ $post['title'] }} 
		</div>
		<div class="author">
			&nbsp; by {{ $post['author'] }}
		</div>
		<span style="visibility: hidden;">
			{{ $id=$post['id'] }}
		</span>
		<div class="like">
			<div class="fb-like" 
				data-href="http://techblog.pagekite.me/post/{{$id}}" 
				data-layout="button_count" 
				data-action="like" 
				data-show-faces="true">
			</div>
		</div>
	</div>
	<div class="row content">
		{!! $post['content'] !!}
	</div>
</div>

@endsection