	@extends('layouts.app')

@section('js')
	<meta property="og:url"           content="http://localhost:8000/post/{{$post['id']}}" />
    <link rel="stylesheet" href="http://localhost/tech_blog/resources/assets/css/post.css">
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
		<div id="like" class="col-xs-3 col-md-2 col-lg-2">
			<div class="fb-like" 
				data-href="http://techblog.pagekite.me/post/{{$post['id']}}" 
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

@section('script')
    <script type="text/javascript" src="http://localhost/tech_blog/resources/assets/js/post.js"></script>
@endsection