@extends('layouts.app')

@section('js')
    <script src="http://localhost/tech_blog/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
	<div id="active">
		HEllo
		<form>
			<textarea class="ckeditor" name="content"></textarea>
		</form>
	</div>
	<div id="inactive">
		THE EVENT IS OVER
	</div>
@endsection

@section('script')
    <script type="text/javascript" src="http://localhost/tech_blog/resources/assets/js/editor.js"></script>
@endsection