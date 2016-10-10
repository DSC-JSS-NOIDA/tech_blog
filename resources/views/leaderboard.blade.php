@extends('layouts.app')

@section('content')
<?php
	$ch = curl_init();
	$url= 'https://facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.google.com';
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	var_dump($data);
?>
@endsection