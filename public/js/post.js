$(document).ready(function(){
	$("#heart_active").click(function(){
		console.log(post_id);
		console.log(user_id);
		$.ajax({
			type: 'GET',
			url: '/like',
			data: {
					'user_id':user_id,
					'post_id':post_id
				},
			success: function(data){
				console.log(data);
			}
		});
	});
});