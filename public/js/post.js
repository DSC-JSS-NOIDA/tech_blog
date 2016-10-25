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

	$("#comment_submit").click(function(){
		var comment = $("#comment_text").val();
		if(!comment)
			alert("Seems an empty comment");
		else
		{
			$("#comment_text").val('');
			$.ajax({
				type: 'POST',
				url: '/comment',
				headers: {
	       			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		},
				data: {
					'user_id':user_id,
					'post_id':post_id,
					'comment':comment
				},
				success: function(data){
					console.log(data);
				}
			});
		}
	});
});