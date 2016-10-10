@extends('layouts.app')

@section('content')
<?php
	$ch = curl_init();
	$url= 'https://facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.google.com';
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	
	// Browser Agent Added
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.52 Safari/537.17');
    	curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	
	$data = curl_exec($ch);
	curl_close($ch);
	var_dump($data);
?>
@endsection
