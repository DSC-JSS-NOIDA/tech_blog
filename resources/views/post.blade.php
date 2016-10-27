@extends('layouts.app')

@section('js')
	<meta property="og:url"           content="http://localhost:8000/post/{{$post['id']}}" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/post.css')}}">
@endsection

@section('content')
<div class="container">
<!-- **********************************CHANGE STRUCTURE FOR DISPLAYING AUTHOR DETAILS******************* -->
	<div class="row header">
		<img class ="img-circle" src="{{ $hash }}" id="author_image" alt="{{ $post['author'] }}">
		<!-- ID: {{ $post['id'] }}<br> -->
		<div id="title" class="col-xs-8">
			{{ $post['title'] }} 
		</div>
<!--
 		<div id="author" class="col-xs-9 col-md-4 col-lg-4">
			&nbsp; by {{ $post['author'] }}
		</div>
-->
 	</div>
	<div class="row content">
		{!! $post['content'] !!}
	</div>
	<div class="row comment">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6">
					@if(empty($comments))
						<div class="row comment_row">
							Be the first to Review
						</div>
					@else
						@foreach($comments as $comment)
							<div class="row comment_row">
								<div class="row">
									<div class="user_id">
										{{$comment["name"]}}
										<?php $comment_auth = md5(strtolower(trim($comment['email'])));
										$comment_auth = "https://www.gravatar.com/avatar/".$comment_auth."?d=retro"."&s=80"."&r=pg"; ?>
										<img class= "img-rounded" height=18px src="{{ $comment_auth }}">
										@if($user_email==$comment['email'])
											<span class="comment_edit" id="comment_edit" comment_id="{{$comment['id']}}">
												Edit
											</span>
										@endif
									</div>
									<div class="created_at">
										{{$comment["created_at"]}}
									</div>
								</div>
								<hr>
								<div class="row comment" id="comment" comment_id_original="{{$comment['id']}}">
									{{$comment["comment"]}}
								</div>
								<div class="edit_comment" comment_id_edit="{{$comment['id']}}">
									<!-- <form action="/update_comment" method="POST"> -->
										<input type="text"  placeholder="{{$comment['comment']}}" comment_id_edit_text="{{$comment['id']}}" id="edit_comment_text" />
										<input type="submit" name="submit" class="comment_update" comment_id_edit_button="{{$comment['id']}}" class="btn" value="Edit" />
									<!-- </form> -->
								</div>
							</div>
						@endforeach
					@endif
				</div>
				<div class="col-xs-12 col-md-6">
					@if($user_id==0)
						<div class="row comment_row">
							Login to participate in discussion
						</div>
					@else
						<div class="row comment_row">
							<!-- <form> -->
								<div class="col-xs-8" id="comment_text_box">
									<input type="text" placeholder="Comment " id="comment_text"  />
								</div>
								<div class="col-xs-4" id="comment_submit_box">
									<input type="submit" name="submit" id="comment_submit" class="btn" value="COMMENT"/>
								</div>
							<!-- </form> -->
						</div>	
					@endif
				</div>
			</div>
		</div>
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