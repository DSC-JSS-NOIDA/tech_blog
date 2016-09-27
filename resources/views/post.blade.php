@extends('layouts.app')

@section('js')
	<meta property="og:url"           content="http://localhost:8000/post/{{$post['id']}}" />
@endsection

@section('content')
ID: {{ $post['id'] }}<br>
Title: {{ $post['title'] }}<br>
Content: {!! $post['content'] !!}
<div style="visibility: hidden;">{{ $id=$post['id'] }}</div>
	<div class="fb-like" 
		data-href="http://techblog.pagekite.me/post/{{$id}}" 
		data-layout="button_count" 
		data-action="like" 
		data-show-faces="true">
	</div>

@endsection