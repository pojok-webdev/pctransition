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
				<li><a href="#">Simple Admin</a> <span class="divider">></span></li>
				<li class="active">Widgets</li>
			</ul>

			<ul class="buttons">
				<li>
					<a href="#" class="link_bcPopupList"><span class="icon-user"></span><span class="text">Users list</span></a>

					<div id="bcPopupList" class="popup">
						<div class="head clearfix">
							<div class="arrow"></div>
							<span class="isw-users"></span>
							<span class="name">List users</span>
						</div>
						<div class="body-fluid users">

							<div class="item clearfix">
								<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/amir_s.jpg" width="32"/></a></div>
								<div class="info">
									<a href="#" class="name">amir</a>
									<span>online</span>
								</div>
							</div>

							<div class="item">
								<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/dhani_s.jpg" width="32"/></a></div>
								<div class="info clearfix">
									<a href="#" class="name">dhani</a>
									<span>online</span>
								</div>
							</div>

							<div class="item">
								<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/alexey_s.jpg" width="32"/></a></div>
								<div class="info clearfix">
									<a href="#" class="name">Alexey</a>
									<span>online</span>
								</div>
							</div>

							<div class="item">
								<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/ketut_s.jpg" width="32"/></a></div>
								<div class="info clearfix">
									<a href="#" class="name">ketut</a>
									<span>online</span>
								</div>
							</div>

							<div class="item">
								<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/helen_s.jpg" width="32"/></a></div>
								<div class="info clearfix">
									<a href="#" class="name">Helen</a>
								</div>
							</div>

							<div class="item">
								<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/alexander_s.jpg" width="32"/></a></div>
								<div class="info clearfix">
									<a href="#" class="name">Alexander</a>
								</div>
							</div>

						</div>
						<div class="footer">
							<button class="btn" type="button">Add new</button>
							<button class="btn btn-danger link_bcPopupList" type="button">Close</button>
						</div>
					</div>

				</li>
				<li>
					<a href="#" class="link_bcPopupSearch"><span class="icon-search"></span><span class="text">Search</span></a>

					<div id="bcPopupSearch" class="popup">
						<div class="head clearfix">
							<div class="arrow"></div>
							<span class="isw-zoom"></span>
							<span class="name">Search</span>
						</div>
						<div class="body search">
							<input type="text" placeholder="Some text for search..." name="search"/>
						</div>
						<div class="footer">
							<button class="btn" type="button">Search</button>
							<button class="btn btn-danger link_bcPopupSearch" type="button">Close</button>
						</div>
					</div>
				</li>
			</ul>

		</div>

		<div class="workplace">
			<input type="hidden" id="userid" value="<?php echo $this->session->userdata("user_id")?>" />
			<input type="hidden" id="username" value="<?php echo $this->session->userdata("username")?>" />
			<div class="row-fluid">
				<div class="span4">
					<div class="head clearfix">
						<div class="isw-list"></div>
						<h1>Users</h1>
					</div>
					<div class="block messages">

						<div class="item clearfix">
							<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/amir.jpg" width=32 height=32 class="img-polaroid"/></a></div>
							<div class="info">
								<a href="#" class="name">amir</a>
								<p>Hi there ! I'm using PadiApp.</p>
								<span>19 feb 2012 12:45</span>
							</div>
						</div>

						<div class="item clearfix">
							<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/dhani.jpg" width=32 height=32 class="img-polaroid"/></a></div>
							<div class="info">
								<a href="#" class="name">dhani</a>
								<p>Hi there ! I'm using PadiApp.</p>
								<span>18 feb 2012 12:45</span>
							</div>
						</div>

						<div class="item clearfix">
							<div class="image"><a href="#"><img src="<?php echo base_url();?>media/users/ketut.jpg" width=32 height=32 class="img-polaroid"/></a></div>
							<div class="info">
								<a href="#" class="name">ketut</a>
								<p>Hi there ! I'm using PadiApp .</p>
								<span>17 feb 2012 12:45</span>
							</div>
						</div>
					</div>
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
							<div class="itemIn">
								<a href="#" class="image"><img src="<?php echo base_url();?>media/users/dhani.jpg" width=50 height=50 class="img-polaroid"/></a>
								<div class="text">
									  <div class="info clearfix">
										  <span class="name">dhani</span>
										  <span class="date">10 min ago</span>
									  </div>
									  Hello there ... .
								</div>
							</div>
							<div class="itemOut">
								<a href="#" class="image"><img src="<?php echo base_url();?>media/users/amir.jpg" width=50 height=50 class="img-polaroid"/></a>
								<div class="text">
									  <div class="info clearfix">
										  <span class="name"><?php echo $this->session->userdata("username")?></span>
										  <span class="date">7 min ago</span>
									  </div>
									  In id adipiscing diam. Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/links"></script>
<script type="text/javascript">
	(function($){
		$("#btnsend").click(function(){
			$("#messages").append("abc");
			$.ajax({
				url:thisdomain+"chats/writemessage",
				data:{sender:$("#userid").val(),receiver:9,content:$("#widgetInputMessage").val()},
				type:"post"
			}).done(function(chatid){
				$("#mCSB_1 .mCSB_container").append('<div class="itemOut"><a class="image" href="#"><img class="img-polaroid" width="50" height="50" src="https://teknis/media/users/amir.jpg"></a><div class="text"><div class="info clearfix"><span class="name">'+$("#username").val()+'</span><span class="date">7 min ago</span></div>'+$("#widgetInputMessage").val()+'</div></div></div>');
				console.log("Penyimpanan berhasil");
			}).fail(function(){
				console.log("Tidak dapat menyimpan pesan");
			});
		});
	}(jQuery))
</script>
</body>
</html>
