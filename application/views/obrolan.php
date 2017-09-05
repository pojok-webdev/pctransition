<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<!--[if gt IE 8]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<![endif]-->
	<title>PadiApp Chat</title>
	<link rel="icon" type="image/ico" href="favicon.ico"/>
	<link href="<?php echo base_url()?>css/aquarius/stylesheets.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 8]>
		<link href="<?php echo base_url()?>css/aquarius/css/ie7.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link rel='stylesheet' type='text/css' href='<?php echo base_url()?>css/aquarius/fullcalendar.print.css' media='print' />
	<script type='text/javascript' src='<?php echo base_url()?>js/jquery-1.8.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/jquery-ui-1.9.0.custom.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/jquery/jquery.mousewheel.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/bootstrap.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/charts/excanvas.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/charts/jquery.flot.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/charts/jquery.flot.stack.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/charts/jquery.flot.pie.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/charts/jquery.flot.resize.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/sparklines/jquery.sparkline.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/fullcalendar/fullcalendar.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/select2/select2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/uniform/uniform.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/animatedprogressbar/animated_progressbar.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/cleditor/jquery.cleditor.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/dataTables/jquery.dataTables.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins/fancybox/jquery.fancybox.pack.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/cookies.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/actions.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/charts.js'></script>
	<script type='text/javascript' src='<?php echo base_url()?>js/aquarius/plugins.js'></script>
</head>
<body>
	<div class="header">
		<a class="logo" href="index.html"><img src="img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
		<ul class="header_menu">
			<li class="list_icon"><a href="#">&nbsp;</a></li>
		</ul>
	</div>
	<?php $this->load->view('adm/menu');?>
	<div class="content">
		<div class="breadLine">
			<ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
				<li class="active">Chat</li>
			</ul>
			<ul class="buttons">
				<li>
					<a href="#"  id="link_bcPopupList"><span class="icon-user"></span><span class="text" id="unreadmessageslabel">Notifikasi</span></a>
					<div id="bcPopupList" class="popup">
						<div class="head clearfix">
							<div class="arrow"></div>
							<span class="isw-users"></span>
							<span class="name">Pesan belum terbaca</span>
						</div>
						<div class="body-fluid users unreadmessages">
							<div class="item clearfix">
								<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/amir.jpg" width="32"/></a></div>
								<div class="info">
									<a href="#" class="name">Aqvatarius</a>
									<span>online</span>
								</div>
							</div>
						</div>
						<div class="footer">
							<button class="btn btn-danger link_bcPopupList" type="button">Close</button>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="workplace">
			<input type="hidden" id="userid" value="<?php echo $this->session->userdata("user_id")?>" />
			<input type="hidden" id="username" value="<?php echo $this->session->userdata("username")?>" />
			<input type="hidden" id="redirectsender" value="<?php echo $redirectsender;?>" />
			<input type="hidden" id="redirectsendername" value="<?php echo $redirectsendername;?>" />
            			<div class="row-fluid">
				<div class="span4">
					<!--anyar-->
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Accordion</h1>
                    </div>
                    <div class="block-fluid accordionx" id="useraccordion">
                        
                        <h3>Sales</h3>
                        <div>
					<div class="block messages chatusers">
					<?php foreach($users->where("group_id",3)->get() as $user){?>
						<div class="item clearfix chatuser" userid="<?php echo $user->id;?>">
							<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg" width=32 height=32 class="img-polaroid"/></a></div>
							<div class="info">
								<a class="name"><?php echo $user->username;?></a>
								<p>Hi there ! I'm using PadiApp.</p>
								<span></span>
							</div>
						</div>
					<?php }?>
					</div>
                        </div>
                        
                        <h3>TS</h3>
                        <div>
					<div class="block messages chatusers">
					<?php foreach($users->where("group_id",4)->get() as $user){?>
						<div class="item clearfix chatuser" userid="<?php echo $user->id;?>">
							<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg" width=32 height=32 class="img-polaroid"/></a></div>
							<div class="info">
								<a class="name"><?php echo $user->username;?></a>
								<p>Hi there ! I'm using PadiApp.</p>
								<span></span>
							</div>
						</div>
					<?php }?>
					</div>
                        </div>
                        
                        <h3>Lainnya</h3>
                        <div>
					<div class="block messages chatusers">
					<?php foreach($users->where("group_id",2)->get() as $user){?>
						<div class="item clearfix chatuser" userid="<?php echo $user->id;?>">
							<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg" width=32 height=32 class="img-polaroid"/></a></div>
							<div class="info">
								<a class="name"><?php echo $user->username;?></a>
								<p>Hi there ! I'm using PadiApp.</p>
								<span></span>
							</div>
						</div>
					<?php }?>
					</div>
                        </div>
                        
                        <h3>Admin</h3>
                        <div>
					<div class="block messages chatusers">
					<?php foreach($users->where("group_id",1)->get() as $user){?>
						<div class="item clearfix chatuser" userid="<?php echo $user->id;?>">
							<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/<?php echo strtolower($user->username);?>.jpg" width=32 height=32 class="img-polaroid"/></a></div>
							<div class="info">
								<a class="name"><?php echo $user->username;?></a>
								<p>Hi there ! I'm using PadiApp.</p>
								<span></span>
							</div>
						</div>
					<?php }?>
					</div>
                        </div>                        
                        
                    </div>
					<!--anyar-->
				</div>
				<div class="span8">
					<div class="headInfo">
						<div class="input-append">
							<input type="text" name="text" placeholder="your message..." id="widgetInputMessage"/><button class="btn" type="button" id="btnsend">Send</button>
						</div>
						<div class="arrow_down"></div>
					</div>
					<div class="block messaging scrollBox">
						<div class="scroll" style="height: 320px;" id="messages">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/links"></script>
<script type="text/javascript">
	(function($){
		var last_id;
		last_id=0;
		getmessage = function(lastid,preceiver){
			console.log("Last ID from param "+lastid);
			var receiverid,receivername,hasSelected=false;
			$(".chatusers .chatuser").each(function(){
				if($(this).hasClass("selected")){
					receiverid=$(this).attr("userid");
					receivername=$(this).find(".name").html();
					hasSelected=true;
				}
			});
			if(preceiver===receiverid){
				$.ajax({
					url:thisdomain+"chats/getmessages",
					data:{lastid:lastid,sender:$("#userid").val(),receiver:$(".chatusers .chatuser.selected").attr("userid")},
					type:"post",
					dataType:"json",
					async:false
				}).done(function(data){
					if(data.x.length>0){
						arrlength=data.x.length-1;
						lastid=data.x[arrlength].id;
						$.each(data.x,function(x,y){
							if(y.senderid===$("#userid").val()){
								$("#messages #mCSB_1 .mCSB_container").prepend('<div class="itemOut"><a class="image" href="#"><img class="img-polaroid" width="50" height="50" src="https://teknis/media/users/'+$("#username").val()+'.jpg"></a><div class="text"><div class="info clearfix"><span class="name">'+$("#username").val()+'</span><span class="date">'+y.createdate+'</span></div>'+y.content+'</div></div></div>');
							}
							if(y.senderid!==$("#userid").val()){
								$("#messages #mCSB_1 .mCSB_container").prepend('<div class="itemIn"><a class="image" href="#"><img class="img-polaroid" width="50" height="50" src="https://teknis/media/users/'+y.sendername+'.jpg"></a><div class="text"><div class="info clearfix"><span class="name">'+y.sendername+'</span><span class="date">'+y.createdate+'</span></div>'+y.content+'</div></div></div>');
								$.ajax({
									url:thisdomain+"chats/setread",
									data:{id:y.id},
									type:"post"
								}).fail(function(){
									console.log("cant set read");
								}).done(function(data){
									console.log("set read successfull "+data);
								});
							}
						});
						$("#messages").mCustomScrollbar("update");
					}
					if(data.notify.length>0){
						//$("#unreadmessageslabel").css("background-color","red");
					}
					if(data.notify.length===0){
						//$("#unreadmessageslabel").css("background-color","transparent");
					}
					setTimeout(function(){
						getmessage(lastid,preceiver);
					},3000);
				}).fail(function(){
					console.log("Fail get messages");
				});
			}
		}
		setInterval(function(){
			$.ajax({
				url:thisdomain+"chats/getunreadmessages",
				data:{receiver:$("#userid").val()},
				type:"post",
				dataType:"json"
			}).done(function(data){
				console.log(data);
				if(data.notify.length>0){
					$("#unreadmessageslabel").css("background-color","red");
				}else{
					$("#unreadmessageslabel").css("background-color","transparent");
				}
			});
		},3000);
		$("#btnsend").click(function(){
			var receiverid,receivername,hasSelected=false;
			$(".chatusers .chatuser").each(function(){
				if($(this).hasClass("selected")){
					receiverid=$(this).attr("userid");
					receivername=$(this).find(".name").html();
					hasSelected=true;
				}
			});
			if(!hasSelected){
				alert("Harus memilih chat dg siapa");
			}else{
				$.ajax({
					url:thisdomain+"chats/writemessage",
					data:{sender:$("#userid").val(),sendername:$("#username").val(),receiver:receiverid,receivername:$(".chatusers .chatuser.selected .name").html(),content:$("#widgetInputMessage").val()},
					type:"post"
				}).done(function(chatid){
					$("#widgetInputMessage").val("");
					console.log("Penyimpanan berhasil");
				}).fail(function(){
					console.log("Tidak dapat menyimpan pesan");
				});
			}
		});
		$(".chatuser").click(function(){
			var thiselement=$(this);
			$(".chatusers .chatuser").each(function(){
				$(this).removeClass("selected");
				$(this).css("background-color","white");
			});
			thiselement.addClass("selected");
			thiselement.css("background-color","azure");
			$("#messages #mCSB_1 .mCSB_container").empty();
			getmessage(0,thiselement.attr("userid"));
		});
		$("#widgetInputMessage").keyup(function(event){
			if(event.which===13){
				$("#btnsend").click();
			}
		});
		$("#link_bcPopupList").click(function(){
			if($("#bcPopupList").is(":visible")){
				$("#bcPopupList").fadeOut(200);
			}else{
				$("#bcPopupList").fadeIn(300);
				$(".unreadmessages").empty();
				$.ajax({
					url:thisdomain+"chats/getunreadmessages",
					data:{receiver:$("#userid").val()},
					type:"post",
					dataType:"json"
				}).done(function(data){
					$.each(data.notify,function(x,y){
						$(".unreadmessages").append('<div class="item clearfix unreaduser" userid='+y.sender+'><div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/amir.jpg" width="32"/></a></div><div class="info"><a href="#" class="name">'+y.name+'</a><span>online</span></div></div>');
						$(".unreaduser").click(function(){
							console.log("retrieve data ..."+y.sender);
							var thiselement=$(this);
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
						});
					});
				});
			}
			return false;
		});
		$("#useraccordion").accordion({
			autoHeight:false
		});
		console.log("redirect sender"+$("#redirectsender").val());
		if($("#redirectsender").val()!==""){
			$(".chatusers .chatuser").each(function(){
				console.log("userid" + $(this).attr("userid") + " , senderid " + $("#redirectsender").val());
				if($(this).attr("userid")===$("#redirectsender").val()){
					$(this).click();
				}
			});
		}
	}(jQuery))
</script>
</body>
</html>
