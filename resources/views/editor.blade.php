@extends('layouts.app')

@section('js')
    <script src="http://localhost/tech_blog/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

	<div id="active">
		<form action="update" method="post">
			<label>Title</label>
			<input type="text" value="{{ $data['title']  }}" name="title" required="" />
			<textarea class="ckeditor" value="{{ $data['content']  }}" name="content" required="" />{{ $data['content']  }}</textarea>
			<input type="submit" name="submit" class="btn" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
	<div id="inactive">
		THE EVENT IS OVER
	</div>
@endsection

@section('script')
    <script type="text/javascript" src="http://localhost/tech_blog/resources/assets/js/editor.js"></script>
@endsection