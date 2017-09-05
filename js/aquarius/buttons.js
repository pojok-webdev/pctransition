(function($){
	$("#btnChangeRole").click(function(){
		window.location.href = thisdomain+"adm/chooseRole";
	});
/*	setInterval(function(){
		console.log("user id : "+$("#loggeduserid").val());
		$.ajax({
			url:thisdomain+"chats/getunreadmessages",
			data:{receiver:$("#loggeduserid").val()},
			type:"post",
			dataType:"json"
		}).done(function(data){
			console.log(data);
			if(data.notify.length>0){
				$("#btnNotification").css("background-color","red");
			}else{
				$("#btnNotification").css("background-color","transparent");
			}
		});
	},3000);*/	
	$("#btnNotification").click(function(){
		if($("#bcPopupList").is(":visible")){
			$("#bcPopupList").fadeOut(200);
		}else{
			$("#bcPopupList").fadeIn(300);
			$(".unreadmessages").empty();
			$.ajax({
				url:thisdomain+"chats/getunreadmessages",
				data:{receiver:$("#loggeduserid").val()},
				type:"post",
				dataType:"json"
			}).done(function(data){
				$.each(data.notify,function(x,y){
					$(".unreadmessages").append('<div class="item clearfix unreaduser" userid='+y.sender+'><div class="image"><a href="#"><img src="'+thisdomain+'media/users/'+y.name.toLowerCase()+'.jpg" width="32"/></a></div><div class="info"><a href="#" class="name">'+y.name+'</a><span>online</span></div></div>');
					$(".unreaduser").click(function(){
						console.log("retrieve data ..."+y.sender);
						window.location.href=thisdomain+"chats";
						
						var actionForm = $('<form>', {'action': thisdomain+'chats', 'method': 'post'}).append($('<input>', {'name': 'sender', 'value': y.sender, 'type': 'hidden'}), $('<input>', {'name': 'sendername', 'value': y.name, 'type': 'hidden'}));
						actionForm.submit();

/*						var thiselement=$(this);
						$(".chatusers .chatuser").each(function(){
							if($(this).attr("userid")===y.sender){
								$(this).addClass("selected");
								$(this).css("background-color","azure");
							}else{
								$(this).removeClass("selected");
								$(this).css("background-color","white");
							}
						});
						$("#messages #mCSB_1 .mCSB_container").empty();
						getmessage(1,thiselement.attr("userid"));
						$("#bcPopupList").fadeOut(200);
						*/
					});
				});
			});
		}
		return false;
	});

}(jQuery))
