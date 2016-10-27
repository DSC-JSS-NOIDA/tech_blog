$(".edit_comment").hide();

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

	$(".comment_edit").click(function(){
		var comment_id = $(this).attr('comment_id');
		$(".edit_comment").hide();
		$(".row,.comment").show();
		$("[comment_id_original="+comment_id+"]").hide();
		$("[comment_id_edit="+comment_id+"]").show();
	});

	$(".comment_update").click(function(){
		var comment_id = $(this).attr('comment_id_edit_button');
		var comment = $("[comment_id_edit_text="+comment_id+"]").val();
		if(!comment)
			alert("Seems an empty comment");
		else
		{
			//ajax
			$.ajax({
				type: 'POST',
				url: '/update_comment',
				headers: {
	       			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		},
	    		data: {
	    			'user_id':user_id,
	    			'comment_id':comment_id,
	    			'comment':comment
	    		},
	    		success: function(data){
	    			console.log(data);
	    		}
			});
		}
	});

	//ajax to check for new likes and new comments
});