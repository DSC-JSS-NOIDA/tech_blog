$(document).ready(function(){
	$("#heart_active").click(function(){
		// console.log(post_id);
		// console.log(user_id);
		$url= '/like/'+ post_id +'/'+ user_id;
		$.ajax({
			type: 'GET',
			url: $url,
			data: '',
			success: function(data){
				$(".count").html(data);
			}
		});
	});

	$("#heart_login").click(function(){
		alert("Please Login");
	});
});